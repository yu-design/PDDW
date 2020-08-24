<?php
    $titre = "Modifier l'utilisateur";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'helpers.php';
    navControl();

    $utilisateur = Utilisateur::getUtilisateurParLogin($_SESSION['login']);
    
    if($utilisateur->RoleUtilisateur_ID=="1"){ //admin
        /*
        if(!empty($_POST)){
            $actif = true;
            $login=utilisateur::getUtilisateurParLogin($_POST['login']);
            $mail=utilisateur::getUtilisateurParMail($_POST['email']);
            $password=helpers::verifPass($_POST['login']);
            Utilisateur::modifierUtilisateur($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
            $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
            header("Location: ".ROOT_PATH);
            exit();
        }
        */
    }

    elseif($utilisateur->RoleUtilisateur_ID=="2"){ // vendeur
        
        if(!empty($_POST)){
//            $passwordActif=$utilisateur['Pass'];
            $loginValide=helpers::verifLogin($_POST['login']);
            $password=helpers::verifPass($_POST['login'], $_POST['password'], $_POST['confirm_password']);
            $actif=helpers::verifActif($_POST['actif']);
            Utilisateur::modifierUtilisateur($user['Login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
            $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
            header("Location: ".ROOT_PATH);
            exit();
        }
        
    }
    
    elseif($utilisateur->RoleUtilisateur_ID=="3"){ //client
        /*
        if(!empty($_POST)){
            $mail=utilisateur::getUtilisateurParMail($_POST['email']);
            $password=helpers::verifPass($_POST['login']);
            $actif=helpers::verifActif($_POST['actif']);
            Utilisateur::modifierUtilisateur($user['Login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
            $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
            header("Location: ".ROOT_PATH);
            exit();
        }
        */
        if(!empty($_POST)){
            $messageInfo = $_POST['actif'];
        }else{
            $messageInfo = 0;
        }
    }

        
    include 'views/modifier_utilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';