<?php
    include("include/fonction_connect.php");
    date_default_timezone_set('Europe/Paris');
    $now = new DateTime();
    $formattedNow = $now->format('Y-m-d');

    function recup_data($query,$db){
        $data = mysqli_query($db, $query) or die(mysqli_error($db));
        while ($result = mysqli_fetch_assoc($data)){
            return $result['resultat'];
        }
    }
?>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="media/logocampagne.png" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <script src="lib/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="lib/jquery-ui.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/arrow-scroll.css">
    <link rel="stylesheet" href="css/contenue.css">
    <link rel="stylesheet" href="css/pop-up.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php
    include("include/header.php");
    ?>
<main>
    <h1>Quizz</h1>
    <p class='important'>Bienvenue dans la salle des quizz! Préparez-vous à tester vos connaissances sur les déchets résiduels, tout en vous amusant. Êtes-vous prêt à défier Napoléon dans un duel de tri sélectif ? Pouvez-vous rivaliser avec Jeanne d'Arc en matière de recyclage ? Voici votre chance de briller et de montrer que vous êtes un véritable champion éco-responsable. Allez, à vos cerveaux, prêts, partez !</p>
    <section class='section-3'>
        <?php
            $db = mysqli_connect("localhost", "  ", "  ", "  ") ;
            $data = mysqli_query($db, "SELECT * From `Quizz` WHERE Date > $formattedNow");
            if (mysqli_num_rows($data) > 0) {
                while ($quizz = mysqli_fetch_assoc($data)) {
                    $nb_question = recup_data("SELECT count(*) AS resultat FROM Question WHERE id_quizz={$quizz['id_quizz']};",mysqli_connect("localhost", "  ", "  ", "  "));
                    echo "<div class='quizz'><h2>{$quizz['Nom']}</h2><p>{$quizz['text']}</p><div class='quizz_info'><p>{$nb_question} questions</p><p>publié le {$quizz['Date']}</p></div><form action='rep-quizz.php' method='get'><button type='submit' name='quizz' value='{$quizz['id_quizz']}'>Jouer</button></form></div>";
            }
        }
        ?>
    </section>
</main>

<?php 
    include("include/arrow-scroll.php");
    include("include/footer.php"); 
    ?>
</body>
</html>