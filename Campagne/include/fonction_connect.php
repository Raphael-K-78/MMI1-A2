<?php 
    function verif_auth($id, $pwd) {
        $db = mysqli_connect("localhost", "  ", "  ", "  ") or die(mysqli_error($db));
        $data = mysqli_query($db, "SELECT Email, `Mot_de_passe`, id_user FROM `Utilisateur`") or die(mysqli_error($db));
        while ($info = mysqli_fetch_assoc($data)) {
            if ($info['Email'] == $id && $info['Mot_de_passe'] == $pwd) {
                $_SESSION['connexion'] = 'Déconnexion';
                $_SESSION["id_user"] = $info['id_user'];
                return $_SESSION['connexion'] = 'Déconnexion';
            } else {
                $error = true;
            }
        }
        mysqli_close($db);
    }

    function uploadImage($inputName, $dir) {
        $fileName = basename($_FILES[$inputName]['name']);
        $fileTmpName = $_FILES[$inputName]['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid() . '.' . $fileExtension;
        $uploadFile = $dir . '/' . $newFileName;

        if (move_uploaded_file($fileTmpName, $uploadFile)) {
            return $dir . '/' . $newFileName;
        } else {
            return false;
        }
    }

    function create_account($nom, $prenom, $pseudo, $email, $password) {
        $db = mysqli_connect("localhost", "  ", "  ", "  ") or die(mysqli_error($db));
        $uploadDir = 'media/user_pp';

        // Vérifiez si le fichier est téléchargé et si sa taille est inférieure à 2 Mo
        if ($_FILES['pp']['size'] <= 2 * 1024 * 1024) {
            $image = uploadImage('pp', $uploadDir);
        } else {
            $image = false;
        }

        if ($image !== false) {
            $query = "INSERT INTO Utilisateur (Nom, Prenom, Pseudo, Email, Mot_de_passe, Photo_de_profil) VALUES ('$nom', '$prenom', '$pseudo', '$email', '$password', '$image')";
            mysqli_query($db, $query) or die(mysqli_error($db));
            mysqli_close($db);
        } else {
            echo "<script> alert('Erreur lors du téléchargement de l'image. La taille du fichier doit être inférieure à 2 Mo.')</script>";
        }
    }

    session_start();
    if (empty($_SESSION['connexion'])) {
        $_SESSION['connexion'] = 'Connexion';
    } else {
        if ($_SESSION['connexion'] == 'Connexion' && isset($_POST['username']) && isset($_POST['password'])) {
            verif_auth($_POST['username'], $_POST['password']);
            if ($_SESSION['connexion'] == 'Connexion'){
                echo "<script>alert(\"identifiant et/ou mot de passe non valide \")</script>";
            }
        } elseif ($_SESSION['connexion'] == 'Déconnexion' && isset($_POST['user_action'])) {
            if ($_POST['user_action'] == "Déconnexion") {
                session_destroy();
                $_SESSION['connexion'] = 'Connexion';
            }
        } elseif ($_SESSION['connexion'] == 'Connexion' && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['email'])) {
            create_account($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['password']);
        }
    }
    ?>