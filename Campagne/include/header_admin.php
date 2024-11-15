    <nav>
        <i class="fas fa-bars hamburger"></i>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="quizz.php">Quizz</a></li>
            <li><a href="user.php">Utilisateur</a></li>
            <li class="login">
                <form action="" method="POST" class="login-form">
                    <input type="hidden" name="admin_action" value="<?php echo $_SESSION['admin_connexion']; ?>">
                    <button type="submit" class="login-button">
                        <i class="fas fa-user"></i> <?php echo $_SESSION['admin_connexion']; ?>
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
if (empty($_SESSION['admin_connexion'])){
    include_once('../include/login_admin.php');
}

if(isset($_SESSION['admin_connexion'])){
    if( $_SESSION['admin_connexion']=='Connexion'){
        include_once('../include/login_admin.php');
    }
    elseif($_SESSION['admin_connexion'] == 'Déconnexion' && isset($_POST['admin_action'])){
        if($_POST['admin_action'] == "Déconnexion"){
            include_once('../include/login_admin.php');
        }
    }
}

?>
