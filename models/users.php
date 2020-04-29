<?php
require_once 'models/db.php';

//Vérifier si l'utilisateur existe
function verifierSiUtilisateurExiste($login, $password){
    global $db;
    $reponse = $db->prepare('SELECT ID, Login, RoleUtilisateur_ID, Pass, Actif FROM utilisateur WHERE Login = :login AND Actif = 1');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

//Permet de récupérer l'id d'un utilisateur
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
/*
//Modifier un utilisateur
function modifierUtilisateur($login, $nom, $prenom, $pseudo, $password, $dateNaissance, $adresseMail, $adresse, $cp, $ville, $numTelephone) {
    global $db;
    $user = getUtilisateurParId($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = $db->prepare('UPDATE utilisateur SET Login = :login, Nom = :nom, Prenom = :prenom, Pseudo = :pseudo, pass = :password, DateNaissance = :dnaissance, AdresseMail = :mail, Adresse = :adresse, CP = :cp, Ville = :ville, NumTelephone = :numtel, RoleUtilisateur_ID = :role WHERE ID = :id');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['Pass'];
    }
    $reponse->execute([':login' => $login, ':nom' => $nom, ':prenom' => $prenom, ':pseudo' => $pseudo, ':password' => password_hash($password, PASSWORD_DEFAULT), ':dnaissance' => $dateNaissance, ':mail' => $adresseMail, ':adresse' => $adresse, ':cp' => $cp, ':ville' => $ville, ':numtel' => $numTelephone, ':role' =>; $role]);
    $reponse->closeCursor();
}
/*
function modifierUtilisateurAdmin($login, $nom, $prenom, $pseudo, $password, $dateNaissance, $adresseMail, $adresse, $cp, $ville, $numTelephone){

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