<?php
    $titre = "Nouveautés";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';
    
    if (!REQ_ACTION) {
        if(!REQ_TYPE_ID){
            $utilisateurs = utilisateur::getAll();
            include 'views/afficher_utilisateurs.php';
        }else{
            $titre = "Modifier son compte";
            $utilisateur = utilisateur::getUtilisateurParLogin(REQ_TYPE_ID);
            include 'views/modifier_profil.php';
        }

    }else if(REQ_ACTION == 'Modifier'){
        $utilisateur = utilisateur::getUtilisateurParID(REQ_TYPE_ID);
        $titre = "Gérer utilisateur ".$utilisateur->Login;
        include 'views/gerer_utilisateur.php';
    }else if(REQ_ACTION == 'ModifierProfil'){
        
    }else if(REQ_ACTION == 'ModifierUtilisateur'){
        
    }

    navControl();
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>

