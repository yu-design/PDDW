<?php
    $titre = "S'enregistrer";
    include 'views/includes/head.php';
    include 'views/includes/nav.php';
    require 'models/users.php';
    
    if(!empty($_POST)) {
        if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
        {
            //vérification du mot de passe
            if($_POST['password'] != $_POST['confirm_password']){
                $errorMessage = "Votre mot de passe ne correspond pas.";
            }
            else { //vérifier que le login ou l'adresse mail n'existe pas
                $user = getUtilisateurParLogin($_POST['login']);
                $mail = getUtilisateurParMail($_POST['email']);
                if($user){
                    $errorMessage = "Le login ".$_POST['login']." existe déjà...";
                }
                else if($mail){
                    $errorMessage = "Le mail ".$_POST['email']." existe déjà...";
                }else{
                    creeUtilisateur($_POST['login'], $_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom']);
                //ici je connecte directement l'user qui vient de s'inscrire
                $user = getUtilisateurParLogin($_POST['login']);
                $_SESSION['id'] = $user['ID'];
                $_SESSION['login'] =  $user['Login'];
                $_SESSION['role'] = $user['RoleUtilisateur_ID'];
                            echo $_SESSION['id'];
                header("Location: ".ROOT_PATH);
                exit();
                }
            }
        }
        else
        {
            //Ici on va prévenir l'utilisateur qu'il manque quelque chose
            $errorMessage = "Une information est manquante, veuillez réessayer !";
        }
    }

    include 'views/modifUtilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

