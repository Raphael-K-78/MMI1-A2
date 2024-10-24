<?php
include_once('../include/fonction_admin_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SportCar Location</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php
    function recup_data($query){
        $db = mysqli_connect("localhost", "   ", "   ", "   ") ;
        $data = mysqli_query($db, $query) or die(mysqli_error($db));
        while ($result = mysqli_fetch_assoc($data)){
            return $result['resultat'];
        }
        mysqli_close($db);
    }
    include_once('../include/header_admin.php');?>
    <main class="container" id='main'>
        <div class="card">
            <h2>Chiffre d'affaire</h2>
            <p>Chiffre d'affaire HT: <?php echo recup_data("SELECT SUM(prix_ht) AS resultat FROM Facture;"); ?></p>
            <p>Chiffre d'affaire TTC: <?php echo recup_data("SELECT SUM(prix_ttc) AS resultat FROM Facture;"); ?></p>
        </div>
        <div class="card">
            <h2>Chiffre d'affaire <?php echo date('Y'); ?></h2>
            <p>Chiffre d'affaire HT <?php echo date('Y'); ?>: <?php echo recup_data("SELECT YEAR(datetime_d) AS annee, SUM(prix_ht) AS resultat FROM Facture INNER JOIN Reservation ON Facture.id_res = Reservation.id_res GROUP BY YEAR(datetime_d);"); ?></p>
            <p>Chiffre d'affaire TTC <?php echo date('Y'); ?>: <?php echo recup_data("SELECT YEAR(datetime_d) AS annee, SUM(prix_ttc) AS resultat FROM Facture INNER JOIN Reservation ON Facture.id_res = Reservation.id_res GROUP BY YEAR(datetime_d);"); ?></p>
        </div>
        <div class="card">
            <h2>Chiffre d'affaire <?php echo date('m/Y'); ?></h2>
            <p>Chiffre d'affaire HT <?php echo date('m/Y'); ?>: <?php echo recup_data("SELECT YEAR(datetime_d) AS annee, SUM(prix_ht) AS resultat FROM Facture INNER JOIN Reservation ON Facture.id_res = Reservation.id_res GROUP BY YEAR(datetime_d);"); ?></p>
            <p>Chiffre d'affaire TTC <?php echo date('m/Y'); ?>: <?php echo recup_data("SELECT YEAR(datetime_d) AS annee,  SUM(prix_ttc) AS resultat FROM Facture INNER JOIN Reservation ON Facture.id_res = Reservation.id_res GROUP BY YEAR(datetime_d);"); ?></p>
        </div>
        <div class="card">
            <h2>Nombre de clients</h2>
            <p>Nombre de clients: <?php echo recup_data("SELECT COUNT(*) AS resultat FROM Client;"); ?></p>
        </div>
        <div class="card">
            <h2>Nombre de voitures</h2>
            <p>Nombre de voitures: <?php echo recup_data("SELECT COUNT(*) AS resultat FROM Voiture;"); ?></p>
        </div>
        <div class="card">
            <h2>Nombre de réservations</h2>
            <p>Nombre de réservations: <?php echo recup_data("SELECT COUNT(*) AS resultat FROM Reservation;"); ?></p>
        </div>
        <div class="card">
            <h2>Nombre de réservations <?php echo date('Y'); ?></h2>
            <p>Nombre de réservations <?php echo date('Y'); ?>: <?php echo recup_data("SELECT YEAR(datetime_d) AS annee, COUNT(*) AS resultat FROM Reservation GROUP BY YEAR(datetime_d);"); ?></p>
        </div>
        <div class="card">
            <h2>Nombre de réservations <?php echo date('m/Y'); ?></h2>
            <p>Nombre de réservations <?php echo date('m/Y'); ?>: <?php echo recup_data("SELECT YEAR(datetime_d) AS annee, MONTH(datetime_d) AS mois, COUNT(*) AS resultat FROM Reservation GROUP BY YEAR(datetime_d), MONTH(datetime_d);"); ?></p>
        </div>
        <div class="card">
            <h2>Voitures en location</h2>
            <p>Voitures en location: <?php echo recup_data("SELECT COUNT(DISTINCT id_voit) AS resultat FROM Reservation WHERE NOW() BETWEEN datetime_d AND datetime_r;"); ?></p>
        </div>
        <div class="card">
            <h2>Voitures disponibles</h2>
            <p>Voitures disponibles: <?php echo recup_data("SELECT COUNT(*) AS resultat FROM Voiture WHERE id_voit NOT IN (SELECT DISTINCT id_voit FROM Reservation WHERE NOW() BETWEEN datetime_d AND datetime_r);"); ?></p>
        </div>
        
</main>
</body>
</html>