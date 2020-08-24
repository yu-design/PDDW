<?php
    require 'models/utilisateur.php';

    class helpers{

        public static function verifPass($login, $pass, $passConfirm){
            $utilisateur=Utilisateur::getUtilisateurParLogin($login);
            if(!empty($pass)){
                return $Utilisateur->Pass;
            }else{
                try{

                }catch(messageErreur e){
                    $messageErreur;
                }
            }
        }

        public static function verifLogin($login){
            
        }

    }
?>


<!--
        if(!empty($_POST)) {
                if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['nom']) && !empty($_POST['prenom'])){
                    //vérification du mot de passe
                    if($_POST['password'] != $_POST['confirm_password'])
                    {
                        $messageErreur = "Votre mot de passe ne correspond pas.";
                    }
                    else { //vérifier que le login ou l'adresse mail n'existe pas
                        $user = Utilisateur::getUtilisateurParLogin($_POST['login']);
                        $mail = Utilisateur::getUtilisateurParMail($_POST['email']);
                        if($user){
                            $messageErreur = "Le login ".$_POST['login']." existe déjà...";
                        }
                        else if($mail){
                            $messageErreur = "Le mail ".$_POST['email']." existe déjà...";
                        }else{
                            Utilisateur::ajouterNouveauUtilisateur($_POST['login'], $_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom']);
                        //ici je connecte directement l'user qui vient de s'inscrire
                        $user = Utilisateur::getUtilisateurParLogin($_POST['login']);
                        $_SESSION['id'] = $user->ID;
                        $_SESSION['login'] =  $user->Login;
                        $_SESSION['role'] = $user->RoleUtilisateur_ID;
                                    echo $_SESSION['id'];
                        header("Location: ".ROOT_PATH);
                        exit();
                        }
                    }
                }
                else
                {
                    //Ici on va prévenir l'utilisateur qu'il manque quelque chose
                    $errorMessage = "Une information est manquante, veuillez réessayer !";
                }
            }
        }

-->
        