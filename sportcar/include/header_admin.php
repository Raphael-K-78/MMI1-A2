<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../css/header.css">
<header>
    <nav>
        <div class="logo">SportCar Location</div>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="client.php">Client</a></li>
            <li><a href="facture.php">Facture</a></li>
            <li><a href="voiture.php">Voiture</a></li>
            <li class="login">
                <form action="" method="POST" class="login-form">
                    <input type="hidden" name="admin_action" value="<?php echo $_SESSION['admin_connexion']; ?>">
                    <button type="submit" class="login-button">
                        <i class="fas fa-user"></i><?php echo $_SESSION['admin_connexion']; ?>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</header>

