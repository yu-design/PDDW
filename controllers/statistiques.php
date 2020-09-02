<?php
    $titre = "Statistiques des ventes";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';

    global $db;
    $reponse = "SELECT COUNT(VA.Article_ID) AS 'Nombre', a.Titre AS 'Titre', A.ID 
                FROM article AS a 
                INNER JOIN venteArticle AS VA ON VA.Article_ID = a.ID 
                INNER JOIN vente AS V ON V.ID = VA.Vente_ID
                GROUP BY A.ID ORDER BY COUNT(VA.Article_ID) DESC LIMIT 5;";
    $stmt = $db->prepare($reponse);
    $stmt->execute();
    $arr = $stmt->fetchAll();

    navControl();
    include 'views/statistique.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>