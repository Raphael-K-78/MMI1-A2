<?php
include_once('../include/fonction_admin_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client - SportCar Location</title>
    <link rel="stylesheet" href="../css/table.css">

</head>
<body>
<?php include_once('../include/header_admin.php'); ?>
<main id='main'>
<?php
if($_SESSION['admin_connexion'] == 'Déconnexion'){
    $db = mysqli_connect("localhost", "raphaelkondratiu_RK_Club", "clubdesommeil", "raphaelkondratiu_location") ;
    $queryclient = "SELECT nom, prenom, Adresse, Email, `password` From `Client`";
    $tousclient = mysqli_query($db, $queryclient);

    echo "<h2>Client</h2>";
    echo "<table>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Email</th><th>Mot de passe</th></tr>";

    if (mysqli_num_rows($tousclient) > 0) {
        while ($client = mysqli_fetch_assoc($tousclient)) {
            echo "<tr><td>{$client['nom']}</td><td>{$client['prenom']}</td><td>{$client['Adresse']}</td><td>{$client['Email']}</td><td>{$client['password']}</td></tr>";}
        }
        else {
        echo "<tr><td colspan='5'>Aucun Client</td></tr>";
        }
        echo "</table>";
        mysqli_close($db);
}
?>
</main>

<body>