<?php 

    require_once 'db.php';

class ContenuVente{

    public $Titre;
    public $PrixArticle;
    public $Image;


    public function getContenuVente($venteID) {
        global $db;
        $response = $db->prepare('SELECT A.Titre, VA.PrixArticle, A.Image FROM venteArticle AS VA INNER JOIN article AS A ON VA.Article_ID = A.ID INNER JOIN vente AS V ON V.ID = VA.Vente_ID WHERE V.ID = :id');
        $response->execute([':id' => $venteID]);
        $contenu = $response->fetchAll(PDO::FETCH_CLASS, 'contenuVente');
        $response->closeCursor();
        return $contenu;
    }

    
    public function ajouterContenuVente($Articles,$venteID) {

        foreach ($Articles as $article) {
            global $db;
            $response = $db->prepare('INSERT INTO venteArticle SET Article_ID = :Article_ID , Vente_ID = :Vente_ID , PrixArticle = :PrixArticle');
            $response->execute([':Article_ID' => $article->ID, ':Vente_ID' => $venteID, ':PrixArticle' => $article->Prix]);
            $response->closeCursor();
        }             
    }
}    

?>
