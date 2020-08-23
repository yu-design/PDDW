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
            $this->$RoleUtilisateur_ID = $data["RoleUtilisateur_ID"];
            $this->$Actif = $data["Actif"];
        }
    }

    //Permet de récupérer tous les utilisateurs dans la db -> a ne pas forcément garder dans le futur (autre stratégie)
    public static function getAll(){
        global $db;
        try{
            $respone = $db->query('select * from utilisateur');
            $respone->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
            $datas = $respone->fetchAll();
            $respone->closeCursor();

            return $datas;
        }catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    public static function verifierSiUtilisateurExiste($login, $password){
        global $db;
        $reponse = $db->prepare('SELECT * FROM utilisateur WHERE Login = :login AND Actif = 1');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $reponse->execute([':login' => $login]);
        $user = $reponse->fetch();
        $reponse->closeCursor();
        return $user;
    }

    public static function getUtilisateurParLogin($login){
        global $db;
        $reponse = $db->prepare('SELECT * FROM utilisateur WHERE Login = :login');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $reponse->execute([':login' => $login]);
        $user = $reponse->fetch();
        $reponse->closeCursor();
        return $user;
    }

    public static function getUtilisateurParMail($mail){
        global $db;
        $reponse = $db->prepare('SELECT AdresseMail FROM utilisateur WHERE AdresseMail = :mail AND Actif = 1');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $reponse->execute([':mail' => $mail]);
        $user = $reponse->fetch();
        $reponse->closeCursor();
        return $user;
    }

    public static function ajouterNouveauUtilisateur($login,$adresseMail,$password,$nom,$prenom){
        global $db;
        $reponse = $db->prepare('INSERT INTO utilisateur (Login, AdresseMail, Nom, Prenom, Pass, RoleUtilisateur_ID, Actif)
                                VALUES (:login, :email, :nom, :prenom, :password, :role, :actif )');
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $reponse->execute([':login' => $login, ':email' => $adresseMail, ':nom' => $nom, ':prenom' => $prenom, ':password' => password_hash($password, PASSWORD_DEFAULT), ':role' => '3', ':actif' => '1']);
        $reponse->closeCursor();
    }

    public static function modifierUtilisateur($login, $prenom, $nom, $pseudo, $adresseMail, $password, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $actif) {
        global $db;
        $utilisateur = getUtilisateurParLogin($login);
        $reponse = $db->prepare('UPDATE utilisateur SET Login = :login, Prenom = :prenom, Nom = :nom, Pseudo = :pseudo, AdresseMail = :mail, Pass = :password, DateNaissance = :dnaissance, Adresse = :adresse, CP = :cp, Ville = :ville, NumTelephone = :numtel, Actif = :actif WHERE Login = :login');
        if($password){
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
        else {
            $password = $utilisateur['Pass'];
        }
        $reponse->execute([':login' => $login, ':prenom' => $prenom, ':nom' => $nom, ':pseudo' => $pseudo, ':mail' => $adresseMail, ':password' => password_hash($password, PASSWORD_DEFAULT), ':dnaissance' => $dateNaissance, ':adresse' => $adresse, ':cp' => $cp, ':ville' => $ville, ':numtel' => $numTelephone, ':actif' => $actif]);
        $reponse->closeCursor();
    }

}

?>