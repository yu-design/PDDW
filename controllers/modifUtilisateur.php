<?php
    $titre = "S'enregistrer";
    include 'views/includes/head.php';
    require 'navControler.php';
    navControl();
    require 'models/users.php';

    $user = getUtilisateurParLogin($_SESSION['login']);

//    var_dump($user);
//    die();
    if(!empty($_POST)){
        modifierUtilisateur($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $_POST['actif']);
        $messageInfo = "L'\utilisateur ".$user['Login']." à bien été mis à jour.";
        header("Location: ".ROOT_PATH);
        exit();
    }
    else{
        $messageError = "Erreur";
    }

    include 'views/modifUtilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';




    /* Prévoir :
    Modifier login s'il n'existe pas encore.
    Modifier pass si demandé sinon laisser le mdp existant.
    Modifier mail si n'existe pas.
    Ajouter une date de naissance si pas encore encodée, une fois encodée, pas modifiable.
    */