<?php
    $titre = "Modifier l'utilisateur";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';
//    require 'helpers.php';
    

    $utilisateur = utilisateur::getUtilisateurParLogin($_SESSION['login']);
    
    $loginValide=null;
    $mailValide=null;
    $passwordValide=null;
    $passwordActif=$_SESSION['password'];
    
    if(!empty($_POST)){
        
        // Actif 1 = actif || 0 = inactif
        $actif=(empty($_POST['actif']))?1:0;
        
        // vérifier que le login est correct
        if(!empty($_POST['login'])){
            if($_POST['login'] != $_SESSION['login']){
                $loginStatus = empty(utilisateur::getUtilisateurParLogin($_POST['login']))?true:false;
                if($loginStatus==true){
                    $loginValide=$_POST['login'];
                    // vérifier que l'email est correct
                    if(!empty($_POST['email'])){
                        if($_POST['email'] != $utilisateur->AdresseMail){
                            $emailStatus = empty(utilisateur::getUtilisateurParMail($_POST['email']))?true:false;
                            if($emailStatus==true){
                                $mailValide = $_POST['email'];
                                //vérifier que le mots de passe est correct
                                if($_POST['password'] && empty($_POST['confirm_password'])){
                                    $messageErreur = "La confirmation de mots de passe est manquante !";
                                }else if(empty($_POST['password']) && $_POST['confirm_password']){
                                    $messageErreur = "Le mots de passe est manquant !";
                                }else if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){
                                    if(password_verify($_POST['password'],$utilisateur->Pass)){
                                        $passwordValide = $utilisateur->Pass;
                                        // Enregistrement
                                        $_SESSION['login']=$loginValide;
                                        utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                        $messageInfo = "Votre profil a bien été mis à jour.";
                                        header("Location: ".ROOT_PATH);
                                        exit();
                                    }else{
                                        if($_POST['password'] != $_POST['confirm_password']){
                                            $messageErreur = "Votre mots de passe de confirmation ne correspond pas !";
                                        }else{
                                            $passwordValide = $_POST['password'];
                                            // Enregistrement
                                            $_SESSION['login']=$loginValide;
                                            utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                            $messageInfo = "Votre profil a bien été mis à jour.";
                                            header("Location: ".ROOT_PATH);
                                            exit();
                                        }
                                    }
                                }else{
                                    $passwordValide = $utilisateur->Pass;
                                    //Enregistrement
                                    $_SESSION['login']=$loginValide;
                                    utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                    $messageInfo = "Votre profil a bien été mis à jour.";
                                    header("Location: ".ROOT_PATH);
                                    exit();
                                }
                            }else{
                                $messageErreur = "Le mail ".$_POST['email']." existe déjà !";
                            }
                        }else{
                            $mailValide=$utilisateur->AdresseMail;
                            //vérifier que le mots de passe est correct
                            if($_POST['password'] && empty($_POST['confirm_password'])){
                                $messageErreur = "La confirmation de mots de passe est manquante !";
                            }else if(empty($_POST['password']) && $_POST['confirm_password']){
                                $messageErreur = "Le mots de passe est manquant !";
                            }else if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){
                                if(password_verify($_POST['password'],$utilisateur->Pass)){
                                    $passwordValide = $utilisateur->Pass;
                                    // Enregistrement
                                    $_SESSION['login']=$loginValide;
                                    utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                    $messageInfo = "Votre profil a bien été mis à jour.";
                                    header("Location: ".ROOT_PATH);
                                    exit();
                                }else{
                                    if($_POST['password'] != $_POST['confirm_password']){
                                        $messageErreur = "Votre mots de passe de confirmation ne correspond pas !";
                                    }else{
                                        $passwordValide = $_POST['password'];
                                        // Enregistrement
                                        $_SESSION['login']=$loginValide;
                                        utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                        $messageInfo = "Votre profil a bien été mis à jour.";
                                        header("Location: ".ROOT_PATH);
                                        exit();
                                    }
                                }
                            }else{
                                $passwordValide = $utilisateur->Pass;
                                //Enregistrement
                                $_SESSION['login']=$loginValide;
                                utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                $messageInfo = "Votre profil a bien été mis à jour.";
                                header("Location: ".ROOT_PATH);
                                exit();
                            }
                        }
                    }else{
                        $messageErreur="Votre adresse mail ne peut pas être vide";
                    }
                }else{
                    $messageErreur = "Le login ". $_POST['login'] . " existe déjà !";
                }
            }else{
                $loginValide= $_SESSION['login'];
                // vérifier que l'email est correct
                if(!empty($_POST['email'])){
                    if($_POST['email'] != $utilisateur->AdresseMail){
                        $emailStatus = empty(utilisateur::getUtilisateurParMail($_POST['email']))?true:false;
                        if($emailStatus==true){
                            $mailValide = $_POST['email'];
                            //vérifier que le mots de passe est correct
                            if($_POST['password'] && empty($_POST['confirm_password'])){
                                $messageErreur = "La confirmation de mots de passe est manquante !";
                            }else if(empty($_POST['password']) && $_POST['confirm_password']){
                                $messageErreur = "Le mots de passe est manquant !";
                            }else if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){
                                if(password_verify($_POST['password'],$utilisateur->Pass)){
                                    $passwordValide = $utilisateur->Pass;
                                    // Enregistrement
                                    $_SESSION['login']=$loginValide;
                                    utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                    $messageInfo = "Votre profil a bien été mis à jour.";
                                    header("Location: ".ROOT_PATH);
                                    exit();
                                }else{
                                    if($_POST['password'] != $_POST['confirm_password']){
                                        $messageErreur = "Votre mots de passe de confirmation ne correspond pas !";
                                    }else{
                                        $passwordValide = $_POST['password'];
                                        // Enregistrement
                                        $_SESSION['login']=$loginValide;
                                        utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                        $messageInfo = "Votre profil a bien été mis à jour.";
                                        header("Location: ".ROOT_PATH);
                                        exit();
                                    }
                                }
                            }else{
                                $passwordValide = $utilisateur->Pass;
                                //Enregistrement
                                $_SESSION['login']=$loginValide;
                                utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                $messageInfo = "Votre profil a bien été mis à jour.";
                                header("Location: ".ROOT_PATH);
                                exit();
                            }
                        }else{
                            $messageErreur = "Le mail ".$_POST['email']." existe déjà !";
                        }
                    }else{
                        $mailValide=$utilisateur->AdresseMail;
                        //vérifier que le mots de passe est correct
                        if($_POST['password'] && empty($_POST['confirm_password'])){
                            $messageErreur = "La confirmation de mots de passe est manquante !";
                        }else if(empty($_POST['password']) && $_POST['confirm_password']){
                            $messageErreur = "Le mots de passe est manquant !";
                        }else if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){
                            if(password_verify($_POST['password'],$utilisateur->Pass)){
                                $passwordValide = $utilisateur->Pass;
                                // Enregistrement
                                $_SESSION['login']=$loginValide;
                                utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                $messageInfo = "Votre profil a bien été mis à jour.";
                                header("Location: ".ROOT_PATH);
                                exit();
                            }else{
                                if($_POST['password'] != $_POST['confirm_password']){
                                    $messageErreur = "Votre mots de passe de confirmation ne correspond pas !";
                                }else{
                                    $passwordValide = $_POST['password'];
                                    // Enregistrement
                                    $_SESSION['login']=$loginValide;
                                    utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                                    $messageInfo = "Votre profil a bien été mis à jour.";
                                    header("Location: ".ROOT_PATH);
                                    exit();
                                }
                            }
                        }else{
                            $passwordValide = $utilisateur->Pass;
                            //Enregistrement
                            $_SESSION['login']=$loginValide;
                            utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
                            $messageInfo = "Votre profil a bien été mis à jour.";
                            header("Location: ".ROOT_PATH);
                            exit();
                        }
                    }
                }else{
                    $messageErreur="Votre adresse mail ne peut pas être vide";
                }
            }
        }else{
            $messageErreur="Votre pseudo ne peut pas être vide";
        }

        /*
        // vérifier que le login est correct
        if(!empty($_POST['login'])){
            if($_POST['login'] != $_SESSION['login']){
                $loginStatus = empty(utilisateur::getUtilisateurParLogin($_POST['login']))?true:false;
                if($loginStatus==true){
                    $loginValide=$_POST['login'];
                }else{
                    $messageErreur = "Le login ". $_POST['login'] . " existe déjà !";
                    var_dump($messageErreur);
                    die();
                }
            }else{
                $loginValide= $_SESSION['login'];
            }
        }else{
            $messageErreur="Votre pseudo ne peut pas être vide";
        }

        // vérifier que l'email est correct
        if(!empty($_POST['email'])){

            if($_POST['email'] != $utilisateur->AdresseMail){
                $emailStatus = empty(utilisateur::getUtilisateurParMail($_POST['email']))?true:false;
                if($emailStatus==true){
                    $mailValide = $_POST['email'];
                }else{
                    $messageErreur = "Le mail ".$_POST['email']." existe déjà !";
                }
            }else{
                $mailValide=$utilisateur->AdresseMail;
            }
        }else{
            $messageErreur="Votre adresse mail ne peut pas être vide";
        }

        //vérifier que le mots de passe est correct
        if($_POST['password'] && empty($_POST['confirm_password'])){
            $messageErreur = "La confirmation de mots de passe est manquante !";
        }else if(empty($_POST['password']) && $_POST['confirm_password']){
            $messageErreur = "Le mots de passe est manquant !";
        }else if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){
            if(password_verify($_POST['password'],$utilisateur->Pass)){
                $passwordValide = $utilisateur->Pass;
            }else{
                if($_POST['password'] != $_POST['confirm_password']){
                    $messageErreur = "Votre mots de passe de confirmation ne correspond pas !";
                }else{
                    $passwordValide = $_POST['password'];
                }
            }
        }else{
            $passwordValide = $utilisateur->Pass;
        }

        $_SESSION['login']=$loginValide;
        utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
        $messageInfo = "Votre profil a bien été mis à jour.";
        header("Location: ".ROOT_PATH);
        exit();
        */

        /*
        function requeteModification(){
            $_SESSION['login']=$loginValide;
            utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $actif);
            $messageInfo = "Votre profil a bien été mis à jour.";
            header("Location: ".ROOT_PATH);
            exit();
        }

        function verifPass($password, $confirm_password){
            if($password && empty($confirm_password)){
                $messageErreur = "La confirmation de mots de passe est manquante !";
            }else if(empty($password) && $confirm_password){
                $messageErreur = "Le mots de passe est manquant !";
            }else if(!empty($password) && !empty($confirm_password)){
                if(password_verify($password, $utilisateur->Pass)){
                    $passwordValide = $utilisateur->Pass;
                    requeteModification();
                }else{
                    if($password != $confirm_password){
                        $messageErreur = "Votre mots de passe de confirmation ne correspond pas !";
                    }else{
                        $passwordValide = $password;
                        requeteModification();
                        return 0;
                    }
                }
            }else{
                $passwordValide = $utilisateur->Pass;
                requeteModification();
                return 0;
            }
        }

        function verifEmail($email){
            if(!empty($email)){
                if($email != $utilisateur->AdresseMail){
                    $emailStatus = empty(utilisateur::getUtilisateurParMail($email))?true:false;
                    if($emailStatus==true){
                        $mailValide = $email;
                        verifPass($_POST['password'], $_POST['confirm_password']);
                    }else{
                        $messageErreur = "Le mail ".$email." existe déjà !";
                    }
                }else{
                    $mailValide=$utilisateur->AdresseMail;
                    verifPass($_POST['password'], $_POST['confirm_password']);
                }
            }else{
                $messageErreur="Votre adresse mail ne peut pas être vide";
            }
        }

        function verifLogin($login){
            if(!empty($_POST['login'])){
                if($_POST['login'] != $_SESSION['login']){
                    $loginStatus = empty(utilisateur::getUtilisateurParLogin($_POST['login']))?true:false;
                    if($loginStatus==true){
                        $loginValide=$_POST['login'];
                        verifEmail($_POST['email']);
                        //verifPass($_POST['password'], $_POST['confirm_password']);
                        //requeteModification();
                    }else{
                        $messageErreur = "Le login ". $_POST['login'] . " existe déjà !";
                    }
                }else{
                    $loginValide= $_SESSION['login'];
                    verifEmail($_POST['email']);
                    //verifPass($_POST['password'], $_POST['confirm_password']);
                    //requeteModification();
                }
            }else{
                $messageErreur="Votre pseudo ne peut pas être vide";
            }
        }

        verifLogin($_POST['login']);
        */      
    }

    navControl();    
    include 'views/modifier_utilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
    
?>