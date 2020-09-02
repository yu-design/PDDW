<?php 

    require_once 'db.php';

class ContenuVente{

    public $titre;
    public $prixDate;
    public $imageData;


    public function getContenuVente($venteID) {
        global $db;
        $response = $db->prepare('SELECT A.Titre, VA.PrixArticle, A.Image FROM venteArticle as VA INNER JOIN article as A ON VA.Article_ID = A.ID where VA.ID =:id');
        $response->execute([':id' => $venteID]);
        $contenu = $response->fetchAll(PDO::FETCH_CLASS, 'contenuVente');
        $response->closeCursor();
        return $contenu;
    }

    
    public function ajouterContenuVente($listeArticle,$venteID) {

        foreach ($Articles as $article) {

            $response = Database::getDB()->prepare('INSERT INTO venteArticle SET Article_ID = :Article_ID , Vente_ID = :Vente_ID , PrixArticle = :PrixArticle');
            $response->execute([':Article_ID' => $article->ID, ':Vente_ID' => $venteID, ':PrixArticle' => $article->Prix]);
            $response->closeCursor();
        }             
    }
}    

?>
