<?php
    $titre = "Nouveautés";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';


    $article = article::getAllActive();

    //if()
/*
    // Pagination de la page
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $pageCourrante = (int) strip_tags($_GET['page']);
    }else{
        $pageCourrante = 1;
    }
    $nombreArticles = article::getNombreArticle();                                                      //21
    $nombreArticleParPage = 20;                                                                         //20 / page
    $pages = ceil($nombreArticles/$nombreArticleParPage);                                               //pages = 21 / 20 -> 2 pages
    $premierParPage = ($pageCourrante * $nombreArticleParPage) - $nombreArticleParPage;                 //premierParPage = (1*20)-20 -> 20              LIMIT 0,20
    //$articles = article::getAllPagination($premierParPage,$pages);
    */
    $articles = article::getAllActive();
//    $articles = article::getAllParType($pages, $premierParPage, $_SESSION['TypeArticle_ID']);
    
    navControl();
    include 'views/articles.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>