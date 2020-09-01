<?php

// require = import en java
require_once 'db.php';

class Article{
    public $ID;
    public $EAN;
    public $ISBN;
    public $TypeArticle_ID;
    public $Titre;
    public $Auteur;
    public $Dessinateur;
    public $Edition;
    public $Collection;
    public $Prix;
    public $Parution;
    public $Actif;


    public function __construct($data=NULL){
        if(is_array($data)){
            $this->$ID = $data["ID"];
            $this->$EAN = $data["EAN"];
            $this->$ISBN = $data["ISBN"];
            $this->$TypeArticle_ID = $data["TypeArticle_ID"];
            $this->$Titre = $data["Titre"];
            $this->$Auteur = $data["Auteur"];
            $this->$Dessinateur = $data["Dessinateur"];
            $this->$Edition = $data["Edition"];
            $this->$Collection = $data["Collection"];
            $this->$Prix = $data["Prix"];
            $this->$Parution = $data["Parution"];
            $this->$Actif = $data["Actif"];
            
        }
    }

    //Permet de récupérer tous les articles dans la db -> a ne pas forcément garder dans le futur (autre stratégie)
    public static function getAll(){
        global $db;
        try{
            $reponce = $db->query('SELECT * FROM article');
            $reponce->setFetchMode(PDO::FETCH_CLASS, 'article');
            $datas = $reponce->fetchAll();
            $reponce->closeCursor();

            return $datas;
        }catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    public static function getAllActive(){
        global $db;
        try{
            $reponce = $db->query('SELECT * FROM article WHERE Actif = 1');
            $reponce->setFetchMode(PDO::FETCH_CLASS, 'article');
            $datas = $reponce->fetchAll();
            $reponce->closeCursor();

            return $datas;
        }catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    public static function getAllParType($pages, $premierParPage, $TypeArticle_ID){
        global $db;
        try{
            $reponce = $db->query('SELECT * FROM article WHERE TypeArticle_ID == :TypeArticle_ID LIMIT 0, 2;');
//            $reponce->bindValue(':premierParPage', $premierParPage, PDO::PARAM_INT);
//            $reponce->bindValue(':pages', $pages, PDO::PARAM_INT);
            $reponse->execute([':TypeArticle_ID' => $TypeArticle_ID]);
            $reponce->setFetchMode(PDO::FETCH_CLASS, 'article');
            $datas = $reponce->fetchAll();
            $reponce->closeCursor();

            return $datas;
        }catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

/*
    public static function getAllPagination($premierParPage, $pages){
        global $db;
        try{
            $reponse = $db->query('SELECT * FROM article LIMIT '.$premierParPage.','.$pages.';');
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
            $datas = $reponse->fetchAll();
            $reponse->closeCursor();

            return $datas;
        }catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
*/
    public static function getArticleParID($ID){
        global $db;
        $reponse = $db->prepare('SELECT * FROM Article WHERE ID = :ID');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
        $reponse->execute([':ID' => $ID]);
        $article = $reponse->fetch();
        $reponse->closeCursor();
        return $article;
    }

    public static function getNombreArticle(){
        global $db;
        $reponse = $db->prepare('SELECT COUNT(*) AS nombrearticle FROM Article');
        $reponse->execute();
        $resultat = $reponse->fetch();
        $reponse->closeCursor();
        $nombrearticle = (int) $resultat['nombrearticle'];
        return $nombrearticle;
    }

    public static function verifierSiarticleExiste($EAN, $ISBN){
        global $db;
        $reponse = $db->prepare('SELECT * FROM Article WHERE (EAN = :EAN)||(ISBN = :ISBN) AND Actif = 1');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
        $reponse->execute([':EAN' => $EAN],[':ISBN' => $ISBN]);
        $article = $reponse->fetch();
        $reponse->closeCursor();
        return $article;
    }

    public static function getarticleParISBN($ISBN){
        global $db;
        try{
            $reponse = $db->prepare('SELECT * FROM Article WHERE ISBN = :ISBN');
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
            $reponse->execute([':ISBN' => $ISBN]);
            $article = $reponse->fetch();
            $reponse->closeCursor();
            return $article;
        }catch(Exception $ex){

            die("Erreur : ".$ex->getMesage());
        }

    }

    public static function getarticleParEAN($EAN){
        global $db;
        $reponse = $db->prepare('SELECT * FROM Article WHERE EAN = :EAN AND Actif = 1');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
        $reponse->execute([':EAN' => $EAN]);
        $article = $reponse->fetch();
        $reponse->closeCursor();
        return $article;
    }

    public static function ajouterNouveauArticle($EAN, $ISBN, $TypeArticle_id, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image){
        global $db;
        $reponse = $db->prepare('INSERT INTO article (EAN, ISBN, TypeArticle_id, Titre, Auteur, Dessinateur, Edition, Collection, Prix, Parution, Image , Actif)
                                VALUES (:EAN, :ISBN, :TypeArticle_id, :Titre, :Auteur, :Dessinateur, :Edition, :Collection, :Prix, :Parution, :Image, :Actif)');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
        $reponse->execute([':EAN' => $EAN, ':ISBN' => $ISBN, ':TypeArticle_id' => $TypeArticle_id, ':Titre' => $Titre, ':Auteur' => $Auteur, ':Dessinateur' => $Dessinateur, ':Edition' => $Edition, ':Collection' => $Collection, ':Prix' => $Prix, ':Parution' => $Parution, ':Image' => $Image, ':Actif' => '1']);
        $reponse->closeCursor();
    }

    public static function modifierArticle($ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $Actif) {
        global $db;
        $reponse = $db->prepare('UPDATE article SET EAN = :EAN, ISBN = :ISBN, TypeArticle_ID = :TypeArticle_ID, Titre = :Titre, Auteur = :Auteur, Dessinateur = :Dessinateur, Edition = :Edition, Collection = :Collection, Prix = :Prix, Parution = :Parution, Image = :Image, Actif = :Actif WHERE ID = '.$ID);
        $reponse->execute([':EAN' => $EAN, ':ISBN' => $ISBN, ':TypeArticle_ID' => $TypeArticle_ID, ':Titre' => $Titre, ':Auteur' => $Auteur, ':Dessinateur' => $Dessinateur, ':Edition' => $Edition, ':Collection' => $Collection, ':Prix' => $Prix, ':Parution' => $Parution, ':Image' => $Image, ':Actif' => $Actif]);
        $reponse->closeCursor();
    }
}

?>