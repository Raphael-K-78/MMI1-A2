<?php
include_once('include/fonction_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte - SportCar Location</title>
    <link rel='Stylesheet' href='css/compte.css'>
</head>
<body>
    <?php include_once('include/header.php');?>
    <main>
            <?php
            if(isset($_SESSION['connexion'])){
                
                if($_SESSION['connexion'] == 'Connexion'){
                    echo "<p id='no_connect'>Vous devez être connecté pour accéder à cette page.</p>";
                }
                elseif($_SESSION['connexion'] == 'Déconnexion'){
                    $db = mysqli_connect("localhost","","   ","") or die (mysqli_error($db)) ;
                    if(isset($_POST['user_action']) && $_POST['user_action'] == 'suppr'){
                        $id = intval($_SESSION['id_cl']);
                        mysqli_query($db, "DELETE FROM Client WHERE id_cl = {$id}");
                        session_destroy();
                    }
                    if(isset($_POST['user_action'])){
                        if($_POST['user_action']=="modifier"){
                            include_once("include/modif_client.php");
                        }
                        elseif($_POST['user_action'] == 'apply_modif' && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['password']) && isset($_POST['email'])){
                            mysqli_query($db,"UPDATE `Client` SET nom = '{$_POST['nom']}', prenom = '{$_POST['prenom']}', Email = '{$_POST['email']}', Adresse = '{$_POST['adresse']}', password = '{$_POST['password']}' WHERE id_cl = {$_SESSION['id_cl']};");
                        }
                    }

                    $compte = mysqli_query($db,"SELECT nom, prenom, Email, Adresse, password FROM `Client` WHERE id_cl = {$_SESSION['id_cl']};");
                    while($usercompte = mysqli_fetch_assoc($compte)){
                        echo "<div class='user-info'><h2>Mon Compte</h2><div><strong>Nom :</strong>{$usercompte['nom']} </div><div><strong>Prénom :</strong>{$usercompte['prenom']} </div><div><strong>Adresse :</strong>{$usercompte['Adresse']} </div><div><strong>Email :</strong>{$usercompte['Email']} </div><div><strong>Mot de passe :</strong>{$usercompte['password']}</div></div>";
                    }
                   echo" <form action='#' method='POST'><button type='submit' name='user_action' value='modifier'>modifier</button></form>";
                    
                   $queryReservationsEnCours = "SELECT v.marque, v.modele, r.datetime_d, r.datetime_r FROM Reservation r JOIN Voiture v ON r.id_voit = v.id_voit WHERE r.id_cl = {$_SESSION['id_cl']} AND r.datetime_d <= NOW() AND r.datetime_r > NOW() ORDER BY r.datetime_d DESC;";
                    $reservationsEnCours = mysqli_query($db, $queryReservationsEnCours);
                    echo "<h2>Réservations en cours</h2><table><tr><th>Modèle</th><th>Date début</th><th>Date fin</th></tr>";
                    if(mysqli_num_rows($reservationsEnCours) > 0) {
                        while ($reservation = mysqli_fetch_assoc($reservationsEnCours)) {
                            echo "<tr><td>{$reservation['marque']} {$reservation['modele']}</td><td>{$reservation['datetime_d']}</td><td>{$reservation['datetime_r']}</td></tr>";
                        }
                    } 
                    else {
                        echo "<tr><td colspan='3'>Aucune réservation en cours</td></tr>";
                    }
                    echo "</table>";

                    $queryToutesReservations = "SELECT v.marque, v.modele, r.datetime_d, r.datetime_r, v.prix, f.temps AS duree, f.prix_ht, f.TVA, f.prix_TTC FROM Reservation r LEFT JOIN Facture f ON r.id_res = f.id_res LEFT JOIN Voiture v ON r.id_voit = v.id_voit WHERE r.id_cl = '{$_SESSION['id_cl']} ORDER BY r.datetime_d DESC';";
                    $toutesReservations = mysqli_query($db, $queryToutesReservations);
                    echo "<h2>Factures</h2>";
                    echo "<table>";
                    echo "<tr><th>Marque</th><th>Modèle</th><th>Date début</th><th>Date fin</th><th>Prix/h</th><th>Durée</th><th>Prix HT</th><th>TVA</th><th>Prix TTC</th></tr>";
                    if(mysqli_num_rows($toutesReservations) > 0) {
                    while ($reservation = mysqli_fetch_assoc($toutesReservations)) {
                        echo "<tr><td>{$reservation['marque']}</td><td>{$reservation['modele']}</td><td>{$reservation['datetime_d']}</td><td>{$reservation['datetime_r']}</td><td>{$reservation['prix']}€</td><td>{$reservation['duree']}h</td><td>{$reservation['prix_ht']}€</td><td>{$reservation['TVA']}€</td><td>{$reservation['prix_TTC']}€</td></tr>";
                    }
                    }
                    else{
                        echo "<tr><td colspan='9'>Aucune réservation</td></tr>";
                    }
                    echo "</table>";
                    mysqli_close($db);
                }
                
            }
        ?>
    </main>
</body>
</html>