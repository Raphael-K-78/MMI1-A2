<?php
include_once('../include/fonction_connect_admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/pop-up.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
<?php include_once('../include/header_admin.php'); ?>
<main id='main'>
<?php

if($_SESSION['admin_connexion'] == 'Déconnexion'){
    $db = mysqli_connect("localhost", "raphaelkondratiu_sinai", "Conception202!", "raphaelkondratiu_sinai");

    if(isset($_POST['admin_action']) && $_POST['admin_action'] == 'supprimer'){
        $id = intval($_POST['id']);
        mysqli_query($db, "DELETE FROM Utilisateur WHERE id_user = {$id}") or die (mysqli_error($db));
    }

    $queryclient = "SELECT * FROM Utilisateur";
    $tousclient = mysqli_query($db, $queryclient);
    echo "<h2>Utilisateurs</h2>";
    echo "<table>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Pseudo</th><th>Email</th><th>Mot de Passe</th><th>Photo de Profil</th><th>Supprimer</th></tr>";
    if (mysqli_num_rows($tousclient) > 0) {
        while ($client = mysqli_fetch_assoc($tousclient)) {
            echo "<tr><td>{$client['Nom']}</td><td>{$client['Prenom']}</td><td>{$client['Pseudo']}</td><td>{$client['Email']}</td><td>{$client['Mot_de_passe']}</td><td>{$client['Photo_de_profil']}</td><td><form method='post'><input type='hidden' name='id' value='{$client['id_user']}'><button name='admin_action' value='supprimer' type='submit'><i class='fas fa-trash-alt'></i></button></form></td></tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Aucun Utilisateur</td></tr>";
    }
    echo "</table>";

    mysqli_close($db);
}
?>
</main>
</body>
</html>
