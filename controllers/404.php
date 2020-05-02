<?php
    $titre = 'Erreur 404';
    include 'views/includes/head.php';
    require 'navControler.php';
    navControl();
    http_response_code(404);
    include 'views/404.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>