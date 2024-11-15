<div class="popup" id="popup">
        <div class="popup-content">
            <a href='#'><span class="close" id="close-popup">&times;</span></a>        
            <h2>Inscription</h2>
            <form action="#" method="POST" id="signup-form" enctype="multipart/form-data">
                <input type="text" name="nom" placeholder="Nom" maxlength="64" required>
                <input type="text" name="prenom" placeholder="Prénom" maxlength="32" required>
                <input type="text" name="pseudo" placeholder="Pseudo" maxlength="16" required>
                <input type="email" name="email" placeholder="Email" maxlength="256" required>
                <input type="password" name="password" placeholder="Mot de passe" maxlength="64" required>
                <input id='file' type='file' name='pp' accept='image/*' required>
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
    <script src="js/close-popup.js"></script>
    <script>
        document.getElementById('file').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file && file.size > 2 * 1024 * 1024) { 
                alert('La taille du fichier doit être inférieure à 2 Mo.');
                event.target.value = '';
            }
        });
    </script>