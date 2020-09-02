<?php 
    $titre = "Listing commandes";
    require 'models/commande.php';
    include 'views/includes/header.php';

    $commandes = Commande::getListingCommande();

    navControl();
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
    include 'views/venteListing.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>