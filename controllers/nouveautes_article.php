<?php
    $titre = "Nouveautés";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';

    $article = article::getAll();

    // Reprend les nouveaux articles qui sont parrut dans les 15 derniers jours.

    // Pagination de la page
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $pageCourrante = (int) strip_tags($_GET['page']);
    }else{
        $pageCourrante = 1;
    }
    $nombreArticles = article::getNombreArticle();
    $nombreArticleParPage = 20;
    $pages = ceil($nombreArticles/$nombreArticleParPage);
    $premierParPage = ($pageCourrante * $nombreArticleParPage) - $nombreArticleParPage;
    $articles = article::getAll($pages, $premierParPage);
    
    navControl();
    include 'views/nouveaute_article.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>