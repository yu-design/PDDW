<?php
require 'article.php';

class Panier {   

    public function getPanier($IDs){
        $list = [];
        $total = 0;
        foreach ($IDs as $ID) {
         $article = article::getArticleParID($ID);
         $total += $article->Prix;
         array_push($ID,$manga);
        }
        $_SESSION['totalPanier'] = $total;
        return $list;
    }

    public function ajouterAuPanier($ID){
        if(!in_array($ID,$_SESSION['panier'])){
            array_push($_SESSION['panier'],$ID);

        }
        else{
            $errorMessage = "Cet article est déjà dans votre panier.";
        }
    }

    public function retirerDuPanier($ID){
        $panier = $_SESSION['panier'];
        $_SESSION['panier'] = array_diff($panier,[$ID]);
    }
    
}



?>
