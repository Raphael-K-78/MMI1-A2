<?php
include("include/fonction_connect.php");

if(empty($_GET['quizz'])&&empty($_POST['quizz'])){
    header("Location:Quizz.php").
    exit;
}
?>

<html lang="en">
<head>
<link rel="icon" type="image/png" href="media/logocampagne.png" />

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
    $db = mysqli_connect("localhost", "  ", "  ", "  ") ;
?>
<main id='main_quizz'>
    <?php
if(isset($_GET['quizz']) && empty($_POST['quizz'])){
    $data = mysqli_query($db, "SELECT * From `Quizz` WHERE id_quizz = {$_GET['quizz']}");
    if (mysqli_num_rows($data) > 0) {
        while ($quizz = mysqli_fetch_assoc($data)) {
            echo "<h1>{$quizz['Nom']}</h1><p class='important'>{$quizz['text']}</p>";
            $id_quizz = $quizz['id_quizz'];
        }
    }
        $data = mysqli_query($db, "SELECT * From `Question` WHERE id_quizz = {$_GET['quizz']}");
        echo "<form id='question' method='post'>";
        while ($question = mysqli_fetch_assoc($data)) {
            echo "<h2>{$question['Question']}</h2><input type='radio' name='{$question['id_question']}' value='{$question['Reponse1']}' checked><label>{$question['Reponse1']}</label><br><input type='radio' name='{$question['id_question']}' value='{$question['Reponse2']}'><label>{$question['Reponse2']}</label><br><input type='radio' name='{$question['id_question']}' value='{$question['Reponse3']}'><label>{$question['Reponse3']}</label><br><input type='radio' name='{$question['id_question']}' value='{$question['Reponse4']}'><label>{$question['Reponse4']}</label>";
        }
        echo "<br><button type='submit' name='quizz' value='{$id_quizz}'>Valider</button></form>";
}
if(isset($_POST['quizz']) && isset($_GET['quizz'])){
    $nb_rep = 0;
    $data = mysqli_query($db, "SELECT * From `Quizz` WHERE id_quizz = {$_GET['quizz']}");
    if (mysqli_num_rows($data) > 0) {
        while ($quizz = mysqli_fetch_assoc($data)) {
            echo "<h1>{$quizz['Nom']}</h1><p class='important'>{$quizz['text']}</p>";
            $id_quizz = $quizz['id_quizz'];
        }
    }
    $data = mysqli_query($db, "SELECT * FROM `Question` WHERE id_quizz = {$_GET['quizz']}");
    echo "<form id='question' method='post'>";
    while ($question = mysqli_fetch_assoc($data)) {
        $rep = $question['Reponse'];
        $correct_rep = $question["Reponse$rep"];
        echo "<h2>{$question['Question']}</h2>";
            if($correct_rep == $_POST[$question['id_question']]){
                $nb_rep+= 1;
            }
            for ($i = 1; $i <= 4; $i++) {
                if($i == $rep){
                    $class='correct';
                    $icon = '<i class="fas fa-check-circle"></i>';
                }
                else{
                    $class='incorrect';
                    $icon = '<i class="fas fa-times-circle"></i>';
                }
                echo "<div class='option $class'>$icon<label>{$question["Reponse$i"]} </label></div>";
            }
        }
        echo "</form>";
        echo "<div id='resultat'>
        <p>Vous avez {$nb_rep} réponse correcte(s)</p>
        <p>Pour faire un autre Quizz: 
            <button><a href='Quizz.php'>Faire un autre Quizz</a></button>
        </p>
      </div>";
      if(isset($_SESSION['id_user'])){
        $db = mysqli_connect("localhost", "  ", "  ", "  ") or die(mysqli_error($db));

        $query = "INSERT INTO Reponse_Quizz (id_quizz, id_user, Reponse, Date) VALUES ('{$_GET['quizz']}', '{$_SESSION['id_user']}', '{$nb_rep}', NOW())";
        mysqli_query($db, $query);

        mysqli_close($db);
    }
}


?>


</main>
<?php
        include("include/arrow-scroll.php");
    include("include/footer.php"); 
    ?>
</body>
</html>