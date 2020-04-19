<?php
require_once 'models/db.php';

function getUserById($id) {
    $reponse = $db->prepare('SELECT * FROM utilisateur WHERE ID = :id');
    $reponse->execute([':id' => $id]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function getUserByLogin($login) {
    $reponse = $db->prepare('SELECT * FROM utilisateur WHERE Pseudo = :login');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function setUser($id, $login, $email, $password, $role) {
    $user = getUserById($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = $db->prepare('UPDATE utilisateur SET Pseudo = :login, Mail = :email, Pass = :password, Role = :role WHERE ID = :id');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['Pass'];
    }
    $reponse->execute([':id' => $id, ':email' => $email, ':password' => $password, ':login' => $login]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

?>