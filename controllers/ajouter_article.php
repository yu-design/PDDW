<?php
    $titre = "Ajouter des articles";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/article.php';

    if(!empty($_POST)) {
        if(!empty($_POST['EAN']) && !empty($_POST['ISBN']) && !empty($_POST['typeArticle_ID']) && !empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['dessinateur']) && !empty($_POST['edition']) && !empty($_POST['collection']) && !empty($_POST['prix']) && !empty($_POST['date'])){
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
                $nomImage = null;
                article::ajouterNouveauArticle($_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date'], $nomImage);
                header("Location: ".ROOT_PATH."afficher_article");
                exit();
            }
        }
        else
        {
            //Ici on va prévenir l'utilisateur qu'il manque quelque chose
            $messageErreur = "Une information est manquante, veuillez réessayer !";
        }
    }

    navControl();
    include 'views/ajouter_article.php';
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

?>