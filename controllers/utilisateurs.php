<?php
    $titre = "Nouveautés";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';
    require 'models/utilisateurAdmin.php';
    
    if (!REQ_ACTION) {
        // Afficher tous les profils utilisateurs
        if(!REQ_TYPE_ID){
            $utilisateurs = utilisateur::getAll();
            include 'views/afficher_utilisateurs.php';
        }
        else{
            //S'il y a une formulaire, on peut faire une modification de son propre profil
            if(!empty($_POST)){
                $utilisateur = utilisateur::getUtilisateurParID(REQ_TYPE_ID);
                $actif = empty($_POST['actif'])?1:0;
                $resultat = utilisateurAdmin::modifierUtilisateurAdmin($utilisateur->ID, $_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                if($resultat){
                    $messageErreur = $resultat;
                    $utilisateur = utilisateur::getUtilisateurParID($_SESSION['id']);
                    include 'views/modifier_profil.php';
                }else{
                    $utilisateur = utilisateur::getUtilisateurParID($_SESSION['id']);
                    include 'views/modifier_profil.php';
                }
            }
            // Afficher son profil
            else{
                $titre = "Modifier son compte";
                $utilisateur = utilisateur::getUtilisateurParID(REQ_TYPE_ID);    // Laisser Login à la place de ID
                include 'views/modifier_profil.php';
            }
        }

    }else if(REQ_ACTION == 'Modifier'){
        // S'il y a une formulaire, on peut faire une modification du profil de l'utilisateur
        if(!empty($_POST)){
            $utilisateur = utilisateur::getUtilisateurParID(REQ_TYPE_ID);
            $_SESSION['passModif'] = $utilisateur->Pass;
            $actif = empty($_POST['actif'])?0:1;
            $resultat = utilisateurAdmin::modifierUtilisateurAdministrationAdmin($utilisateur->ID, $_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $_POST['role'], $actif);
            if($resultat){
                $messageErreur = $resultat;
                $utilisateur = utilisateur::getUtilisateurParID(REQ_TYPE_ID);
                include 'views/modifier_profil.php';
            }else{
                $messageInfo = "Votre profil à bien été mis à jour";
                $utilisateurs = utilisateur::getAll();
                include 'views/afficher_utilisateurs.php';
            }
        }
        // Afficher le profil de l'utilisateur (Admin)
        else{
            $utilisateur = utilisateur::getUtilisateurParID(REQ_TYPE_ID);
            $titre = "Gérer utilisateur ".$utilisateur->Login;
            include 'views/gerer_utilisateur.php';
        }
    }
    

    navControl();
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>

