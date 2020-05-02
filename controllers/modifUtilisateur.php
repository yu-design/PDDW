<?php
    $titre = "S'enregistrer";
    include 'views/includes/head.php';
    require 'navControler.php';
    navControl();
    require 'models/users.php';

    $user = getUtilisateurParLogin($_SESSION['login']);

    /*var_dump($user);
    die();*/
    if($user['RoleUtilisateur_ID']=="1"){

    }
    elseif($user['RoleUtilisateur_ID']=="2"){
        
    }
    else{
        
    }


/*modifierUtilisateur($_POST['login'],
                                        $_POST['nom'],
                                        $_POST['prenom'],
                                        $_POST['pseudo'],
                                        $_POST['password'],
                                        $_POST['dateNaissance'],
                                        $_POST['email'],
                                        $_POST['adresse'],
                                        $_POST['cp'],
                                        $_POST['ville'],
                                        $_POST['numTelephone']);*/

    include 'views/modifUtilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

