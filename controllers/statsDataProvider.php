<?php 

    require_once 'models/stats.php';
    $article = Stats::getStatVenteParTitre();
    echo json_encode($article);

?>