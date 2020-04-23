<?php
require_once 'models/db.php';

//Permet de récupérer l'id d'un utilisateur
function getUtilisateurParId($id) {
    global $db;
    $reponse = $db->prepare('SELECT * FROM utilisateur WHERE ID = :id');
    $reponse->execute([':id' => $id]);
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

//Créer un nouveau utilisateur
function creeUtilisateur(){$login, $nom, $prenom, $pseudo, $password, $dateNaissance, $adresseMail, $adresse, $cp, $ville, $numTelephone, $role)
    global $db;
    $reponse = $db->prepare('INSERT INTO utilisateur SET Login = :login, Nom = :nom, Prenom = :prenom, Pseudo = :pseudo, pass = :password, DateNaissance = :dnaissance, AdresseMail = :mail, Adresse = :adresse, CP = :cp, Ville = :ville, NumTelephone = :numtel, RoleUtilisateur_ID = :role ');
    $reponse->execute([':login' => $login, ':nom' => $nom, ':prenom' => $prenom, ':pseudo' => $pseudo, ':password' => password_hash($password, PASSWORD_DEFAULT), ':dnaissance' => $dateNaissance, ':mail' => $adresseMail, ':adresse' => $adresse, ':cp' => $cp, ':ville' => $ville, ':numtel' => $numTelephone, ':role' =>; $role]);
    $reponse->closeCursor();
}

//Vérifier si l'utilisateur existe
function verifierSiUtilisateurExiste($login){
    global $db;
    $reponse = $db->prepare('SELECT * FROM utilisateur WHERE Login = :login');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

//Modifier un utilisateur
function modifierUtilisateur($id, $login, $nom, $prenom, $pseudo, $password, $dateNaissance, $adresseMail, $adresse, $cp, $ville, $numTelephone, $role) {
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

// Mettre à blanc un utilisateur dans la base de données
function supprimerUtilisateur($login){
    global $db;
    $reponse = Database::$db->prepare("UPDATE Utilisateur SET isActive=0 where Login = :login");
    $reponse->execute([":login" => $login]);
    $reponse->closeCursor();
}

?>