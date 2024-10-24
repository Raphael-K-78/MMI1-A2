<?php
session_start();

function verif_auth($login,$pwd){
    $db = mysqli_connect("localhost","   ","   ","   ") or die (mysqli_error($db)) ;
    $data = mysqli_query($db,"SELECT `login`,`password`,id_ad FROM `Admin`;") or die (mysqli_error($db));
    while ($info = mysqli_fetch_assoc($data)){
        if($info['login'] == $login && $info['password'] == $pwd){
            $_SESSION['admin_connexion'] = 'Déconnexion';
            $_SESSION["id_admin"] = $info['id_ad'];
            $_SESSION['admin_connexion'] = 'Déconnexion';
            return $_SESSION['admin_connexion'] = 'Déconnexion';
        }
    }
}

if (isset($_POST['password']) && isset($_POST['login'])){
    verif_auth($_POST['login'],$_POST["password"]);
}

if (empty($_SESSION['admin_connexion'])){
    $_SESSION['admin_connexion'] = 'Connexion';
    include_once('../include/login_admin.php');
}

if(isset($_SESSION['admin_connexion'])){
    if( $_SESSION['admin_connexion']=='Connexion'){
        include_once('../include/login_admin.php');
    }
    elseif($_SESSION['admin_connexion'] == 'Déconnexion' && isset($_POST['admin_action'])){
        if($_POST['admin_action'] == "Déconnexion"){
            session_destroy();
            $_SESSION['admin_connexion'] = 'Connexion';
            include_once('../include/login_admin.php');
        }
    }
}

?>