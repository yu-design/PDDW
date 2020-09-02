<?php
    $titre = "Gérer articles - ".$_SESSION['TitreArticle'];
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';

    $article = article::getArticleParID($_SESSION['IDArticle']);
    
    $typeArticle = array(
        1 => 'mangas',
        2 => 'bande_dessinees',
        3 => 'comics',
        4 => 'romans'
    );

    if($typeArticle == $article->TypeArticle_ID){
        $typeArticle = $typeArticle[$article->typeArticle_ID];
    }

    $EANValide = null;
    $ISBNValide = null;
    $nomImage = null;

    if(!empty($_POST)){

        // Actif 1 = actif || 0 = inactif
        $actif=(empty($_POST['actif']))?1:0;


        if(!empty($_POST['EAN']) && !empty($_POST['ISBN']) && !empty($_POST['typeArticle_ID']) && !empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['dessinateur']) && !empty($_POST['edition']) && !empty($_POST['collection']) && !empty($_POST['prix']) && !empty($_POST['date'])){
            
            //vérification prix
            if(($_POST['prix']) < 0){
                $messageErreur = "Le prix ne peut pas être négatif !";
            }
            // vérification EAN
            else if($_POST['EAN']!=$article->EAN){
                $EANStatus = empty(article::getArticleParEAN($_POST['EAN']))?true:false;
                if($EANStatus==true){
                    $EANValide = $_POST['EAN'];
                    // Vérifier ISBN
                    if($_POST['ISBN']!=$article->ISBN){
                        $ISBNStatus = empty(article::getArticleParISBN($_POST['ISBN']))?true:false;
                        if($ISBNStatus==true){
                            $ISBNValide = $_POST['ISBN'];
                            // Traitement de l'ajout d'une image
                            if((isset($_FILES['couverture'])) && (!empty($_FILES['couverture']['name']))){
                                $nomImage = $article->ID;
                                $tailleMaximale = 1048576;
                                $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
                                if($_FILES['couverture']['size'] <= $tailleMaximale){
                                    $extensionUpload = strtolower(substr(strrchr($_FILES['couverture']['name'],'.'), 1));
                                    if(in_array($extensionUpload,$extensionsValides)){
                                        $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                                        $accepterFichier = move_uploaded_file($_FILES['couverture']['tmp_name'], $chemin);
                                        if($accepterFichier){
                                            $nomImage = $article->ID.'.'.$extensionUpload;
                                            article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage, $actif);
                                            header("Location: ".ROOT_PATH."afficher_article");
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
                                if($article->Image){
                                    article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $article->Image, $actif);
                                    header("Location: ".ROOT_PATH."afficher_article");
                                    exit();
                                }else{
                                $nomImage = null;
                                article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage, $actif);
                                header("Location: ".ROOT_PATH."afficher_article");
                                exit();
                                }
                            }
                        }else{
                            $messageErreur = "La référence ISBN ".$_POST['ISBN']."existe déjà ...";
                        }
                    }else{
                        $ISBNValide = $article->ISBN;
                        // Traitement de l'ajout d'une image
                        if((isset($_FILES['couverture'])) && (!empty($_FILES['couverture']['name']))){
                            $nomImage = $article->ID;
                            $tailleMaximale = 1048576;
                            $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
                            if($_FILES['couverture']['size'] <= $tailleMaximale){
                                $extensionUpload = strtolower(substr(strrchr($_FILES['couverture']['name'],'.'), 1));
                                if(in_array($extensionUpload,$extensionsValides)){
                                    $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                                    $accepterFichier = move_uploaded_file($_FILES['couverture']['tmp_name'], $chemin);
                                    if($accepterFichier){
                                        $nomImage = $article->ID.'.'.$extensionUpload;
                                        article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage, $actif);
                                        header("Location: ".ROOT_PATH."afficher_article");
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
                            if($article->Image){
                                article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $article->Image, $actif);
                                header("Location: ".ROOT_PATH."afficher_article");
                                exit();
                            }else{
                            $nomImage = null;
                            article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage, $actif);
                            header("Location: ".ROOT_PATH."afficher_article");
                            exit();
                            }
                        }
                    }
                }else{
                    $messageErreur = "La référence EAN ".$_POST['EAN']."existe déjà ...";
                }
            }else{
                $EANValide = $article->EAN;
                // Vérifier ISBN
                if($_POST['ISBN']!=$article->ISBN){
                    $ISBNStatus = empty(article::getArticleParISBN($_POST['ISBN']))?true:false;
                    if($ISBNStatus==true){
                        $ISBNValide = $_POST['ISBN'];
                        // Traitement de l'ajout d'une image
                        if((isset($_FILES['couverture'])) && (!empty($_FILES['couverture']['name']))){
                            $nomImage = $article->ID;
                            $tailleMaximale = 1048576;
                            $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
                            if($_FILES['couverture']['size'] <= $tailleMaximale){
                                $extensionUpload = strtolower(substr(strrchr($_FILES['couverture']['name'],'.'), 1));
                                if(in_array($extensionUpload,$extensionsValides)){
                                    $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                                    $accepterFichier = move_uploaded_file($_FILES['couverture']['tmp_name'], $chemin);
                                    if($accepterFichier){
                                        $nomImage = $article->ID.'.'.$extensionUpload;
                                        article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage, $actif);
                                        header("Location: ".ROOT_PATH."afficher_article");
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
                            if($article->Image){
                                article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $article->Image, $actif);
                                header("Location: ".ROOT_PATH."afficher_article");
                                exit();
                            }else{
                            $nomImage = null;
                            article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage, $actif);
                            header("Location: ".ROOT_PATH."afficher_article");
                            exit();
                            }
                        }
                    }else{
                        $messageErreur = "La référence ISBN ".$_POST['ISBN']."existe déjà ...";
                    }
                }else{
                    $ISBNValide = $article->ISBN;
                    // Traitement de l'ajout d'une image
                if((isset($_FILES['couverture'])) && (!empty($_FILES['couverture']['name']))){
                    $nomImage = $article->ID;
                    $tailleMaximale = 1048576;
                    $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
                    if($_FILES['couverture']['size'] <= $tailleMaximale){
                        $extensionUpload = strtolower(substr(strrchr($_FILES['couverture']['name'],'.'), 1));
                        if(in_array($extensionUpload,$extensionsValides)){
                            $chemin = "public/images/articles/".$article->ID.".".$extensionUpload;
                            $accepterFichier = move_uploaded_file($_FILES['couverture']['tmp_name'], $chemin);
                            if($accepterFichier){
                                $nomImage = $article->ID.'.'.$extensionUpload;
                                article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage, $actif);
                                header("Location: ".ROOT_PATH."afficher_article");
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
                    if($article->Image){
                        article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $article->Image, $actif);
                        header("Location: ".ROOT_PATH."afficher_article");
                        exit();
                    }else{
                    $nomImage = null;
                    article::modifierArticle($article->ID, $_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage, $actif);
                    header("Location: ".ROOT_PATH."afficher_article");
                    exit();
                    }
                }
                }
            }
        }else{
            //Ici on va prévenir l'utilisateur qu'il manque quelque chose
            $messageErreur = "Une information est manquante, veuillez réessayer !";
        }


    }


    navControl();
    include 'views/gerer_article.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';
?>
