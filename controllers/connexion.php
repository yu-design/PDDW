<?php
    $titre="Se connecter";
    include 'views/includes/head.php';
    include 'views/includes/nav.php';
    require 'models/users.php';
    
    function isValidUser($login, $password) {
        $user = getUserByLogin($login);
        //Ici on va vérifier si le login/pass est bon
        if($user && password_verify($password, $user['Pass'] ))
        {
            return $user;
        }
    }

    if(!empty($_SESSION['id'])){
        header("Location: ".ROOT_PATH);
        exit();
    }

    if(!empty($_POST)) {
        if(!empty($_POST['login']) && !empty($_POST['password']))
        {
            $user = isValidUser($_POST['login'], $_POST['password']);
            if($user)
            {
                //Authentification OK
                $_SESSION['id'] = $user['ID'];
                $_SESSION['login'] = $user['Login'];
                $_SESSION['role'] = $user['RoleUtilisateur_ID'];
                $_SESSION['message'] = "Bienvenue ".$user['Pseudo'];
                header("Location: ".ROOT_PATH."welcome");
                exit();
            }
            else
            {
                //Authentification NOK
                $_SESSION['error'] = "Mauvais login et/ou password !";
            }
        }
        else
        {
            //Ici on va prévenir l'utilisateur qu'il manque quelque chose
            $_SESSION['error'] = "Il manque une information login ou password !";
        }
    }

    include 'views/connexion.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>