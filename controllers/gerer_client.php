<?php
    $titre = "Gestion des clients";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';

    // Pagination de la page
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $pageCourrante = (int) strip_tags($_GET['page']);
    }else{
        $pageCourrante = 1;
    }

    $nombreUtilisateur = utilisateur::getnombreUtilisateur();
    $nombreUtilisateurparPage = 20;
    $pages = ceil($nombreUtilisateur/$nombreUtilisateurparPage);
    $premierParPage = ($pageCourrante*$nombreUtilisateurparPage)-$nombreUtilisateurparPage;
    $utilisateur = Utilisateur::getAll($pages, $premierParPage);

    navControl();
    include 'views/gerer_client.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>