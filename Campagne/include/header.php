<header></header>
    <nav>
        <i class="fas fa-bars hamburger"></i>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="Guide.php">Guide</a></li>
            <li><a href="Campagne.php">La Campagne</a></li>
            <li><a href="Quizz.php">Quizz</a></li>
<?php
            if($_SESSION['connexion'] == 'Déconnexion'){
                echo "<li><a href='compte.php'>Mon compte</a></li>";
            }
            ?>
            <li class="login">
                <form action="" method="POST" class="login-form">
                    <input type="hidden" name="user_action" value="<?php echo $_SESSION['connexion']; ?>">
                    <button type="submit" class="login-button">
                        <i class="fas fa-user"></i> <?php echo $_SESSION['connexion']; ?>
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <script>
        document.querySelector('.hamburger').addEventListener('click', function() {
            document.querySelector('nav').classList.toggle('show');
        });
    </script>
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
