<?php
    $titre = "Nouveautés";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';
    require 'models/utilisateurAdmin.php';
    
    if (!REQ_ACTION) {
        if(!REQ_TYPE_ID){
            $utilisateurs = utilisateur::getAll();
            include 'views/afficher_utilisateurs.php';
        }
        else{
            if(!empty($_POST)){
                $utilisateur = utilisateur::getUtilisateurParLogin(REQ_TYPE_ID);
                $resultat = utilisateurAdmin::modifierUtilisateurAdmin($utilisateur->ID, $_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $POST['confirm_password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $_POST['role'], $_POST['actif']);
                include 'views/modifier_profil.php';
            }
            $titre = "Modifier son compte";
            $utilisateur = utilisateur::getUtilisateurParLogin(REQ_TYPE_ID);
            include 'views/modifier_profil.php';
        }

    }else if(REQ_ACTION == 'Modifier'){
        if(!empty($_POST)){
            $utilisateur = utilisateur::getUtilisateurParLogin(REQ_TYPE_ID);
            $resultat = utilisateurAdmin::modifierUtilisateurAdministrationAdmin($utilisateur->ID, $_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $POST['confirm_password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $_POST['role'], $_POST['actif']);
            $utilisateurs = utilisateur::getAll();
            include 'views/afficher_utilisateurs.php';
        }else{
            $utilisateur = utilisateur::getUtilisateurParID(REQ_TYPE_ID);
            $titre = "Gérer utilisateur ".$utilisateur->Login;
            include 'views/gerer_utilisateur.php';
        }
    }
    

    navControl();
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>

