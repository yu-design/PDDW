<?php
    $titre = "Historique des commandes";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'helpers.php';
    navControl();

    $Utilisateur = Utilisateur::getUtilisateurParLogin($_SESSION['login']);
    

    include 'views/historique_commande.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';