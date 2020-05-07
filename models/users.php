<?php
require_once 'models/db.php';

//Vérifier si l'utilisateur existe
function verifierSiUtilisateurExiste($login, $password){
    global $db;
    $reponse = $db->prepare('SELECT * FROM utilisateur WHERE Login = :login AND Actif = 1');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

//Permet de récupérer le mail d'un utilisateur
function getUtilisateurParMail($adresseMail) {
    global $db;
    $reponse = $db->prepare('SELECT * FROM utilisateur WHERE AdresseMail = :email');
    $reponse->execute([':email' => $adresseMail]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

// permet de récupérer le login d'un utilisateur
function getUtilisateurParLogin($login) {
    global $db;
    $reponse = $db->prepare('SELECT * FROM utilisateur WHERE Login = :login');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

// permet de récupérer le login d'un utilisateur
function getUtilisateurParId($id) {
    global $db;
    $reponse = $db->prepare('SELECT * FROM utilisateur WHERE ID = :id');
    $reponse->execute([':id' => $id]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

//Créer un nouveau utilisateur
function creeUtilisateur($login, $adresseMail, $password, $nom, $prenom){
    global $db;
    $reponse = $db->prepare('INSERT INTO utilisateur (Login, AdresseMail, Nom, Prenom, Pass, RoleUtilisateur_ID, Actif)
                             VALUES (:login, :email, :nom, :prenom, :password, :role, :actif )');
    $reponse->execute([':login' => $login, ':email' => $adresseMail, ':nom' => $nom, ':prenom' => $prenom, ':password' => password_hash($password, PASSWORD_DEFAULT), ':role' => '3', ':actif' => '1']);
    $reponse->closeCursor();
}

//Modifier un utilisateur
function modifierUtilisateur($login, $prenom, $nom, $pseudo, $adresseMail, $password, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $actif) {
    global $db;
    $user = getUtilisateurParLogin($login);
    $reponse = $db->prepare('UPDATE utilisateur SET Login = :login, Prenom = :prenom, Nom = :nom, Pseudo = :pseudo, AdresseMail = :mail, Pass = :password, DateNaissance = :dnaissance, Adresse = :adresse, CP = :cp, Ville = :ville, NumTelephone = :numtel, Actif = :actif WHERE Login = :login');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['Pass'];
    }
    $reponse->execute([':login' => $login, ':prenom' => $prenom, ':nom' => $nom, ':pseudo' => $pseudo, ':mail' => $adresseMail, ':password' => password_hash($password, PASSWORD_DEFAULT), ':dnaissance' => $dateNaissance, ':adresse' => $adresse, ':cp' => $cp, ':ville' => $ville, ':numtel' => $numTelephone, ':actif' => $actif]);
    $reponse->closeCursor();
}
//(int) $_POST['id'];

/*
function modifierUtilisateur($login, $numTelephone) {
    global $db;
    $user = getUtilisateurParLogin($login);
    $reponse = $db->prepare('UPDATE utilisateur SET Login = :login, NumTelephone = :numtel WHERE Login = :login');
    $reponse->execute([':login' => $login, ':numtel' => $numTelephone]);
    $reponse->closeCursor();
}*/

/*
// Modifier utilisateur avec role vendeur ou administrateur
function modifierUtilisateurAdmin($login, $nom, $prenom, $pseudo, $password, $dateNaissance, $adresseMail, $adresse, $cp, $ville, $numTelephone, $role, $actif){
    global $db;
    $user = getUtilisateurParLogin($login);
    $reponse = $db->prepare('UPDATE utilisateur SET Login = :login, Nom = :nom, Prenom = :prenom, Pseudo = :pseudo, pass = :password, DateNaissance = :dnaissance, AdresseMail = :mail, Adresse = :adresse, CP = :cp, Ville = :ville, NumTelephone = :numtel, RoleUtilisateur_ID = :role, Actif = :actif WHERE ID = :id');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['Pass'];
    }
    $reponse->execute([':login' => $login, ':nom' => $nom, ':prenom' => $prenom, ':pseudo' => $pseudo, ':password' => password_hash($password, PASSWORD_DEFAULT), ':dnaissance' => $dateNaissance, ':mail' => $adresseMail, ':adresse' => $adresse, ':cp' => $cp, ':ville' => $ville, ':numtel' => $numTelephone, ':role' => $role, ':Actif' => $actif]);
    $reponse->closeCursor();
}
*/

/*
// Mettre à blanc un utilisateur dans la base de données
function supprimerUtilisateur($id){
    global $db;
    $reponse = Database::$db->prepare("UPDATE Utilisateur SET Active=0 where ID = :id");
    $reponse->execute([":id" => $id]);
    $reponse->closeCursor();
}
*/
?>