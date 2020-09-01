<?php
    $titre = "Nouveautés";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';
    require 'models/articleAdmin.php';
    
    if(!REQ_ACTION){
        if (!REQ_TYPE_ID) {
            $articles = article::getAllActive();
            include 'views/articles.php';
        }
        else {
            $article = article::getArticleParID(REQ_TYPE_ID);
            include 'views/articleDescription.php';
        }
    }
    
    else if(REQ_ACTION == "Ajouter"){
        if(!empty($_POST)){
            $article = article::getArticleParID(REQ_TYPE_ID);
            if(!empty($_POST)) {
                if(!empty($_POST['EAN']) && !empty($_POST['ISBN']) && !empty($_POST['typeArticle_ID']) && !empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['dessinateur']) && !empty($_POST['edition']) && !empty($_POST['collection']) && !empty($_POST['prix']) && !empty($_POST['date'])){
                    $restultat = articleAdmin::ajouterNouveauArticleVerif($_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_id'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date']);
                    $articles = article::getAll();
                    include 'views/afficher_articles.php';    
                }else{

                }
            }else{
                include 'views/ajouter_article.php';
            }
        }else{
            $article = article::getArticleParID(REQ_TYPE_ID);
            include 'views/ajouter_article.php';
        }
    }
    
    else if(REQ_ACTION == "AdminArticle"){
        $articles = article::getAll(REQ_TYPE_ID);
        include 'views/afficher_articles.php';
    }
    
    else if(REQ_ACTION == "Modifier"){
        if(!empty($_POST)){
            if(!empty($_POST['EAN']) && !empty($_POST['ISBN']) && !empty($_POST['typeArticle_ID']) && !empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['dessinateur']) && !empty($_POST['edition']) && !empty($_POST['collection']) && !empty($_POST['prix']) && !empty($_POST['date'])){
                $article = article::getArticleParID(REQ_TYPE_ID);
                $resultat = articleAdmin::modifierArticleVerif($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $_FILES['couverture'], $_POST['actif']);
                $articles = article::getAll(REQ_TYPE_ID);
                include 'views/afficher_articles.php';
            }else{
                //Ici on va prévenir l'utilisateur qu'il manque quelque chose
                $messageErreur = "Une information est manquante, veuillez réessayer !";
                $article = article::getArticleParID(REQ_TYPE_ID);
                include 'views/gerer_article.php';    
            }

        }else{
            $article = article::getArticleParID(REQ_TYPE_ID);
            include 'views/gerer_article.php';
        }
    }
    
    
    navControl();
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

    
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
    
    //$articles = article::getAllActive();
    //    $articles = article::getAllParType($pages, $premierParPage, $_SESSION['TypeArticle_ID']);
    */

?>