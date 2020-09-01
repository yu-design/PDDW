<?php
    $titre = "Description du produit : ".$_SESSION['TitreArticle'];
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';

    $article = article::getArticleParID($_SESSION['IDArticle']);
    
    /*
    if(!empty($_POST['panier'])){
        $_SESSION['panier'] = $_POST['panier'];
        $_SESSION['TitreArticle'] = $articleDescription->Titre;
        header("Location: ".ROOT_PATH."panier");
    }
    */
    
    navControl();
    include 'views/article_description.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>