<?php

// require = import en java
require_once 'article.php';


class articleAdmin{

    public static function modifierArticleVerif($ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $Actif) {
        // Actif 1 = actif || 0 = inactif
        $actif=(empty($Actif))?1:0;
        $article = article::getArticleParID($ID);
            //vérification prix
            if($Prix < 0){
                $messageErreur = "Le prix ne peut pas être négatif !";
            }
            // vérification EAN
            else if($EAN != $article->EAN){
                $EANStatus = empty(article::getArticleParEAN($EAN))?true:false;
                if($EANStatus==true){
                    $EANValide = $EAN;
                    // Vérifier ISBN
                    if($ISBN != $article->ISBN){
                        $ISBNStatus = empty(article::getArticleParISBN($ISBN))?true:false;
                        if($ISBNStatus==true){
                            $ISBNValide = $ISBN;
                            // Traitement de l'ajout d'une image
                            if((isset($Image)) && (!empty($_FILES[$Image]['name']))){
                                $nomImage = $article->ID;
                                $tailleMaximale = 1048576;
                                $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
                                if($_FILES[$Image]['size'] <= $tailleMaximale){
                                    $extensionUpload = strtolower(substr(strrchr($_FILES[$Image]['name'],'.'), 1));
                                    if(in_array($extensionUpload,$extensionsValides)){
                                        $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                                        $accepterFichier = move_uploaded_file($_FILES[$Image]['tmp_name'], $chemin);
                                        if($accepterFichier){
                                            $nomImage = $article->ID.'.'.$extensionUpload;
                                            article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);
                                            
                                            
                                        }else{
                                            $messageErreur = "Une erreur s'est produite durant l'importation du fichier, veuillez réessayer ou inclure une autre image.";
                                        }
                                    }else{
                                        $messageErreur = "L'extension du fichier n'est pas supportée.<br/> Veuillez utiliser le format (jpg, jpeg, png ou gif).";
                                    }
                                }else{
                                    $messageErreur = "L'image de couverture ne doit pas dépasser 1 Mo";
                                }
                            }else{
                                if($article->Image){
                                    article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $article->Image, $actif);
                                    
                                    
                                }else{
                                $nomImage = null;
                                article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);
                                
                                
                                }
                            }
                        }else{
                            $messageErreur = "La référence ISBN ".$ISBN."existe déjà ...";
                        }
                    }else{
                        $ISBNValide = $article->ISBN;
                        // Traitement de l'ajout d'une image
                        if((isset($_FILES[$Image])) && (!empty($_FILES[$Image]['name']))){
                            $nomImage = $article->ID;
                            $tailleMaximale = 1048576;
                            $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
                            if($_FILES[$Image]['size'] <= $tailleMaximale){
                                $extensionUpload = strtolower(substr(strrchr($_FILES[$Image]['name'],'.'), 1));
                                if(in_array($extensionUpload,$extensionsValides)){
                                    $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                                    $accepterFichier = move_uploaded_file($_FILES[$Image]['tmp_name'], $chemin);
                                    if($accepterFichier){
                                        $nomImage = $article->ID.'.'.$extensionUpload;
                                        article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);
                                        
                                        
                                    }else{
                                        $messageErreur = "Une erreur s'est produite durant l'importation du fichier, veuillez réessayer ou inclure une autre image.";
                                    }
                                }else{
                                    $messageErreur = "L'extension du fichier n'est pas supportée.<br/> Veuillez utiliser le format (jpg, jpeg, png ou gif).";
                                }
                            }else{
                                $messageErreur = "L'image de couverture ne doit pas dépasser 1 Mo";
                            }
                        }else{
                            if($article->Image){
                                article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $article->Image, $actif);
                                
                                
                            }else{
                            $nomImage = null;
                            article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);
                            
                            }
                        }
                    }
                }else{
                    $messageErreur = "La référence EAN ".$EAN."existe déjà ...";
                }
            }else{
                $EANValide = $article->EAN;
                // Vérifier ISBN
                if($ISBN!=$article->ISBN){
                    $ISBNStatus = empty(article::getArticleParISBN($ISBN))?true:false;
                    if($ISBNStatus==true){
                        $ISBNValide = $ISBN;
                        // Traitement de l'ajout d'une image
                        if((isset($_FILES[$Image])) && (!empty($_FILES[$Image]['name']))){
                            $nomImage = $article->ID;
                            $tailleMaximale = 1048576;
                            $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
                            if($_FILES[$Image]['size'] <= $tailleMaximale){
                                $extensionUpload = strtolower(substr(strrchr($_FILES[$Image]['name'],'.'), 1));
                                if(in_array($extensionUpload,$extensionsValides)){
                                    $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                                    $accepterFichier = move_uploaded_file($_FILES[$Image]['tmp_name'], $chemin);
                                    if($accepterFichier){
                                        $nomImage = $article->ID.'.'.$extensionUpload;
                                        article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);
                                        
                                        
                                    }else{
                                        $messageErreur = "Une erreur s'est produite durant l'importation du fichier, veuillez réessayer ou inclure une autre image.";
                                    }
                                }else{
                                    $messageErreur = "L'extension du fichier n'est pas supportée.<br/> Veuillez utiliser le format (jpg, jpeg, png ou gif).";
                                }
                            }else{
                                $messageErreur = "L'image de couverture ne doit pas dépasser 1 Mo";
                            }
                        }else{
                            if($article->Image){
                                article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $article->Image, $actif);
                                
                                
                            }else{
                            $nomImage = null;
                            article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);
                            
                            }
                        }
                    }else{
                        $messageErreur = "La référence ISBN ".$ISBN."existe déjà ...";
                    }
                }else{
                    $ISBNValide = $article->ISBN;
                    // Traitement de l'ajout d'une image
                    if((isset($_FILES[$Image])) && (!empty($_FILES[$Image]['name']))){
                        $nomImage = $article->ID;
                        $tailleMaximale = 1048576;
                        $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
                        if($_FILES[$Image]['size'] <= $tailleMaximale){
                            $extensionUpload = strtolower(substr(strrchr($_FILES[$Image]['name'],'.'), 1));
                            if(in_array($extensionUpload,$extensionsValides)){
                                $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                                $accepterFichier = move_uploaded_file($_FILES[$Image]['tmp_name'], $chemin);
                                if($accepterFichier){
                                    $nomImage = $article->ID.'.'.$extensionUpload;
                                    article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);
                                    
                                    
                                }else{
                                    $messageErreur = "Une erreur s'est produite durant l'importation du fichier, veuillez réessayer ou inclure une autre image.";
                                }
                            }else{
                                $messageErreur = "L'extension du fichier n'est pas supportée.<br/> Veuillez utiliser le format (jpg, jpeg, png ou gif).";
                            }
                        }else{
                            $messageErreur = "L'image de couverture ne doit pas dépasser 1 Mo";
                        }
                    }else{
                        if($article->Image){
                            article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $article->Image, $actif);
                            
                        }else{
                            $nomImage = null;
                            article::modifierArticle($article->ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);
                            
                        }
                    }
                }
            }
    }

    public static function ajouterNouveauArticleVerif($EAN, $ISBN, $TypeArticle_id, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image){
        $EAN = article::getArticleParEAN($_POST['EAN']);
        $ISBN = article::getArticleParISBN($_POST['ISBN']);

        if($EAN){
            $messageErreur = "La référence EAN ".$_POST['EAN']." existe déjà...";
        }else if($ISBN){
            $messageErreur = "La référence ISBN' ".$_POST['ISBN']." existe déjà...";
        }else if(($_POST['prix']) < 0){
            $messageErreur = "Le prix ne peut pas être négatif !";
        }else if(($_POST['date']) > date('Y-m-d')){
            $messageErreur = "La date ne peut pas être postérieur à la date courrante !";
        // Traitement de l'ajout d'une image
        }else if((isset($_FILES['couverture'])) && (!empty($_FILES['couverture']['name']))){
            $tailleMaximale = 1048576;
            $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
            if($_FILES['couverture']['size'] <= $tailleMaximale){
                $extensionUpload = strtolower(substr(strrchr($_FILES['couverture']['name'],'.'), 1));
                if(in_array($extensionUpload,$extensionsValides)){
                    $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                    $accepterFichier = move_uploaded_file($_FILES['couverture']['tmp_name'], $chemin);
                    if($accepterFichier){
                        $nomImage = $article->ID.'.'.$extensionUpload;
                        article::ajouterNouveauArticle($_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage);
                        header("Location: ".ROOT_PATH."articles//AdminArticle");
                        exit();
                    }else{
                        $messageErreur = "Une erreur s'est produite durant l'importation du fichier, veuillez réessayer ou inclure une autre image.";
                    }
                }else{
                    $messageErreur = "L'extension du fichier n'est pas supportée.<br/> Veuillez utiliser le format (jpg, jpeg, png ou gif).";
                }
            }else{
                $messageErreur = "L'image de couverture ne doit pas dépasser 1 Mo";
            }
        }else{
            $nomImage = null;
            article::ajouterNouveauArticle($_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage);
            header("Location: ".ROOT_PATH."articles//AdminArticle");
            exit();
        }
    }

}

?>