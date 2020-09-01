<?php
    $titre = "Se connecter";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';
    
    if(!empty($_SESSION['id'])){
        header("Location: ".ROOT_PATH);
        exit();
    }

    if(!empty($_POST)) {
        if(!empty($_POST['login']) && !empty($_POST['password']))
        {
            $utilisateur = Utilisateur::verifierSiUtilisateurExiste($_POST['login'], $_POST['password']);
            if($utilisateur && password_verify($_POST['password'],$utilisateur->Pass))
            {
                //Authentification OK
                $_SESSION['id'] = $utilisateur->ID;
                $_SESSION['login'] = $utilisateur->Login;
                $_SESSION['mail'] = $utilisateur->AdresseMail;
                $_SESSION['password'] = $utilisateur->Pass;
                $_SESSION['role'] = $utilisateur->RoleUtilisateur_ID;
                $_SESSION['panier'] = [];
                header("Location: ".ROOT_PATH);
                exit();
            }
            else if ($utilisateur==NULL)
            {
                //Utilisateur désactivé de la db
                $messageErreur = "L'utilisateur n'existe pas !";
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
    
    navControl();
    include 'views/connexion.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>