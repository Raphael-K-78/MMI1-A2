<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="css/header.css">
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
                    </button>
                </form>
            </li>
        </ul>
    </nav>
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
