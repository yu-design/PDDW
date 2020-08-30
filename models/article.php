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
            $reponce = $db->query('SELECT * FROM article LIMIT 0, 7;');
//            $reponce->bindValue(':premierParPage', $premierParPage, PDO::PARAM_INT);
//            $reponce->bindValue(':pages', $pages, PDO::PARAM_INT);
            $reponce->setFetchMode(PDO::FETCH_CLASS, 'article');
            $datas = $reponce->fetchAll();
            $reponce->closeCursor();

            return $datas;
        }catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    public static function getnombrearticle(){
        global $db;
        $reponse = $db->prepare('SELECT COUNT(*) AS nombrearticle FROM Article');
        $reponse->execute();
        $resultat = $reponse->fetch();
        $reponse->closeCursor();
        $nombrearticle = (int) $resultat['nombrearticle'];
        return $nombrearticle;
    }

    public static function verifierSiarticleExiste($login, $password){
        global $db;
        $reponse = $db->prepare('SELECT * FROM Article WHERE Login = :login AND Actif = 1');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
        $reponse->execute([':login' => $login]);
        $user = $reponse->fetch();
        $reponse->closeCursor();
        return $user;
    }

    public static function getarticleParISBN($login){
        global $db;
        try{
            $reponse = $db->prepare('SELECT * FROM Article WHERE ISBN = :login');
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
            $reponse->execute([':login' => $login]);
            $user = $reponse->fetch();
            $reponse->closeCursor();
            return $user;
        }catch(Exception $ex){

            die("Erreur : ".$ex->getMesage());
        }

    }

    public static function getarticleParEAN($mail){
        global $db;
        $reponse = $db->prepare('SELECT AdresseMail FROM Article WHERE EAN = :EAN AND Actif = 1');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
        $reponse->execute([':mail' => $mail]);
        $user = $reponse->fetch();
        $reponse->closeCursor();
        return $user;
    }

    public static function ajouterNouveauarticle($EAN, $ISBN, $TypeArticle_id, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Actif){
        global $db;
        $reponse = $db->prepare('INSERT INTO article (Login, AdresseMail, Nom, Prenom, Pass, Rolearticle_ID, Actif)
                                VALUES (:login, :email, :nom, :prenom, :password, :role, :actif )');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'article');
        $reponse->execute([':login' => $login, ':email' => $adresseMail, ':nom' => $nom, ':prenom' => $prenom, ':password' => password_hash($password, PASSWORD_DEFAULT), ':role' => '3', ':actif' => '1']);
        $reponse->closeCursor();
    }

    public static function modifierarticle($id, $login, $prenom, $nom, $pseudo, $adresseMail, $password, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $role, $actif) {
        global $db;
        $reponse = $db->prepare('UPDATE article SET Login = :login, Prenom = :prenom, Nom = :nom, Pseudo = :pseudo, AdresseMail = :mail, Pass = :password, DateNaissance = :dnaissance, Adresse = :adresse, CP = :cp, Ville = :ville, NumTelephone = :numtel, Rolearticle_ID = :role, Actif = :actif WHERE ID = '.$id);
        if($password == $article->Pass){
            $reponse->execute([':login' => $login, ':prenom' => $prenom, ':nom' => $nom, ':pseudo' => $pseudo, ':mail' => $adresseMail, ':password' => $password, ':dnaissance' => $dateNaissance, ':adresse' => $adresse, ':cp' => $cp, ':ville' => $ville, ':numtel' => $numTelephone, 'role' => $role, ':actif' => $actif]);
        }
        else {
            $reponse->execute([':login' => $login, ':prenom' => $prenom, ':nom' => $nom, ':pseudo' => $pseudo, ':mail' => $adresseMail, ':password' => password_hash($password, PASSWORD_DEFAULT), ':dnaissance' => $dateNaissance, ':adresse' => $adresse, ':cp' => $cp, ':ville' => $ville, ':numtel' => $numTelephone, 'role' => $role, ':actif' => $actif]);
        }
        $reponse->closeCursor();
    }

}

?>