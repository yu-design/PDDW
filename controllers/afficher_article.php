<?php
    $titre = "Gestion des clients";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';

    /* Pagination de la page
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $pageCourrante = (int) strip_tags($_GET['page']);
    }else{
        $pageCourrante = 1;
    }
    $nombreArticle = article::getNombreArticle();
    $nombreArticleparPage = 2;
    $pages = ceil($nombreArticle/$nombreArticleparPage);
    $premierParPage = ($pageCourrante*$nombreArticleparPage)-$nombreArticleparPage;
    $articles = article::getAllPagination($nombreArticleparPage, $premierParPage);
    */

    $articles = article::getAll();
    
    if(!empty($_POST)){
        $_SESSION['IDArticle'] = $_POST['ID'];
        header("Location: ".ROOT_PATH."gerer_article");
    }
    
    navControl();
    include 'views/afficher_article.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>