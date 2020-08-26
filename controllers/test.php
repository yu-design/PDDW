<?php

$loginValide=null;
$mailValide=null;
$passwordValide=null;


// vérifier que le login est correct
if(!empty($_POST['login'])){
    if($_POST['login'] != $utilisateur['Login']){
        if(helpers::verifLogin($_POST['login'])==true){
            $loginValide=$_POST['login'];
        }else{
            $messageErreur = "Votre Login existe déjà !";
            exit();
        }
    }
}else{
    $messageErreur="Votre pseudo ne peut pas être vide";
    exit();
}

/* Tester si le exit vire toutes les données qui sont remplis dans les champs où non ! */

// vérifier que l'email est correct
if(!empty($_POST['email'])){
    if($_POST['email'] != $utilisateur['AdresseMail']){
        if(helpers::verifMail($_POST['email'])){
            $mailValide = $_POST['email'];
        }else{
            $messageErreur = "Votre mail existe déjà !";
            exit();
        }
    }else{
        $messageErreur = "Votre "
    }
}else{
    $messageErreur="Votre adresse mail ne peut pas être vide";
    exit();
}

//vérifier que le mots de passe est correct
if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){
    if($_POST['password'] != $utilisateur['Pass']){
        if(helpers::verifPass($_POST['password'],$_POST['confirm_password'])){
            $passwordValide = $_POST['password'];
        }else{
            $messageErreur = "Votre mots de passe de confirmation ne correspond pas !";
            exit();
        }
    }else{
        $messageErreur = "Votre "
    }
}else{
    $messageErreur="Votre adresse mail ne peut pas être vide";
    exit();
}
?>