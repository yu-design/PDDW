<?php
    $titre="Se connecter";
    include 'views/includes/head.php';
    include 'views/includes/nav.php';
    require 'models/users.php';
    
    if(!empty($_SESSION['id'])){
        header("Location: ".ROOT_PATH);
        exit();
    }

    if(!empty($_POST)) {
        if(!empty($_POST['login']) && !empty($_POST['password']))
        {
            $user = verifierSiUtilisateurExiste($_POST['login'], $_POST['password']);
            if($user)
            {
                //Authentification OK
                $_SESSION['id'] = $user['ID'];
                $_SESSION['login'] = $user['Login'];
                $_SESSION['role'] = $user['RoleUtilisateur_ID'];
                header("Location: ".ROOT_PATH);
                exit();
            }
            else
            {
                //Authentification NOK
                $messageErreur = "Mauvais login et/ou mot de passe !";
            }
        }
        else
        {
            //Ici on va prévenir l'utilisateur qu'il manque quelque chose
            $messageErreur = "Il manque une information login ou password !";
        }
    }

    include 'views/connexion.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>