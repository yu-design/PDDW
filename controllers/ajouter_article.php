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
            }
            else if($ISBN){
                $messageErreur = "La référence ISBN' ".$_POST['ISBN']." existe déjà...";
            }else if(($_POST['prix']) < 0){
                $messageErreur = "Le prix ne peut pas être négatif !";
            }else if(($_POST['date']) > date('Y-m-d')){
                $messageErreur = "La date ne peut pas être postérieur à la date courrante !";
            }else if(isset($_FILES['couverture'])){
                $dossier = 'upload/';
                $fichier = basename($_FILES['avatar']['name']);
                if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                {
                    echo 'Upload effectué avec succès !';
                }
                else //Sinon (la fonction renvoie FALSE).
                {
                    echo 'Echec de l\'upload !';
                }
                article::ajouterNouveauArticle($_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date']);
                header("Location: ".ROOT_PATH."afficher_article");
                exit();
            }else{
                article::ajouterNouveauArticle($_POST['EAN'], $_POST['ISBN'], $_POST['typeArticle_ID'], $_POST['titre'], $_POST['auteur'], $_POST['dessinateur'], $_POST['edition'], $_POST['collection'], $_POST['prix'], $_POST['date']);
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