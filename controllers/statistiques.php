<?php
    $titre = "Statistiques des ventes";
    include 'views/includes/head.php';
    require 'navControler.php';

    navControl();
    include 'views/statistique.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>