<?php 
function verif_auth($id,$pwd){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db)) ;
    $data = mysqli_query($db,"SELECT Email,`password`,id_cl FROM Client;") or die (mysqli_error($db));
    while ($info = mysqli_fetch_assoc($data)){
        if($info['Email'] == $id && $info['password'] == $pwd){
            $_SESSION['connexion'] = 'Déconnexion';
            $_SESSION["id_cl"] = $info['id_cl'];
            return $_SESSION['connexion'] = 'Déconnexion';
        }
    }
}

function create_account($nom,$prenom,$adresse,$password,$email){
    $db = mysqli_connect("localhost", "   ", "   ", "   ") ;
    mysqli_query($db, "INSERT INTO `Client`(nom, prenom,Email, Adresse, `password`) VALUES ( '$nom', '$prenom', '$email','$adresse','$password');") or die(mysqli_error($db));
    mysqli_close($db);
}

session_start();
if (empty($_SESSION['connexion'])){
    $_SESSION['connexion'] = 'Connexion';
}
else{
    if($_SESSION['connexion'] == 'Connexion' && isset($_POST['username']) && isset($_POST['password'])){
        verif_auth($_POST['username'],$_POST['password']);
    }
    elseif($_SESSION['connexion'] == 'Déconnexion' && isset($_POST['user_action'])){
        if($_POST['user_action'] == "Déconnexion"){
            session_destroy();
            $_SESSION['connexion'] = 'Connexion';
        }
    }
    elseif($_SESSION['connexion'] == 'Connexion' && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['password']) && isset($_POST['email']) ){
        create_account($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['password'],$_POST['email']);
    }
}

?>