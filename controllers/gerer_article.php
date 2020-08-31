<?php
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';

    $article = article::getArticleParID($_SESSION['IDArticle']);
    $titre = "Gérer articles ".$article->Titre;
    navControl();
    include 'views/gerer_article.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

?>