<?php
    $titre = "S'enregistrer";
    include 'views/includes/head.php';
    require 'navControler.php';
    navControl();
    require 'models/users.php';

    $user = getUtilisateurParLogin($_SESSION['login']);

//    var_dump($user);
//    die();
    /*if(!empty($_POST)){
        $actif = "1";
        modifierUtilisateur($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $_POST['actif']);
        $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
        header("Location: ".ROOT_PATH);
        exit();
    }
    else{
        $messageError = "Erreur";
    }*/

    if($user['RoleUtilisateur_ID']=="1"){ //admin
        /*if(!empty($_POST) && !empty($_POST['Login']) && !empty($_POST['email']))
        {
            // Vérifier la modification du login (unique)
            if(!empty($_POST['login'])){
                $login=$user['Login'];
            }
            elseif()
            {
                $MessageErreur = "Le login ".$_POST['login']." que vous avez encodé existe déjà !".<br>."Veuillez réessayer";
                $error = true;
            }
            else
            {

            }
            // Vérifier la modification du mot de passe
            if((!empty($_POST['password']) && empty($_POST['confirm_password'])) || (empty($_POST['password']) && !empty($_POST['confirm_password']))){
                $MessageErreur = "Erreur dans le mot de passe ou la confirmation du mots de passe, veuillez réessayer."
                $error = true;
            }
            elseif(!empty($_POST['password']) && !empty($['confirm_password']))
            {
                
            }
            // Vérifier la modification du mail (attention mail unique)
        }*/

        
        // Si toutes les vérifications sont ok -> procéder à l'update
        //else{
            if(!empty($_POST)){
                $actif = true;
                modifierUtilisateur($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
                header("Location: ".ROOT_PATH);
                exit();
            }
        //}
    }
    elseif($user['RoleUtilisateur_ID']=="2"){ // vendeur
        //else{
            if(!empty($_POST)){
                $actif=true;
                modifierUtilisateur($user['Login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
                header("Location: ".ROOT_PATH);
                exit();
            }
        //}
    }
    
    elseif($user['RoleUtilisateur_ID']=="3"){ //client
        //else{
            if(!empty($_POST)){
                $actif=true;
                modifierUtilisateur($user['Login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'],$_POST['password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
                header("Location: ".ROOT_PATH);
                exit();
            }
        //}
    }
/*
    elseif($user['RoleUtilisateur_ID']=="3"){ //client test
        //else{
            if(!empty($_POST)){
                modifierUtilisateur($_POST['login'],$_POST['numtel']);
                $messageErreur = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
                header("Location: ".ROOT_PATH);
                exit();
            }
        //}
    }
*/
    include 'views/modifUtilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';




    /* Prévoir :
    Modifier login s'il n'existe pas encore.
    Modifier pass si demandé sinon laisser le mdp existant.
    Modifier mail si n'existe pas.
    Ajouter une date de naissance si pas encore encodée, une fois encodée, pas modifiable.
    */