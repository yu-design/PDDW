<?php
    $titre = "Gestion des clients";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';

    /*
    // Pagination de la page
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $pageCourrante = (int) strip_tags($_GET['page']);
    }else{
        $pageCourrante = 1;
    }
    $nombreUtilisateur = utilisateur::getnombreUtilisateur();
    $nombreUtilisateurparPage = 5;
    $pages = ceil($nombreUtilisateur/$nombreUtilisateurparPage);
    $premierParPage = ($pageCourrante*$nombreUtilisateurparPage)-$nombreUtilisateurparPage;
    */
    
    $utilisateurs = utilisateur::getAll();
    
    if(!empty($_POST)){
        $_SESSION['loginModif'] = $_POST['login'];
        $utilisateurModif = utilisateur::getUtilisateurParLogin($_POST['login']);
        $_SESSION['passModif'] = $utilisateurModif->Pass;
        header("Location: ".ROOT_PATH."gerer_utilisateur");
    }
    
    navControl();
    include 'views/afficher_utilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>