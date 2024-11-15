<?php
include("include/fonction_connect.php");


if($_SESSION['connexion'] == 'Connexion'){
    header("Location:index.php");
    exit;
}

$user_id = $_SESSION['id_user'];

$db = mysqli_connect("localhost", "  ", "  ", "  ");

$user_query = "SELECT id_user, Nom, Prenom, Pseudo, Email, Photo_de_profil FROM Utilisateur WHERE id_user = $user_id";
$user_result = mysqli_query($db, $user_query);
$user_info = mysqli_fetch_assoc($user_result);

$quizz_query = "
    SELECT Q.Nom AS QuizzNom, R.Reponse, R.Date
    FROM Reponse_Quizz R
    JOIN Quizz Q ON R.id_quizz = Q.id_quizz
    WHERE R.id_user = $user_id";
$quizz_results = mysqli_query($db, $quizz_query);

?>

<html lang="en">
<head>
    <link rel="icon" type="image/png" href="media/logocampagne.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <script src="lib/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="lib/jquery-ui.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/arrow-scroll.css">
    <link rel="stylesheet" href="css/contenue.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/pop-up.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include("include/header.php"); ?>

<div class="user-info">
    <h1>Mon compte</h1>
    <p><strong>Nom:</strong> <?php echo $user_info['Nom']; ?></p>
    <p><strong>Prénom:</strong> <?php echo $user_info['Prenom']; ?></p>
    <p><strong>Pseudo:</strong> <?php echo $user_info['Pseudo']; ?></p>
    <p><strong>Email:</strong> <?php echo $user_info['Email']; ?></p>
    <p><strong>Photo de profil:</strong></p>
    <img src="<?php echo $user_info['Photo_de_profil']; ?>" alt="Photo de profil" class="profile-photo">
</div>

<div class="user-quizz">
    <h2>Mes résultats de quizz</h2>
    <table>
        <thead>
            <tr>
                <th>Nom du Quizz</th>
                <th>Réponse</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($quizz_results) > 0) { ?>
                <?php while ($quizz = mysqli_fetch_assoc($quizz_results)) { ?>
                    <tr>
                        <td><?php echo $quizz['QuizzNom']; ?></td>
                        <td><?php echo $quizz['Reponse']; ?></td>
                        <td><?php echo $quizz['Date']; ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="3">Aucun résultat de quizz trouvé</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("include/arrow-scroll.php"); ?>
<?php include("include/footer.php"); ?>
</body>
</html>
