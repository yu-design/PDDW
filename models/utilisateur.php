<?php

// require = import en java
require_once 'db.php';

class Utilisateur{
    public $ID;
    public $Login;
    public $Nom;
    public $Prenom;
    public $Pseudo;
    public $Pass;
    public $DateNaissance;
    public $AdresseMail;
    public $Adresse;
    public $CP;
    public $Ville;
    public $NumTelephone;
    public $RoleUtilisateur;
    public $Actif;

    public function __construct($data=NULL){
        if(is_array($data)){
            $this->$ID = $data["ID"];
            $this->$Login = $data["Login"];
            $this->$Nom = $data["Nom"];
            $this->$Prenom = $data["Prenom"];
            $this->$Pseudo = $data["Pseudo"];
            $this->$Pass = $data["Pass"];
            $this->$DateNaissance = $data["ID"];
            $this->$AdresseMail = $data["AdresseMail"];
            $this->$Adresse = $data["Adresse"];
            $this->$CP = $data["CP"];
            $this->$Ville = $data["Ville"];
            $this->$NumTelephone = $data["NumTelephone"];
            $this->$RoleUtilisateur = $data["RoleUtilisateur"];
            $this->$Actif = $data["Actif"];
        }
    }

    //Permet de récupérer tous les utilisateurs dans la db -> a ne pas forcément garder dans le futur (autre stratégie)
    public static function getAll(){
        global $db;
        try{
            $response = $db->query('select * from utilisateur');
            $response->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
            $datas = $response->fetchAll();
            $response->closeCursor();

            return $datas;
        }catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    public function verifierSiUtilisateurExiste($login, $password){
        global $db;
        $reponse = $db->prepare('SELECT * FROM utilisateur WHERE Login = :login AND Actif = 1');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $reponse->execute([':login' => $login]);
        $user = $reponse->fetch();
        $reponse->closeCursor();
        return $user;
    }

    public function ajouterNouveauUtilisateur($Login,$mail,$Nom,$Prenom,$Pass,$passconfirm){
        global $db;
        $reponse = $db->prepare('INSERT INTO utilisateur (Login, AdresseMail, Nom, Prenom, Pass, RoleUtilisateur_ID, Actif)
                                VALUES (:login, :email, :nom, :prenom, :password, :role, :actif )');
        $reponse->execute([':login' => $login, ':email' => $adresseMail, ':nom' => $nom, ':prenom' => $prenom, ':password' => password_hash($password, PASSWORD_DEFAULT), ':role' => '3', ':actif' => '1']);
        $reponse->closeCursor();
    }
}

?>