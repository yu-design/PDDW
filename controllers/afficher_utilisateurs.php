<?php
    require 'models/utilisateur.php';

    $utilisateur = Utilisateur::getAll();
    $titre="Bédébile - Gérer les utilisateurs";
    
    include 'views/includes/head.php';
    require 'navControler.php';
    navControl();
    include 'views/includes/header.php';
    include 'views/gerer_utilisateur.php';

    include 'views/includes/main.php';
    include 'views/includes/footer.php';

?>