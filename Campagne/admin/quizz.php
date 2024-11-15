<?php
include_once('../include/fonction_connect_admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz Manager - Admin</title>
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
    $db = mysqli_connect("localhost", "raphaelkondratiu_sinai", "Conception202!", "raphaelkondratiu_sinai") ;
    if(isset($_POST['admin_action'])&& $_POST['admin_action'] == 'créer_quizz'){
        mysqli_query($db,"INSERT INTO Quizz (Nom, text,Date) VALUES ('{$_POST['nom']}', '{$_POST['text']}','{$_POST['date']}')");
        include_once("../include/insert_question.php");
    }
    if(isset($_POST['admin_action'])&& $_POST['admin_action'] == 'créer_question'){
        $id = intval($_POST['quizz']);
        mysqli_query($db,"INSERT INTO Question (Question, Reponse1,Reponse2,Reponse3,Reponse4,Reponse,id_quizz) VALUES ('{$_POST['question']}', '{$_POST['rep1']}','{$_POST['rep2']}','{$_POST['rep3']}','{$_POST['rep4']}',{$_POST['reponse']},{$id})");
    }
    if(isset($_POST['admin_action']) && $_POST['admin_action'] == 'suppr'){
        $id = intval($_POST['id']);
        mysqli_query($db, "DELETE FROM Quizz WHERE id_quizz = {$id}") or die (mysqli_error($db));
    }
    if(isset($_POST['admin_action']) && $_POST['admin_action'] == 'supprQ'){
        $id = intval($_POST['id']);
        mysqli_query($db, "DELETE FROM Question WHERE id_question = {$id}") or die (mysqli_error($db));
    }
    if(isset($_POST['admin_action']) && $_POST['admin_action'] == 'modifier'){
       
        $id = intval($_POST['id']);

        mysqli_query($db, "UPDATE Quizz SET Nom='{$_POST['nom']}', text='{$_POST['text']}', Date='{$_POST['date']}' WHERE id_quizz={$id};");
        unset($_FILES['image']);
    }
    if(isset($_POST['admin_action']) && $_POST['admin_action'] == 'modifierQ'){
       
        $id = intval($_POST['id']);

        mysqli_query($db, "UPDATE Question SET Question ='{$_POST['question']}', Reponse4='{$_POST['rep1']}', Reponse4='{$_POST['rep2']}',Reponse4='{$_POST['rep3']}',Reponse4='{$_POST['rep4']}',Reponse='{$_POST['reponse']}' WHERE id_quizz={$id};");
        unset($_FILES['image']);
    }

    if(isset($_POST['modif'])){
        include_once('../include/modif_quizz.php');
    }
    if(isset($_POST['modifQ'])){
        include_once('../include/modif_question.php');
    }

    $queryclient = "SELECT * From `Quizz`";
    $tousclient = mysqli_query($db, $queryclient);
    echo "<h2>Quizz</h2><form method='post'><button name='admin_action' value='Inserer' type='submit'>Nouveau Quizz</button></form>";
    echo "<table>";
    echo "<tr><th>Nom</th><th>Texte</th><th>Date</th><th>Modifier</th></tr>";
    if (mysqli_num_rows($tousclient) > 0) {
        while ($client = mysqli_fetch_assoc($tousclient)) {
            echo "<tr><td>{$client['Nom']}</td><td>{$client['text']}</td><td>{$client['Date']}</td><td><form method='post'><button name='modif' value='{$client['id_quizz']}' type='submit'><i class='fas fa-cog'></i></button></form></td></tr>";}
    }
    else {
        echo "<tr><td colspan='6'>Aucun Quizz</td></tr>";
    }
    echo "</table>";

    $queryclient = "SELECT * From `Question` JOIN Quizz on Question.id_quizz = Quizz.id_quizz order by Question.id_quizz";
    $tousclient = mysqli_query($db, $queryclient);
    echo "<h2>Question</h2><form method='post'><button name='admin_action' value='InsererQ' type='submit'>Nouvelle Question</button></form>";
    echo "<table>";
    echo "<tr><th>Nom du Quizz</th><th>Question</th><th>Réponse 1</th><th>Réponse 2</th><th>Réponse 3</th><th>Réponse 4</th><th>N° de la bonne réponse</th><th>Modifier</th></tr>";
    if (mysqli_num_rows($tousclient) > 0) {
        while ($client = mysqli_fetch_assoc($tousclient)) {
            echo "<tr><td>{$client['Nom']}</td><td>{$client['Question']}</td><td>{$client['Reponse1']}</td><td>{$client['Reponse2']}</td><td>{$client['Reponse3']}</td><td>{$client['Reponse4']}</td><td>{$client['Reponse']}</td><td><form method='post'><button name='modifQ' value='{$client['id_question']}' type='submit'><i class='fas fa-cog'></i></button></form></td></tr>";}
    }
    else {
        echo "<tr><td colspan='8'>Aucune Question</td></tr>";
    }
    echo "</table>";

    if(isset($_POST['admin_action']) && $_POST['admin_action'] == "Inserer"){
        include_once("../include/insert_quizz.php");
    }
    if(isset($_POST['admin_action']) && $_POST['admin_action'] == "InsererQ"){
        include_once("../include/insert_question.php");
    }
    mysqli_close($db);
}
?>
</main>

<body>