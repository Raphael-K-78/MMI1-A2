<?php
$db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db)) ;
$compte = mysqli_query($db,"SELECT nom, prenom, Email, Adresse, password FROM `Client` WHERE id_cl = {$_SESSION['id_cl']};");
while($usercompte = mysqli_fetch_assoc($compte)){
?>
<div class="popup" id="popup">
    <div class="popup-content">
    <a href='#'><span class="close" id="close-popup">&times;</span></a>        <h2>Modifier</h2>
        <form action="#" method="POST" id="signup-form">
            <input type="text" name="nom" placeholder="Nom" value='<?php echo $usercompte['nom']; ?>' required>
            <input type="text" name="prenom" placeholder="Prénom" value='<?php echo $usercompte['prenom']; ?>' required>
            <input type="email" name="email" placeholder="Email" value='<?php echo $usercompte['Email']; ?>' required>
            <input type="text" name="adresse" placeholder="Adresse" value='<?php echo $usercompte['Adresse']; ?>' required>
            <input type="password" name="password" placeholder="Mot de passe" value='<?php echo $usercompte['password']; }?>' required>
            <button type="submit" name="user_action" id='suppr'value="suppr">Supprimer</button>
            <button type="submit" name='user_action' value="apply_modif">Modifier</button>
        </form>
    </div>
</div>
<script src="js/close-popup.js"></script>
<link rel="stylesheet" href="css/pop-up.css">