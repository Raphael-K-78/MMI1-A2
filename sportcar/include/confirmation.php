<?php

function calculPrix($dateDebut, $dateFin, $prixHoraire) {
    $debut = new DateTime($dateDebut);
    $fin = new DateTime($dateFin);
    $difference = ceil($fin->getTimestamp() - $debut->getTimestamp()) / 3600;
    $prixHT = $difference * $prixHoraire;
    $tva = $prixHT * 0.2;
    $prixTTC = $prixHT + $tva;
    return array(
        'prix_ht' => $prixHT,
        'tva' => $tva,
        'prix_ttc' => $prixTTC,
        'durée' =>$difference
    );
}


if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'Déconnexion' && 
isset($_POST['user_action']) && $_POST['user_action'] == 'reservation' && 
isset($_POST['début']) && isset($_POST['fin']) && isset($_POST['voiture'])) {
    $db = mysqli_connect("localhost", "   ", "   ", "   ") or die(mysqli_error($db));
    $id = $_POST['voiture'];
    $data = mysqli_query($db, "SELECT marque, modele, prix FROM Voiture WHERE id_voit =$id");


    while ($voiture = mysqli_fetch_assoc($data)) {
    $reservation = calculPrix($_POST['début'],$_POST['fin'],$voiture['prix']);
?>

<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close" id="close-popup">&times;</span>
        <h2>Confirmation de réservation</h2>
        <p>Veuillez confirmer les détails de votre réservation :</p>
        <ul>
            <li>Début: <?php echo $_POST['début'];?></li>
            <li>Fin: <?php echo $_POST['fin'];?></li>
            <li>Durée: <?php echo $reservation['durée'];?>h</li>
            <li>Véhicule: <?php echo $voiture['marque'].' '.$voiture['modele'];?></li>
            <li>Prix (/h):<?php echo $voiture['prix']; ?>€/h</li>
            <li>Prix (HT):<?php echo $reservation['prix_ht'];?>€</li>
            <li>TVA (20%): <?php echo $reservation['tva']; ?>€</li>
            <li>Prix (TTC): <?php echo $reservation['prix_ttc']; ?>€</li>
        </ul>
        <form action="" method="POST">
    <input type="hidden" name="début" value="<?php echo $_POST['début'];?>">
    <input type="hidden" name="fin" value="<?php echo $_POST['fin'];?>">
    <input type="hidden" name="voiture" value="<?php echo $_POST['voiture'];?>">
    <input type="hidden" name="tva" value="<?php echo $reservation['tva'];?>">
    <input type="hidden" name="prixht" value="<?php echo $reservation['prix_ht'];?>">
    <input type="hidden" name="prixttc" value="<?php echo $reservation['prix_ttc'];?>">
    <input type="hidden" name="durée" value="<?php echo $reservation['durée'];?>">
            <button type="submit" name="user_action" value="confirmation">Confirmer la réservation</button>
        </form>
    </div>
</div>
<?php 
    }
    mysqli_close($db);
}
?>
  <link rel="stylesheet" href="css/pop-up.css">
    <script src="js/close-popup.js"></script>
