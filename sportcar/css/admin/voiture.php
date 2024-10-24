<?php
include_once('../include/fonction_admin_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voiture - SportCar Location</title>
    <link rel="stylesheet" href="../css/table.css">

</head>
<body>
<?php include_once('../include/header_admin.php'); ?>
<main id='main'>
<?php
function uploadImage($inputName) {
    $uploadDir = '../media/';
    $fileName = basename($_FILES[$inputName]['name']);
    $uploadFile = $uploadDir . $fileName;
    
    if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $uploadFile)) {
        return "media/" . $fileName;
    } else {
        return false;
    }
}


if($_SESSION['admin_connexion'] == 'Déconnexion'){
    $db = mysqli_connect("localhost", "raphaelkondratiu_RK_Club", "clubdesommeil", "raphaelkondratiu_location") ;
    if(isset($_POST['marque'])&&isset($_POST['modele'])&&isset($_POST['prix'])&&isset($_FILES['image']) && empty($_POST['admin_action'])){
        $image = uploadImage('image');
        mysqli_query($db,"INSERT INTO Voiture (marque, modele, prix, image) VALUES ('{$_POST['marque']}', '{$_POST['modele']}', '{$_POST['prix']}', '$image')");
        unset($_FILES['image']);
    }
    if(isset($_POST['admin_action']) && $_POST['admin_action'] == 'suppr'){
        $id = intval($_POST['id']);
        mysqli_query($db, "DELETE FROM Voiture WHERE id_voit = {$id}") or die (mysqli_error($db));
    }
    if(isset($_POST['admin_action']) && $_POST['admin_action'] == 'modifier'){
        if(isset($_FILES['image'])){
            $image = uploadImage('image');
        }
        if($image == ""){
            $image = $_POST["image"];
        }
        $id = intval($_POST['id']);

        mysqli_query($db, "UPDATE Voiture SET marque='{$_POST['marque']}', modele='{$_POST['modele']}', prix='{$_POST['prix']}', image='$image' WHERE id_voit={$id};");
        unset($_FILES['image']);
    }
    if(isset($_POST['modif'])){
        include_once('../include/modif_voiture.php');
    }

    $queryclient = "SELECT * From `Voiture`";
    $tousclient = mysqli_query($db, $queryclient);
    echo "<h2>Voiture</h2><form method='post'><button name='admin_action' value='Inserer' type='submit'>Nouvelle Voiture</button></form>";
    echo "<table>";
    echo "<tr><th>Marque</th><th>Modèle</th><th>Image</th><th>Prix</th><th>Modifier</th></tr>";
    if (mysqli_num_rows($tousclient) > 0) {
        while ($client = mysqli_fetch_assoc($tousclient)) {
            echo "<tr><td>{$client['marque']}</td><td>{$client['modele']}</td><td>{$client['image']}</td><td>{$client['prix']}</td><td><form method='post'><button name='modif' value='{$client['id_voit']}' type='submit'><i class='fas fa-cog'></i></button></form></td></tr>";}
    }
    else {
        echo "<tr><td colspan='5'>Aucun Client</td></tr>";
    }
    echo "</table>";
    if(isset($_POST['admin_action']) && $_POST['admin_action'] == "Inserer"){
        include_once("../include/insert_voiture.php");
    }
    mysqli_close($db);
}
?>
</main>

<body>