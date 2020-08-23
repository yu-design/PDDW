<?php
    $titre = "Modifier l'utilisateur";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'helpers.php';
    navControl();

    $Utilisateur = Utilisateur::getUtilisateurParLogin($_SESSION['login']);
    
    if($Utilisateur->RoleUtilisateur_ID=="1"){ //admin
        /*
        if(!empty($_POST)){
            $actif = true;
            $password=helpers::verifPass($_POST['login']);
            Utilisateur::modifierUtilisateur($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
            $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
            header("Location: ".ROOT_PATH);
            exit();
        }
        */
    }

    elseif($Utilisateur->RoleUtilisateur_ID=="2"){ // vendeur
        /*
        if(!empty($_POST)){
            $actif=true;
            Utilisateur::modifierUtilisateur($user['Login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
            $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
            header("Location: ".ROOT_PATH);
            exit();
        }
        */
    }
    
    elseif($Utilisateur->RoleUtilisateur_ID=="3"){ //client
        /*
        if(!empty($_POST)){
            $actif=true;
            Utilisateur::modifierUtilisateur($user['Login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
            $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
            header("Location: ".ROOT_PATH);
            exit();
        }
        */
    }

        
    include 'views/modifier_utilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';