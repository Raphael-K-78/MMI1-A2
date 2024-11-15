<?php
include_once('../include/fonction_connect_admin.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/table.css">

    <link rel="stylesheet" href="../css/pop-up.css">
</head>
<body>
    <?php
    include_once('../include/header_admin.php');
    function recup_data($query){
        $db = mysqli_connect("localhost", "raphaelkondratiu_sinai", "Conception202!", "raphaelkondratiu_sinai") ;
        $data = mysqli_query($db, $query) or die(mysqli_error($db));
        while ($result = mysqli_fetch_assoc($data)){
            return $result['resultat'];
        }
        mysqli_close($db);
    }
    if($_SESSION['admin_connexion'] == 'Déconnexion'){
        echo "<h2>Quizz</h2><form id='dashboard-form' method='post' action='quizz.php'><button name='admin_action' value='Inserer' type='submit'>Nouveau Quizz</button><button name='admin_action' value='InsererQ' type='submit'>Nouvelle Question</button></form>";
        $db = mysqli_connect("localhost", "raphaelkondratiu_sinai", "Conception202!", "raphaelkondratiu_sinai") ;
        $queryclient = "SELECT * From `Quizz`ORDER by Date";
    $tousclient = mysqli_query($db, $queryclient);
    echo "<table>";
    echo "<tr><th>Nom</th><th>Texte</th><th>Date</th></tr>";
    if (mysqli_num_rows($tousclient) > 0) {
        while ($client = mysqli_fetch_assoc($tousclient)) {
            echo "<tr><td>{$client['Nom']}</td><td>{$client['text']}</td><td>{$client['Date']}</td></tr>";}
    }
    else {
        echo "<tr><td colspan='6'>Aucun Quizz</td></tr>";
    }
    echo "</table>";
    }
    ?>
        
</main>
</body>
</html>