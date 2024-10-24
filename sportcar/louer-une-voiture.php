<?php
include_once('include/fonction_connect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Louer une voiture - SportCar Location</title>
    <link rel="Stylesheet" href='css/location.css'>
</head>
<body>
<?php include_once('include/header.php');

 ?>
<h1 class='text'>Louer une voiture</h1>
        <p class='text'>Explorez le plaisir de la conduite avec SportCar Location. De l'élégance racée des supercars aux performances éblouissantes des voitures de sport, notre sélection vous offre l'opportunité de vivre une expérience unique au volant. Louez dès aujourd'hui et laissez-vous emporter par l'adrénaline de la route.</p>
        <form method="post" class="reservation-form">
    <button type="submit" name="user_action" value="Louer" class="reservation-button">Réserver votre voiture</button>
</form>
        <h2 class='text'>Nos Modèles</h2>
        

        <div class="car-slider">
            <div class="car-slides">
            <?php
$db = mysqli_connect("localhost", "   ", "   ", "") or die(mysqli_error($db));

$data = mysqli_query($db, "SELECT marque, modele, prix, image FROM Voiture");

while ($voiture = mysqli_fetch_assoc($data)) {
    echo "<div class='car-slide'>";
    echo "<img src='" . $voiture['image'] . "'>";
    echo "<div class='car-info'><h3>Marque: " . $voiture['marque'] . "</h3><p>Modèle: " . $voiture['modele'] . "</p><p>Prix: " . $voiture['prix'] . "€/heure</p></div>";
    echo "</div>";
}
mysqli_close($db);
?>        
                </div>
                <div class="arrows">
                <span class="prev">&#10094;</span>
                <span class="next">&#10095;</span>
            </div>
        </div>
            </div>
           
    <script src='js/slidercar.js'></script>

    
    <?php
    if(isset($_SESSION['connexion']) && isset($_POST['user_action'])){
        if($_SESSION['connexion'] !== 'Déconnexion' && $_POST['user_action']=='Louer'){
            include_once('include/login_client.php');
        }
        elseif($_SESSION['connexion'] == 'Déconnexion' && $_POST['user_action']=='Louer'){
            include_once('include/horaire.php');
        }
        elseif($_SESSION['connexion'] == 'Déconnexion' && $_POST['user_action']=='horaire'){
            include_once('include/reservation.php');
        }
         elseif($_SESSION['connexion'] == 'Déconnexion' && $_POST['user_action']=='reservation'){
            include_once('include/confirmation.php');
        }
        elseif ($_SESSION['connexion'] == 'Déconnexion' && $_POST['user_action'] == 'confirmation') {
            $db = mysqli_connect("localhost", "   ", "   ", "") or die(mysqli_error($db));
        
            $queryReservation = "INSERT INTO Reservation (id_cl, id_voit, datetime_d, datetime_r) VALUES ('{$_SESSION['id_cl']}', '{$_POST['voiture']}', '{$_POST['début']}', '{$_POST['fin']}')";
            mysqli_query($db, $queryReservation) or die(mysqli_error($db));
        
            $reservationId = mysqli_insert_id($db);
        
            $queryFacture = "INSERT INTO Facture (id_cl, id_res, prix_ht, TVA, prix_TTC, temps) VALUES ('{$_SESSION['id_cl']}', $reservationId, '{$_POST['prixht']}', '{$_POST['tva']}', '{$_POST['prixttc']}', '{$_POST['durée']}')";
            mysqli_query($db, $queryFacture) or die(mysqli_error($db));
        
            mysqli_close($db);
        }
        

    }
    ?>
</body>
</html>
