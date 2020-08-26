<?php
    $titre = "S'enregistrer";
    include 'views/includes/head.php';
    include 'views/includes/nav.php';
    require 'models/utilisateur.php';

    if(!empty($_POST)) {
        if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['nom']) && !empty($_POST['prenom'])){
            //vérification du mot de passe
            if($_POST['password'] != $_POST['confirm_password'])
            {
                $messageErreur = "Votre mot de passe ne correspond pas.";
            }
            else{ //vérifier que le login ou l'adresse mail n'existe pas
                $utilisateur = Utilisateur::getUtilisateurParLogin($_POST['login']);
                $mail = Utilisateur::getUtilisateurParMail($_POST['email']);
                if($utilisateur){
                    $messageErreur = "Le login ".$_POST['login']." existe déjà...";
                }
                else if($mail){
                    $messageErreur = "Le mail ".$_POST['email']." existe déjà...";
                }else{
                    Utilisateur::ajouterNouveauUtilisateur($_POST['login'], $_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom']);
                    //ici je connecte directement l'utilisateur qui vient de s'inscrire
                    $utilisateur = Utilisateur::getUtilisateurParLogin($_POST['login']); //Permet de rechercher le login qui vient d'être créé en base de données afin de l'utiliser
                    $_SESSION['id'] = $utilisateur->ID;
                    $_SESSION['login'] =  $utilisateur->Login;
                    $_SESSION['mail'] = $utilisateur->AdresseMail;
                    $_SESSION['password'] = $utilisateur->Pass;
                    $_SESSION['role'] = $utilisateur->RoleUtilisateur_ID;
                    header("Location: ".ROOT_PATH);
                    exit();
                }
            }
        }
        else
        {
            //Ici on va prévenir l'utilisateur qu'il manque quelque chose
            $messageErreur = "Une information est manquante, veuillez réessayer !";
        }
    }

    include 'views/enregistrer.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

?>