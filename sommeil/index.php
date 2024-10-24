<?php
session_start();
if(empty($_SESSION['connect'])){
    $_SESSION['connect'] = 0;

}

if(empty($_SESSION['mod'] )){
    $_SESSION['mod'] ='dashboard';
}
if($_SESSION['mod'] != 'dashboard' && !isset($_POST["gestion"])){
    $_POST["gestion"]='afficher';
}

if(isset($_POST['mod'])){
    if($_SESSION['mod'] != $_POST['mod']){
        $_SESSION['mod'] = $_POST['mod'];
        $_POST['gestion'] = 'afficher';
    }
}


// Définir une durée de vie pour le cookie (par exemple, 1 heure)
$cookie_lifetime = 3600; // 1 heure en secondes

if(isset($_POST['psw']) && isset($_POST['auth']) && $_SESSION['connect'] == 0){
    verif_auth($_POST['auth'],$_POST['psw']);
    if($_SESSION['connect'] == 0){
        echo "<script>document.getElementById('refused').innerText = 'l'Identifiant ou le mot de passe est erroné. Réessayez';</script>";
    }
}

// Créer un cookie avec une durée de vie
setcookie("session_cookie", session_id(), time() + $cookie_lifetime, "/"); // "/" signifie que le cookie est disponible sur tout le site
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<script src="https://kit.fontawesome.com/4c96bf3b71.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club de Sommeil</title>
    <style>
        body{
            margin: 0;
        }
    /* Style pour le header */
    header {
    display: flex; /* Utilisation de flexbox pour aligner les éléments sur une ligne */
    justify-content: space-between; /* Répartition égale des éléments sur la ligne */
    align-items: center; /* Alignement vertical au centre */
    background-color: #1ccfcf; /* Nouvelle couleur de fond */
    padding: 20px; /* Espacement intérieur */
}

/* Style pour le titre */
h1 {
    margin: 0; /* Supprimer les marges par défaut */
    color: white; /* Couleur du texte */
    font-size: 24px; /* Taille de la police */
}

/* Style pour les boutons */
header button {
    background-color: #ffffff; /* Couleur de fond */
    color: #1ccfcf; /* Couleur du texte */
    border: none; /* Pas de bordure */
    padding: 10px 20px; /* Espacement intérieur */
    font-size: 16px; /* Taille de la police */
    cursor: pointer; /* Curseur de type pointeur */
}

/* Hover sur les boutons */
header button:hover {
    background-color: #f2f2f2;
}


    /* Style du tableau */
table {
    width: 100%; /* Utiliser toute la largeur disponible */
    border-collapse: collapse; /* Fusionner les bordures des cellules */
    margin-top: 20px; /* Marge supérieure */
}

/* Style des en-têtes de colonnes */
th {
    background-color: #f2f2f2; /* Couleur de fond */
    padding: 8px; /* Espacement intérieur */
    text-align: left; /* Alignement du texte */
    border-bottom: 1px solid #ddd; /* Bordure inférieure */
}

/* Style des cellules */
td {
    padding: 8px; /* Espacement intérieur */
    text-align: left; /* Alignement du texte */
    border-bottom: 1px solid #ddd; /* Bordure inférieure */
}

/* Style pour la première colonne */
td:first-child {
    font-weight: bold; /* Texte en gras */
}

/* Style pour les cellules de boutons */
td button {
    padding: 5px 10px; /* Espacement intérieur */
    color: black; /* Couleur du texte */
    border: none; /* Pas de bordure */
    cursor: pointer; /* Curseur de type pointeur */
}

/* Hover sur les boutons */
td button:hover {
    color:grey ;
}

    
    
#close,#close2 {
    position: absolute; /* Position absolue pour placer le bouton en fonction du conteneur parent */
    top: 10px; /* Distance du haut */
    right: 10px; /* Distance de la droite */
    width: 30px; /* Largeur du bouton */
    height: 30px; /* Hauteur du bouton */
    background-color: transparent; /* Fond transparent */
    border: none; /* Pas de bordure */
    cursor: pointer; /* Curseur de type pointeur */
    size:10px;
    color: red;
}

/* Style de la rangée */
.row {
    display: flex;
    justify-content: space-between;
}

/* Style de la colonne */
.column {
    flex: 1;
    margin-right: 10px;
}

/* Style du formulaire */
#form2 {
    position: fixed;
    top: 50%; /* Centre verticalement */
    left: 50%; /* Centre horizontalement */
    transform: translate(-50%, -50%);
    width: 75%; /* Largeur du formulaire */
    background-color: #f4f4f4; /* Couleur de fond */
    padding: 20px;
    border-radius: 10px; /* Coins arrondis */
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); /* Ombre */
    height: auto; /* Hauteur automatique */

}

/* Style des labels */
#form2 label {
    display: block;
    margin-bottom: 5px;
}

/* Style des inputs */
.cote{
    display: flex; /* Pour s'assurer que les éléments restent sur la même ligne */
    margin-right: -50px; /* Espacement horizontal entre les éléments */
}

.cote label{
    width: 100px;
}

#form2  .cote  label{
    display: flex;
}
.dashboard {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    border-radius: 5px;
    background-color: #f0f0f0;
}
i{
    text-align: center;
}
#form2 input[type='text'],
#form2 input[type='int'],
#form2 input[type='time'],
#form2 input[type='tel'],
#form2 input[type='submit'],
#form2 input[type='radio'],
#form2 input[type='password'] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; 
}

#form2 input[type='submit'] {
    background-color: #4CAF50; 
    color: white; 
    cursor: pointer;
}

#form2 input[type='submit']:hover {
    background-color: #45a049;
}

#form2 input[type='submit']:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
}
    </style>
</head>
<body>

<header>
    <form method="post">
        <button name="mod" value="joueur" type="submit">Joueur</button>
        <button name="mod" value="match" type="submit">Match</button>
        <button name="mod" value="dashboard" type="submit">DashBoard</button>
    </form>
    <h1>Gestion des membres</h1>
    <?php
    if($_SESSION['mod'] != 'dashboard'){
    echo"<form method='post'>
        <button name='gestion' value='afficher' type='submit'>Afficher</button>
        <button name='gestion' value='inserer' type='submit'>Insérer</button>
        <button name='gestion' value='supprimer' type='submit'>Supprimer</button>
    </form>";
    }
    else{
        echo'<p><p>';
    }
    ?>
    
</header>
<body>
    <!-- <form name='Manage' method="post">
        <label>Afficher</label><input type="radio"  value="afficher" name="gestion">
        <label>Insérer</label><input type="radio"  value="inserer" name="gestion">
        <label>Supprimer</label><input type="radio"  value="supprimer" name="gestion">
        <input type="submit">
    </form> -->

<?php
    
    // -------------------------------------------//
    // var_dump($_POST);
    // var_dump($_SESSION);
    // -------------------------------------------//

if($_SESSION['connect'] == TRUE){
    
    if($_SESSION['mod']== 'dashboard'){
        print_dashboard();
    }

if(isset($_POST['gestion'])){
    if($_POST['gestion'] == 'inserer' || isset($_POST["modifier"]) ){
        print_js();
    }
    if(isset($_POST["gestion"])){
        if($_POST["gestion"]==="afficher"){
            if($_SESSION['mod'] =='joueur'){
            afficheDB();
            }
            elseif($_SESSION['mod'] =='match'){
                afficheDB2();
            }
        }
        elseif($_POST["gestion"]==="inserer"){
            if($_SESSION['mod'] =='joueur'){
            print_insert();
            }
            elseif($_SESSION['mod'] =='match'){
                print_insert2();
            }
        }
        elseif($_POST["gestion"]==="supprimer"){
            if($_SESSION['mod'] =='joueur'){
            SupprDB();
        }
        elseif($_SESSION['mod'] =='match'){
            SupprDB2();
        }
        }
    }
}

    //inserer un élément dans la DB
    if(empty($_POST['action']) && isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["age"]) && isset($_POST["Status"]) && isset($_POST["adresse"]) && isset($_POST["record"]) && isset($_POST["gagne"]) && isset($_POST["perdu"]) && isset($_POST["tel"]) && isset($_POST["sexe"]) ){
        insert_db($_POST["prenom"],$_POST["nom"],$_POST["age"], $_POST["Status"],$_POST["adresse"],$_POST["record"],$_POST["gagne"],$_POST["perdu"],$_POST["tel"],$_POST["sexe"]);
        AfficheDB();
    }

    if(empty($_POST['action'])&& isset($_POST["nom"]) && isset($_POST["adversaire"]) && isset($_POST["date"]) && isset($_POST["resultat"])){
        insert_db2($_POST["nom"],$_POST["adversaire"],$_POST["date"],$_POST["resultat"]);
        afficheDB2();
    }

    //Afficher le formulaire de modification
    if(isset($_POST["modifier"])){
        if($_SESSION['mod'] =='joueur'){
            print_modif();
        }
        elseif($_SESSION['mod'] =='match'){
            print_modif2();
        }
    }

    //Supprimer la ligne
    if(isset($_POST['action'])){
        if ($_POST['action'] == 'supprimer'){
            if($_SESSION['mod'] =='joueur'){
            suppr_element_DB($_POST['id']);
            SupprDB();
            }
            elseif($_SESSION['mod'] =='match'){
                suppr_element_DB2($_POST['id']);
                SupprDB2();
            }
        }
        //appliquer les modifications
        elseif($_POST['action']=='modifier'){
            if($_SESSION['mod'] =='joueur'){
            modif_DB($_POST['id'], $_POST["prenom"],$_POST["nom"],$_POST["age"], $_POST["Status"],$_POST["adresse"],$_POST["record"],$_POST["gagne"],$_POST["perdu"],$_POST["tel"],$_POST["sexe"]);
            SupprDB();
            }
            elseif($_SESSION['mod'] =='match'){{
                modif_DB2($_POST['id'],$_POST["nom"],$_POST["adversaire"],$_POST["date"],$_POST["resultat"]);
                SupprDB2();
            }
        }
        }
}
}
else{
    print_connexion(); 
}

function recup_data($target){
    $db = mysqli_connect("localhost", "   ", "   ", "   ") ;
    $data = mysqli_query($db, "SELECT COUNT(*) as resultat from $target;") or die(mysqli_error($db));
    while ($result = mysqli_fetch_assoc($data)){
        return $result['resultat'];
    }
    mysqli_close($db);
}

function insert_db($prenom, $nom, $Age, $Status,$adresse, $Record, $Match_Gagne, $MathchPerdu, $telephone, $sexe) {
    $db = mysqli_connect("localhost", "   ", "   ", "   ") ;
    mysqli_query($db, "INSERT INTO Membres(Prenom, Nom, Age, Status, Adresse, Record, MatchWin, MatchLoose, phone,sexe) VALUES ('$prenom', '$nom', '$Age', '$Status','$adresse', '$Record', '$Match_Gagne', '$MathchPerdu', '$telephone','$sexe');") or die(mysqli_error($db));
    mysqli_close($db);
}

function modif_DB($id,$prenom, $nom, $Age, $Status,$adresse, $Record, $Match_Gagne, $MathchPerdu, $telephone, $sexe){
    $db = mysqli_connect("localhost", "   ", "   ", "   ");
    mysqli_query($db, "UPDATE Membres SET Prenom='$prenom', Nom='$nom', Age='$Age', Status='$Status', Adresse='$adresse', Record='$Record', MatchWin='$Match_Gagne', MatchLoose='$MathchPerdu', phone='$telephone', sexe='$sexe' WHERE ID=$id;");
    mysqli_close($db);
}

function suppr_element_DB($id){
    $db = mysqli_connect("localhost", "   ", "   ", "   ");
    mysqli_query($db,"DELETE FROM Membres WHERE ID = $id;");
    mysqli_close($db);
}

function afficheDB(){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db)) ;
    $data = mysqli_query($db,"SELECT Prenom,Nom,Age,Status,Adresse,MatchWin,MatchLoose,phone,sexe,Record FROM Membres") ;
    echo "<table><th>Prénom</th><th>Nom</th><th>Âge</th><th>Status</th><th>Adresse</th><th>Match Gagné</th><th>Match Perdu</th><th>Numéro de téléphone</th><th>Sexe</th><th>Record</th>";
    while ($membre = mysqli_fetch_assoc($data)){
        echo "<tr>";
        foreach($membre as $element){
            echo "<td>$element</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($db);
}

function SupprDB(){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db)) ;
    $data = mysqli_query($db,"SELECT Prenom,Nom,Age,Status,Adresse,MatchWin,MatchLoose,phone,sexe,Record,ID FROM Membres") or die (mysqli_error($db));
    // var_dump($data);
    echo "<table><th>Prénom</th><th>Nom</th><th>Âge</th><th>Status</th><th>Adresse</th><th>Match Gagné</th><th>Match Perdu</th><th>Numéro de téléphone</th><th>Sexe</th><th>Record</th>";
    while ($membre = mysqli_fetch_assoc($data)){
        echo "<tr>";
        foreach($membre as $indice => $element){
            if( $indice == 'ID'){
                echo "<td><form method='post'><button name='modifier' value='$element' type='submit'><i class='fa-solid fa-gear'></i></button></form></td>";
            }
            else{
                echo "<td>$element</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($db);
}


function print_modif(){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db));
      $id = $_POST['modifier'];
      $data = mysqli_query($db,"SELECT * FROM Membres WHERE ID=$id");
      $membre = mysqli_fetch_assoc($data);
      mysqli_close($db);
     echo "<div id='form2'> <form method='post'>
    <div class='row'>
        <div class='column'>
            <label>Prénom</label><input type='text' Placeholder='Prénom' value='{$membre['Prenom']}' name='prenom' required>
        </div>
        <div class='column'>
            <label>Nom</label><input type='text' Placeholder='Nom' name='nom' value='{$membre['Nom']}' required>
        </div>
    </div>
    <div>
        <label>Âge</label><input type='int' Placeholder='Âge' value='{$membre['Age']}' name='age' required>
    </div>
    <div>
        <label>Status</label>
            <div class='cote'><label for='Amateur'>Amateur</label><input type='radio' id='Amateur' value='Amateur' name='Status'></div>
            <div class='cote'><label for='Professionnel'>Professionnel</label><input type='radio' id='Professionnel' value='Professionnel' name='Status'></div>
    </div>
    <div>
        <Label>Adresse</label><input type='text' name='adresse' value='{$membre['Adresse']}' required>
    </div>
    <div>
        <Label>Record</label> <input type='time' name='record' value='{$membre['Record']}' required>
    </div>
    <div class='row'>
        <div class='column'>
            <label>Match Gagné</label><input type='int' name='gagne' value='{$membre['MatchWin']}' required>
        </div>
        <div class='column'>
            <label>Match Perdu</label><input type='int' name='perdu' value='{$membre['MatchLoose']}' required>
        </div>
    </div>
    <div>
        <label>Téléphone</label><input name='tel' type='tel' value='{$membre['phone']}' required>
    </div>
    <div>
        <label>Sexe</label>
        
        <div class='cote'><label>Homme</label><input type='radio' name='sexe' value='Homme' checked></div>
        <div class='cote'><label>Femme</label><input type='radio' name='sexe' value='Femme'></div>
        <div class='cote'><label>LGBTQIA+</label><input type='radio' name='sexe' value='LGBTQIA+'></div>
    </div>
    <input type='hidden' name='id' value='$id'>
    <input type='submit' name='action' value='modifier'>
    <input type='submit' name='action' value='supprimer' placeholder='Supprimer' style='background-color:red'> 
</form>
<form method='post'>
<button id='close2' name='gestion' value='supprimer' type='submit'><i class='fa-solid fa-xmark'></i></button></form>
</div>";
    if($membre['Status'] == 'Professionnel'){
        echo "<script>document.getElementById('Professionnel').setAttribute('checked','true');</script>";
    }
    else{
        echo "<script>document.getElementById('Amateur').setAttribute('checked','true');</script>";
    }
}

function print_js(){
    echo "<script>
    document.getElementById('close2').addEventListener('click', function() {
        // Récupérer tous les champs du formulaire
        const formFields = document.querySelectorAll(\"#form2 form input[type='text'], #form2 input[type='int'], #form2 input[type='time'], #form2 input[type='tel']\");

        // Réinitialiser la valeur de chaque champ du formulaire à vide
        formFields.forEach(field => {
            field.value = '';
        });

        // Réinitialiser les boutons radio à leur état initial
        document.getElementById('Amateur').checked = true; // Mettre Amateur comme choix par défaut pour le statut
        document.getElementById('Professionnel').checked = false;
        document.querySelector('#closeform').submit();
    });
</script>";
}

function print_insert(){
    echo "<div id='form2'><form method='post'>
    <div class='row'>
        <div class='column'>
            <label>Prénom</label><input type='text' Placeholder='Prénom' name='prenom' required>
        </div>
        <div class='column'>
            <label>Nom</label><input type='text' Placeholder='Nom' name='nom' required>
        </div>
    </div>
    <div>
        <label>Âge</label><input type='int' Placeholder='Âge' name='age' required>
    </div>
    <div>
        <label>Status</label>
            <div class='cote'><label for='Amateur'>Amateur</label><input type='radio' id='Amateur' value='Amateur' name='Status' checked></div>
            <div class='cote'><label for='Professionnel'>Professionnel</label><input type='radio' id='Professionnel' value='Professionnel' name='Status'></div>
    </div>
    <div>
        <Label>Adresse</label><input type='text' name='adresse' required>
    </div>
    <div>
        <Label>Record</label> <input type='time' name='record' required>
    </div>
    <div class='row'>
        <div class='column'>
            <label>Match Gagné</label><input type='int' name='gagne' required>
        </div>
        <div class='column'>
            <label>Match Perdu</label><input type='int' name='perdu' required>
        </div>
    </div>
    <input type='hidden' name='act' value='true'>
    <div>
        <label>Téléphone</label><input name='tel' type='tel' required>
    </div>
    <div>
        <label>Sexe</label>
        
        <div class='cote'><label>Homme</label><input type='radio' name='sexe' value='Homme' checked></div>
        <div class='cote'><label>Femme</label><input type='radio' name='sexe' value='Femme'></div>
        <div class='cote'><label>LGBTQIA+</label><input type='radio' name='sexe' value='LGBTQIA+'></div>
    </div>
    
    <input type='submit'>
</form>
<form method='post'>
<button id='close2' name='gestion' value='afficher' type='submit'><i class='fa-solid fa-xmark'></i></button></form></div>";
}

function verif_auth($id,$pwd){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db)) ;
    $data = mysqli_query($db,"SELECT Identifiant,password FROM Identifiant;") or die (mysqli_error($db));
    while ($info = mysqli_fetch_assoc($data)){
        if($info['Identifiant'] == $id && $info['password'] == $pwd){
            $_SESSION['connect'] = 1;
            return $_SESSION['connect'] = 1;
        }
    }
}

function print_connexion(){
    echo "<div id='form2'><form method='post'>
    <label id='refused'>Se connecter</label>
    <label>identifiant:</label>
    <input type='text' name='auth'>
    <label>Mot de passe:</label>
    <input type='password' name='psw'>
    <input type='submit' value='connexion' placeholder='Connexion'></form></div>";
}

function SupprDB2(){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db)) ;
    $data = mysqli_query($db,"SELECT Nom,Adversaire,`Date`,Resultat,ID FROM `Match`;") or die (mysqli_error($db));
    // var_dump($data);
    echo "<table><th>Nom</th><th>Adversaire</th><th>Date</th><th>Resultat</th>";
    while ($match = mysqli_fetch_assoc($data)){
        echo "<tr>";
        foreach($match as $indice => $element){
            if( $indice == 'ID'){
                echo "<td><form method='post'><button name='modifier' value='$element' type='submit'><i class='fa-solid fa-gear'></i></button></form></td>";
            }
            else{
                echo "<td>$element</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($db);
}

function afficheDB2(){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db)) ;
    $data = mysqli_query($db,"SELECT Nom,Adversaire,`Date`,Resultat FROM `Match`;") ;
    echo "<table><th>Nom</th><th>Adversaire</th><th>Date</th><th>Resultat</th>";
    while ($membre = mysqli_fetch_assoc($data)){
        echo "<tr>";
        foreach($membre as $element){
            echo "<td>$element</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($db);
}

function insert_db2($nom, $adversaire, $date, $resultat) {
    $db = mysqli_connect("localhost", "   ", "   ", "   ") ;
    mysqli_query($db, "INSERT INTO `Match`(Nom, Adversaire, `Date`, Resultat) VALUES ( '$nom', '$adversaire', '$date','$resultat');") or die(mysqli_error($db));
    mysqli_close($db);
}


function modif_DB2($id,$nom, $adversaire, $date, $resultat){
    $db = mysqli_connect("localhost", "   ", "   ", "   ");
    mysqli_query($db, "UPDATE `Match` SET  Adversaire='$adversaire', `Date`='$date', Resultat='$resultat' WHERE ID=$id;");
    mysqli_close($db);
}

function suppr_element_DB2($id){
    $db = mysqli_connect("localhost", "   ", "   ", "   ");
    mysqli_query($db,"DELETE FROM `Match` WHERE ID = $id;");
    mysqli_close($db);
}

function print_insert2(){
    echo "<div id='form2'><form method='post'>
        <div >
            <label>Nom</label><input type='text' Placeholder='tournois n°' name='nom' required>
        </div>
        <div >
            <label>Adversaire</label><input type='text' Placeholder='Adversaire' name='adversaire' required>
        </div>
    <div>
        <label>Date</label><input type='Date'  name='date' required>
    </div>
    <div>
        <label>Resultat</label>
            <div class='cote'><label for='Amateur'>Victoire</label><input type='radio' id='Amateur' value='Victoire' name='resultat' ></div>
            <div class='cote'><label for='Professionnel'>Défaite</label><input type='radio' id='Professionnel' value='Défaite' name='resultat'></div>
    </div>    
    <input type='hidden' name='act' value='true'>
    <input type='submit'>
</form>
<form method='post'>
<button id='close2' name='gestion' value='afficher' type='submit'><i class='fa-solid fa-xmark' ></i></button></form></div>";
}

function print_modif2(){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db));
      $id = $_POST['modifier'];
      $data = mysqli_query($db,"SELECT * FROM `Match` WHERE ID=$id");
      $membre = mysqli_fetch_assoc($data);
      mysqli_close($db);
      echo "<div id='form2'><form method='post'>
        <div >
            <label>Nom</label><input type='text' Placeholder='tournois n°' value='{$membre['NOM']}' name='nom' required>
        </div>
        <div >
            <label>Adversaire</label><input type='text' Placeholder='Adversaire' value='{$membre['Adversaire']}' name='adversaire' required>
        </div>
    <div>
        <label>Date</label><input type='Date'  value='{$membre['Date']}' name='date' required>
    </div>
    <div>
        <label>Resultat</label>
            <div class='cote'><label for='Amateur'>Victoire</label><input type='radio' id='Amateur' value='Victoire' name='resultat' ></div>
            <div class='cote'><label for='Professionnel'>Défaite</label><input type='radio' id='Professionnel' value='Défaite' name='resultat'></div>
    </div>    
    <input type='hidden' name='id' value='$id'>
    <input type='submit' name='action' value='modifier'>
    <input type='submit' name='action' value='supprimer' placeholder='Supprimer' style='background-color:red'> </form>
<form method='post'>
<button id='close2' name='gestion' value='supprimer' type='submit'><i class='fa-solid fa-xmark'></i></button></form></div>";
if($membre['Resultat'] == 'Défaite'){
    echo "<script>document.getElementById('Professionnel').setAttribute('checked','true');</script>";
}
else{
    echo "<script>document.getElementById('Amateur').setAttribute('checked','true');</script>";
}
}
function print_dashboard(){
    $membre_total = recup_data("Membres");
        $membre_pro = recup_data("Membres WHERE Status = 'Professionnel'");
        $membre_nopro = recup_data("Membres WHERE Status = 'Amateur'");
        $Match_total = recup_data("`Match`");
        $Match_futur = recup_data("`Match` WHERE `Date` > CURDATE()");
        $Match_Gagne = recup_data("`Match` WHERE Resultat = 'Victoire' AND `Date` <= CURDATE()");
        echo "<div class='dashboard'>
        <i class='fa-solid fa-users'></i>
        <p>Membre: $membre_total</p>
        <p>Membres Professionnels: $membre_pro</p>
        <p>Membres Amateurs: $membre_nopro</p>
        </div>";
        echo "<div class='dashboard'>
        <i class='fa-solid fa-bolt'></i>
        <p>Match:$Match_total</p>
        <p>Match Gagné: $Match_Gagne</p>
        <p>Match Prévu: $Match_futur</p>
        </div>";
}
?>


</body>
</html>