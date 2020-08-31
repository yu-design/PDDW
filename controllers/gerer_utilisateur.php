<?php
    require 'models/utilisateur.php';
    require 'navControler.php';
    
    $utilisateur = utilisateur::getUtilisateurParLogin($_SESSION['loginModif']);
    $titre="Bédébile - Gestion de l'utilisateurs ".$_SESSION['loginModif'];
    

    $loginValide=null;
    $mailValide=null;
    $passwordValide=null;
    $roleUtilisateur=null;
    $passwordActif=$_SESSION['passModif'];

    if(!empty($_POST)){
        
        // Actif 1 = actif || 0 = inactif
        $actif=(empty($_POST['actif']))?1:0;
        
        $roleUtilisateur=$_POST['role'];

        // vérifier que le login est correct
        if(!empty($_POST['login'])){
            if($_POST['login'] != $utilisateur->Login){
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
                                        $utilisateur->Login=$loginValide;
                                        utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                        $messageInfo = "Le profil a bien été mis à jour.";
                                        header("Location: ".ROOT_PATH."gerer_client");
                                        exit();
                                    }else{
                                        if($_POST['password'] != $_POST['confirm_password']){
                                            $messageErreur = "Le mots de passe de confirmation ne correspond pas !";
                                        }else{
                                            $passwordValide = $_POST['password'];
                                            // Enregistrement
                                            $utilisateur->Login=$loginValide;
                                            utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                            $messageInfo = "Le profil a bien été mis à jour.";
                                            header("Location: ".ROOT_PATH."gerer_client");
                                            exit();
                                        }
                                    }
                                }else{
                                    $passwordValide = $utilisateur->Pass;
                                    //Enregistrement
                                    $utilisateur->Login=$loginValide;
                                    utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                    $messageInfo = "Le profil a bien été mis à jour.";
                                    header("Location: ".ROOT_PATH."gerer_client");
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
                                    $utilisateur->Login=$loginValide;
                                    utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                    $messageInfo = "Le profil a bien été mis à jour.";
                                    header("Location: ".ROOT_PATH."gerer_client");
                                    exit();
                                }else{
                                    if($_POST['password'] != $_POST['confirm_password']){
                                        $messageErreur = "Le mots de passe de confirmation ne correspond pas !";
                                    }else{
                                        $passwordValide = $_POST['password'];
                                        // Enregistrement
                                        $utilisateur->Login=$loginValide;
                                        utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                        $messageInfo = "Le profil a bien été mis à jour.";
                                        header("Location: ".ROOT_PATH."gerer_client");
                                        exit();
                                    }
                                }
                            }else{
                                $passwordValide = $utilisateur->Pass;
                                //Enregistrement
                                $utilisateur->Login=$loginValide;
                                utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                $messageInfo = "Le profil a bien été mis à jour.";
                                header("Location: ".ROOT_PATH."gerer_client");
                                exit();
                            }
                        }
                    }else{
                        $messageErreur="L'adresse mail ne peut pas être vide";
                    }
                }else{
                    $messageErreur = "Le login ". $_POST['login'] . " existe déjà !";
                }
            }else{
                $loginValide= $utilisateur->Login;
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
                                    $utilisateur->Login=$loginValide;
                                    utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                    $messageInfo = "Le profil a bien été mis à jour.";
                                    header("Location: ".ROOT_PATH."gerer_client");
                                    exit();
                                }else{
                                    if($_POST['password'] != $_POST['confirm_password']){
                                        $messageErreur = "Le mots de passe de confirmation ne correspond pas !";
                                    }else{
                                        $passwordValide = $_POST['password'];
                                        // Enregistrement
                                        $utilisateur->Login=$loginValide;
                                        utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                        $messageInfo = "Le profil a bien été mis à jour.";
                                        header("Location: ".ROOT_PATH."gerer_client");
                                        exit();
                                    }
                                }
                            }else{
                                $passwordValide = $utilisateur->Pass;
                                //Enregistrement
                                $utilisateur->Login=$loginValide;
                                utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                $messageInfo = "Le profil a bien été mis à jour.";
                                header("Location: ".ROOT_PATH."gerer_client");
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
                                $utilisateur->Login=$loginValide;
                                utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                $messageInfo = "Le profil a bien été mis à jour.";
                                header("Location: ".ROOT_PATH."gerer_client");
                                exit();
                            }else{
                                if($_POST['password'] != $_POST['confirm_password']){
                                    $messageErreur = "Le mots de passe de confirmation ne correspond pas !";
                                }else{
                                    $passwordValide = $_POST['password'];
                                    // Enregistrement
                                    $utilisateur->Login=$loginValide;
                                    utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                                    $messageInfo = "Le profil a bien été mis à jour.";
                                    header("Location: ".ROOT_PATH."gerer_client");
                                    exit();
                                }
                            }
                        }else{
                            $passwordValide = $utilisateur->Pass;
                            //Enregistrement
                            $utilisateur->Login=$loginValide;
                            utilisateur::modifierUtilisateurAdministration($utilisateur->ID, $loginValide, $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $mailValide, $passwordValide, $_POST['anniversaire'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['numtel'], $roleUtilisateur, $actif);
                            $messageInfo = "Le profil a bien été mis à jour.";
                            header("Location: ".ROOT_PATH."gerer_client");
                            exit();
                        }
                    }
                }else{
                    $messageErreur="L'adresse mail ne peut pas être vide";
                }
            }
        }else{
            $messageErreur="Le pseudo ne peut pas être vide";
        }

    }

    include 'views/includes/head.php';
    navControl();
    include 'views/includes/header.php';
    include 'views/gerer_utilisateur.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

?>