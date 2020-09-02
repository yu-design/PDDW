<?php
require 'article.php';

class Panier {   

    public function getPanier($IDs){
        $listeArticle = [];
        $total = 0;
        foreach ($IDs as $ID) {
         $article = article::getArticleParID($ID);
         $total += $article->Prix;
         array_push($listeArticle,$article);
        }
        $_SESSION['totalPanier'] = $total;
        return $listeArticle;
    }

    public function ajouterAuPanier($IDArticle){
        if(!in_array($IDArticle,$_SESSION['panier'])){
            array_push($_SESSION['panier'],$IDArticle);

        }
        else{
            $errorMessage = "Cet article est déjà dans votre panier.";
        }
    }

    public function retirerDuPanier($IDArticle){
        $panier = $_SESSION['panier'];
        $_SESSION['panier'] = array_diff($panier,[$IDArticle]);
    }
    
}



?>
