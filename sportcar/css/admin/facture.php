<?php
include_once('../include/fonction_admin_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture - SportCar Location</title>
    <link rel="stylesheet" href="../css/table.css">

</head>
<body>
<?php include_once('../include/header_admin.php');?>
<main id='main'>
<?php
if($_SESSION['admin_connexion'] == 'Déconnexion'){
    $db = mysqli_connect("localhost", "raphaelkondratiu_RK_Club", "clubdesommeil", "raphaelkondratiu_location") ;
    $queryToutesReservations = "SELECT c.nom, c.prenom, v.marque, v.modele, r.datetime_d, r.datetime_r, v.prix, f.temps AS duree, f.prix_ht, f.TVA, f.prix_TTC FROM Reservation r LEFT JOIN Facture f ON r.id_res = f.id_res LEFT JOIN Voiture v ON r.id_voit = v.id_voit LEFT JOIN Client c ON r.id_cl = c.id_cl ORDER BY r.datetime_d DESC;";
    $toutesReservations = mysqli_query($db, $queryToutesReservations);

    echo "<h2>Factures</h2>";
    echo "<table>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Marque</th><th>Modèle</th><th>Date début</th><th>Date fin</th><th>Prix/h</th><th>Durée</th><th>Prix HT</th><th>TVA</th><th>Prix TTC</th></tr>";

    if (mysqli_num_rows($toutesReservations) > 0) {
        while ($reservation = mysqli_fetch_assoc($toutesReservations)) {
            echo "<tr><td>{$reservation['nom']}</td><td>{$reservation['prenom']}</td><td>{$reservation['marque']}</td><td>{$reservation['modele']}</td><td>{$reservation['datetime_d']}</td><td>{$reservation['datetime_r']}</td><td>{$reservation['prix']}€</td><td>{$reservation['duree']}h</td><td>{$reservation['prix_ht']}€</td><td>{$reservation['TVA']}€</td><td>{$reservation['prix_TTC']}€</td></tr>";}
        }
        else {
        echo "<tr><td colspan='13'>Aucune réservation</td></tr>";
        }
        echo "</table>";
        mysqli_close($db);
}
?>
<main>
<body>