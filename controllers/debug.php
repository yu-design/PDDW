<?php
    $titre = "Débugueur de choc !";
    include 'views/includes/head.php';
    require 'navControler.php';
    
    require 'models/utilisateur.php';
    
    $recupUtilisateur = utilisateur::getUtilisateurParLogin($_SESSION['login']);
    echo $_SESSION['panier'];
    
    navControl();
    include 'views/debug.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>