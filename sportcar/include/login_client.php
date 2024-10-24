<div class="popup" id="popup">
        <div class="popup-content">
            <a href='#'><span class="close" id="close-popup">&times;</span></a>
            <h2>Connexion</h2>
            <form action="#" method="POST">
                <input type="email" name="username" placeholder="email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
            <p>Vous n'avez pas de compte ? <form action="" method="POST" id="create-account-form">
    <input type="hidden" name="user_action" value="signin"><button type="submit" id='create-account'>Créer un compte</button></form>
        </div>
    </div>
    <script src="js/close-popup.js"></script>
    <link rel="stylesheet" href="css/pop-up.css">