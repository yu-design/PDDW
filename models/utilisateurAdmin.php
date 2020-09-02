<?php

// require = import en java
require_once 'utilisateur.php';


class utilisateurAdmin{
    
    public static function modifierUtilisateurAdmin($id, $login, $prenom, $nom, $pseudo, $adresseMail, $password, $confirme_password, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $actif){
        $utilisateur = utilisateur::getUtilisateurParLogin($_SESSION['login']);
        $loginValide=null;
        $mailValide=null;
        $passwordValide=null;
        $passwordActif=$utilisateur->Pass;
        
        if(!empty($_POST)){
            
            // Actif 1 = actif || 0 = inactif
            $actif=(empty($actif))?1:0;

            // vérifier que la date est correct
            if(($dateNaissance) > date('Y-m-d')){
                return "La date ne peut pas être postérieur à la date courrante !";
            } // vérifier que le login est correct
            else if(!empty($login)){
                if($login != $utilisateur->Login){
                    $loginStatus = empty(utilisateur::getUtilisateurParLogin($login))?true:false;
                    if($loginStatus==true){
                        $loginValide=$login;
                        var_dump($_SESSION['id']);
                        die();
                        // vérifier que l'email est correct
                        if(!empty($email)){
                            if($email != $utilisateur->AdresseMail){
                                $emailStatus = empty(utilisateur::getUtilisateurParMail($email))?true:false;
                                if($emailStatus==true){
                                    $mailValide = $adresseMail;
                                    //vérifier que le mots de passe est correct
                                    if($password && empty($confirm_password)){
                                        return "La confirmation de mots de passe est manquante !";
                                    }else if(empty($password) && $confirm_password){
                                        return "Le mots de passe est manquant !";
                                    }else if(!empty($password) && !empty($confirm_password)){
                                        if(password_verify($password, $utilisateur->Pass)){
                                            $passwordValide = $utilisateur->Pass;
                                            // Enregistrement
                                            $_SESSION['login']=$loginValide;
                                            utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                            $messageInfo = "Votre profil a bien été mis à jour.";
                                        }else{
                                            if($password != $confirme_password){
                                                return "Votre mots de passe de confirmation ne correspond pas !";
                                            }else{
                                                $passwordValide = $password;
                                                // Enregistrement
                                                $_SESSION['login']=$loginValide;
                                                utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                                $messageInfo = "Votre profil a bien été mis à jour.";
                                            }
                                        }
                                    }else{
                                        $passwordValide = $utilisateur->Pass;
                                        //Enregistrement
                                        $_SESSION['login']=$loginValide;
                                        utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                        $messageInfo = "Votre profil a bien été mis à jour.";
                                    }
                                }else{
                                    return "Le mail ".$_POST['email']." existe déjà !";
                                }
                            }else{
                                $mailValide=$utilisateur->AdresseMail;
                                //vérifier que le mots de passe est correct
                                if($password && empty($confirme_password)){
                                    return "La confirmation de mots de passe est manquante !";
                                }else if(empty($password) && $confirme_password){
                                    return "Le mots de passe est manquant !";
                                }else if(!empty($password) && !empty($confirme_password)){
                                    if(password_verify($password,$utilisateur->Pass)){
                                        $passwordValide = $utilisateur->Pass;
                                        // Enregistrement
                                        $_SESSION['login']=$loginValide;
                                        utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                        $messageInfo = "Votre profil a bien été mis à jour.";
                                    }else{
                                        if($password != $confirme_password){
                                            return "Votre mots de passe de confirmation ne correspond pas !";
                                        }else{
                                            $passwordValide = $password;
                                            // Enregistrement
                                            $_SESSION['login']=$loginValide;
                                            utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                            $messageInfo = "Votre profil a bien été mis à jour.";
                                        }
                                    }
                                }else{
                                    $passwordValide = $utilisateur->Pass;
                                    //Enregistrement
                                    $_SESSION['login']=$loginValide;
                                    utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                    $messageInfo = "Votre profil a bien été mis à jour.";
                                }
                            }
                        }else{
                            return "Votre adresse mail ne peut pas être vide";
                        }
                    }else{
                        return "Le login ". $_POST['login'] . " existe déjà !";
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
                                if($password && empty($confirme_password)){
                                    return "La confirmation de mots de passe est manquante !";
                                }else if(empty($password) && $confirme_password){
                                    return "Le mots de passe est manquant !";
                                }else if(!empty($password) && !empty($confirme_password)){
                                    if(password_verify($password,$utilisateur->Pass)){
                                        $passwordValide = $utilisateur->Pass;
                                        // Enregistrement
                                        $_SESSION['login']=$loginValide;
                                        utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                        $messageInfo = "Votre profil a bien été mis à jour.";
                                    }else{
                                        if($password != $confirme_password){
                                            return "Votre mots de passe de confirmation ne correspond pas !";
                                        }else{
                                            $passwordValide = $password;
                                            // Enregistrement
                                            $_SESSION['login']=$loginValide;
                                            utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                            $messageInfo = "Votre profil a bien été mis à jour.";
                                        }
                                    }
                                }else{
                                    $passwordValide = $utilisateur->Pass;
                                    //Enregistrement
                                    $_SESSION['login']=$loginValide;
                                    utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                    $messageInfo = "Votre profil a bien été mis à jour.";
                                }
                            }else{
                                return "Le mail ".$_POST['email']." existe déjà !";
                            }
                        }else{
                            $mailValide=$utilisateur->AdresseMail;
                            //vérifier que le mots de passe est correct
                            if($password && empty($confirme_password)){
                                return "La confirmation de mots de passe est manquante !";
                            }else if(empty($password) && $confirme_password){
                                return "Le mots de passe est manquant !";
                            }else if(!empty($password) && !empty($confirme_password)){
                                if(password_verify($password,$utilisateur->Pass)){
                                    $passwordValide = $utilisateur->Pass;
                                    // Enregistrement
                                    $_SESSION['login']=$loginValide;
                                    utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                    $messageInfo = "Votre profil a bien été mis à jour.";
                                }else{
                                    if($password != $confirme_password){
                                        return "Votre mots de passe de confirmation ne correspond pas !";
                                    }else{
                                        $passwordValide = $password;
                                        // Enregistrement
                                        $_SESSION['login']=$loginValide;
                                        utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                        $messageInfo = "Votre profil a bien été mis à jour.";
                                    }
                                }
                            }else{
                                $passwordValide = $utilisateur->Pass;
                                //Enregistrement
                                $_SESSION['login']=$loginValide;
                                utilisateur::modifierUtilisateur($_SESSION['id'], $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $_SESSION['role'], $actif);
                                $messageInfo = "Votre profil a bien été mis à jour.";
                            }
                        }
                    }else{
                        return "Votre adresse mail ne peut pas être vide";
                    }
                }
            }else{
                return "Votre pseudo ne peut pas être vide";
            }
        }
    }
     

    public static function modifierUtilisateurAdministrationAdmin($id, $login, $prenom, $nom, $pseudo, $adresseMail, $password, $confirmPassword, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $role, $actif){
        $utilisateur = utilisateur::getUtilisateurParID($id);
        // Actif 1 = actif || 0 = inactif
        $actif=(empty($actif))?1:0;
        $loginValide=null;
        $mailValide=null;
        $passwordValide=null;

        // vérifier que la date est correct
        if(($dateNaissance) > date('Y-m-d')){
            return "La date ne peut pas être postérieur à la date courrante !";
        } // vérifier que le login est correct
        else if(!empty($login)){
            if($login != $utilisateur->Login){
                $loginStatus = empty(utilisateur::getUtilisateurParLogin($login))?true:false;
                if($loginStatus==true){
                    $loginValide=$login;
                    // vérifier que l'email est correct
                    if(!empty($email)){
                        if($email != $utilisateur->AdresseMail){
                            $emailStatus = empty(utilisateur::getUtilisateurParMail($email))?true:false;
                            if($emailStatus==true){
                                $mailValide = $email;
                                //vérifier que le mots de passe est correct
                                if($password && empty($confirmPassword)){
                                    return "La confirmation de mots de passe est manquante !";
                                }else if(empty($password) && $confirmPassword){
                                    return "Le mots de passe est manquant !";
                                }else if(!empty($password) && !empty($confirmPassword)){
                                    if(password_verify($password,$utilisateur->Pass)){
                                        $passwordValide = $utilisateur->Pass;
                                        // Enregistrement
                                        $utilisateur->Login=$loginValide;
                                        utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                        $messageInfo = "Le profil a bien été mis à jour.";
                                    }else{
                                        if($password != $confirmPassword){
                                            return "Le mots de passe de confirmation ne correspond pas !";
                                        }else{
                                            $passwordValide = $password;
                                            // Enregistrement
                                            $utilisateur->Login=$loginValide;
                                            utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                            $messageInfo = "Le profil a bien été mis à jour.";
                                        }
                                    }
                                }else{
                                    $passwordValide = $utilisateur->Pass;
                                    //Enregistrement
                                    $utilisateur->Login=$loginValide;
                                    utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                    $messageInfo = "Le profil a bien été mis à jour.";
                                }
                            }else{
                                return "Le mail ".$email." existe déjà !";
                            }
                        }else{
                            $mailValide=$utilisateur->AdresseMail;
                            //vérifier que le mots de passe est correct
                            if($password && empty($confirmPassword)){
                                return "La confirmation de mots de passe est manquante !";
                            }else if(empty($password) && $confirmPassword){
                                return "Le mots de passe est manquant !";
                            }else if(!empty($password) && !empty($confirmPassword)){
                                if(password_verify($password,$utilisateur->Pass)){
                                    $passwordValide = $utilisateur->Pass;
                                    // Enregistrement
                                    $utilisateur->Login=$loginValide;
                                    utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                    $messageInfo = "Le profil a bien été mis à jour.";
                                }else{
                                    if($password != $confirmPassword){
                                        return "Le mots de passe de confirmation ne correspond pas !";
                                    }else{
                                        $passwordValide = $password;
                                        // Enregistrement
                                        $utilisateur->Login=$loginValide;
                                        utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                        $messageInfo = "Le profil a bien été mis à jour.";
                                    }
                                }
                            }else{
                                $passwordValide = $utilisateur->Pass;
                                //Enregistrement
                                $utilisateur->Login=$loginValide;
                                utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                $messageInfo = "Le profil a bien été mis à jour.";
                            }
                        }
                    }else{
                        return "L'adresse mail ne peut pas être vide";
                    }
                }else{
                    return "Le login ". $login . " existe déjà !";
                }
            }else{
                $loginValide= $utilisateur->Login;
                // vérifier que l'email est correct
                if(!empty($email)){
                    if($email != $utilisateur->AdresseMail){
                        $emailStatus = empty(utilisateur::getUtilisateurParMail($email))?true:false;
                        if($emailStatus==true){
                            $mailValide = $email;
                            //vérifier que le mots de passe est correct
                            if($password && empty($confirmPassword)){
                                return "La confirmation de mots de passe est manquante !";
                            }else if(empty($password) && $confirmPassword){
                                return "Le mots de passe est manquant !";
                            }else if(!empty($password) && !empty($confirmPassword)){
                                if(password_verify($password,$utilisateur->Pass)){
                                    $passwordValide = $utilisateur->Pass;
                                    // Enregistrement
                                    $utilisateur->Login=$loginValide;
                                    utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                    $messageInfo = "Le profil a bien été mis à jour.";
                                }else{
                                    if($password != $confirmPassword){
                                        return "Le mots de passe de confirmation ne correspond pas !";
                                    }else{
                                        $passwordValide = $password;
                                        // Enregistrement
                                        $utilisateur->Login=$loginValide;
                                        utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                        $messageInfo = "Le profil a bien été mis à jour.";
                                    }
                                }
                            }else{
                                $passwordValide = $utilisateur->Pass;
                                //Enregistrement
                                $utilisateur->Login=$loginValide;
                                utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                $messageInfo = "Le profil a bien été mis à jour.";
                            }
                        }else{
                            return "Le mail ".$email." existe déjà !";
                        }
                    }else{
                        $mailValide=$utilisateur->AdresseMail;
                        //vérifier que le mots de passe est correct
                        if($password && empty($confirmPassword)){
                            return "La confirmation de mots de passe est manquante !";
                        }else if(empty($password) && $confirmPassword){
                            return "Le mots de passe est manquant !";
                        }else if(!empty($password) && !empty($confirmPassword)){
                            if(password_verify($password,$utilisateur->Pass)){
                                $passwordValide = $utilisateur->Pass;
                                // Enregistrement
                                $utilisateur->Login=$loginValide;
                                utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                $messageInfo = "Le profil a bien été mis à jour.";
                            }else{
                                if($password != $confirmPassword){
                                    return "Le mots de passe de confirmation ne correspond pas !";
                                }else{
                                    $passwordValide = $password;
                                    // Enregistrement
                                    $utilisateur->Login=$loginValide;
                                    utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                                    $messageInfo = "Le profil a bien été mis à jour.";
                                }
                            }
                        }else{
                            $passwordValide = $utilisateur->Pass;
                            //Enregistrement
                            $utilisateur->Login=$loginValide;
                            utilisateur::modifierUtilisateurAdministration($id, $loginValide, $prenom, $nom, $pseudo, $mailValide, $passwordValide, $dateNaissance, $adresse, $cp, $ville, $numTelephone, $roleUtilisateur, $actif);
                            $messageInfo = "Le profil a bien été mis à jour.";
                        }
                    }
                }else{
                    return "L'adresse mail ne peut pas être vide";
                }
            }
        }else{
            return "Le pseudo ne peut pas être vide";
        }
    }
    
}    
?>