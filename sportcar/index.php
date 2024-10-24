<?php
include_once('include/fonction_connect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportCar Location</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">SportCar Location</div>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="louer-une-voiture.php">Louer une voiture</a></li>
                <li><a href="mon-compte.php">Mon compte</a></li>
                <li class="login">
                <form action="" method="POST" class="login-form">
                        <input type="hidden" name="user_action" value="<?php echo $_SESSION['connexion']; ?>">
                        <button type="submit" class="login-button">
                            <i class="fas fa-user"></i><?php echo $_SESSION['connexion']; ?>
                        </button></form>
                </li>
            </ul>
        </nav>

        <div class="slider">
            <div class="slides">
                <!-- Ajoutez autant de slides que vous voulez ici -->
                <div class="slide"><img src="media/aventador.jpg" alt="Voiture 1"></div>
                <div class="slide"><img src="media/f40.jpg" alt="Voiture 2"></div>
                <div class="slide"><img src="media/mustang.jpg" alt="Voiture 3"></div>
                <!-- Ajoutez des slides supplémentaires ici -->
            </div>
            <div class="arrows">
                <span class="prev">&#10094;</span>
                <span class="next">&#10095;</span>
            </div>
        </div>

        <div class="content">
            <h1>Bienvenue chez SportCar Location</h1>
            <p>Louez la voiture de vos rêves en quelques clics !</p>
        </div>
    </header>
    <?php
if (isset($_POST['user_action']) && $_SESSION['connexion']=='Connexion'){
    if ($_POST['user_action'] == $_SESSION['connexion']){
        include_once('include/login_client.php');
    }
    elseif($_POST['user_action'] == 'signin'){
        include_once('include/signin_client.php');
    }
}
?>

    <script src="js/slider.js"></script>
</body>
</html>
