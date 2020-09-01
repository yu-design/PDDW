<?php
    $titre = "Nouveautés";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';


    //$article = article::getAllActive();

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
    //$articles = article::getAllActive();
//    $articles = article::getAllParType($pages, $premierParPage, $_SESSION['TypeArticle_ID']);
    
    // affichage de tout les mangas si pas d'id défini
    if (!REQ_TYPE_ID) {
        $articles = article::getAllActive();
        include 'views/articles.php';
    }

    else {
        $article = article::getArticleParID(REQ_TYPE_ID);
        if(empty($_SESSION['role']) || $_SESSION['role'] == USER)
        {
            include 'views/article_description.php';     
        }
        else
        {
            include 'views/gerer_article.php';
        }
                
    }

/*    //Afficher articles
    if(!empty($_POST['IDArticle'])){
        $_SESSION['IDArticle'] = $_POST['IDArticle'];
        $articleDescription = article::getArticleParId($_POST['IDArticle']);
        $_SESSION['TitreArticle'] = $articleDescription->Titre;
        header("Location: ".ROOT_PATH."article_description");
    }

    //Ajouter au pannier
    if(!empty($_POST['panier'])){
        $_SESSION['panier'] = $_POST['panier'];
        header("Location: ".ROOT_PATH."panier");
    }
*/

    navControl();
    include 'views/articles.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>