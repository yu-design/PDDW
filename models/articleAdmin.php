<?php

// require = import en java
require_once 'article.php';


class articleAdmin{

    public function modifierArticleVerif($ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $Actif) {
        $typeModif = 'modifier';
        //$actif=(empty($Actif))?1:0;
        $article = article::getArticleParID($ID);
        //vérification prix
        if($Prix < 0){
            return "Le prix ne peut pas être négatif !";
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
                        articleAdmin::chargerImage($ID,$EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $Actif, $typeModif);
                    }else{
                        return "La référence ISBN ".$ISBN."existe déjà ...";
                    }
                }else{
                    $ISBNValide = $article->ISBN;
                    // Traitement de l'ajout d'une image
                    articleAdmin::chargerImage($ID,$EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $Actif, $typeModif);
                }
            }else{
                return "La référence EAN ".$EAN."existe déjà ...";
            }
        }else{
            $EANValide = $article->EAN;
            // Vérifier ISBN
            if($ISBN!=$article->ISBN){
                $ISBNStatus = empty(article::getArticleParISBN($ISBN))?true:false;
                if($ISBNStatus==true){
                    $ISBNValide = $ISBN;
                    // Traitement de l'ajout d'une image
                    articleAdmin::chargerImage($ID,$EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $Actif, $typeModif);
                }else{
                    return "La référence ISBN ".$ISBN."existe déjà ...";
                }
            }else{
                $ISBNValide = $article->ISBN;
                // Traitement de l'ajout d'une image
                $message = articleAdmin::chargerImage($ID,$EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $Actif, $typeModif);
            }
        }
    }

    public function ajouterNouveauArticleVerif($EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image){
        $typeModif = 'ajouter';
        $EANExist = article::getArticleParEAN($EAN);
        $ISBNExist = article::getArticleParISBN($ISBN);

        if($EANExist){
            return "La référence EAN ".$EANExist->EAN." existe déjà...";
        }else if($ISBNExist){
            return "La référence ISBN' ".$EANExist->ISBN." existe déjà...";
        }else if(($Prix) < 0){
            return "Le prix ne peut pas être négatif !";
        }else if(($Parution) > date('Y-m-d')){
            return "La date ne peut pas être postérieur à la date courrante !";
        }else{
            // Traitement de l'ajout d'une image
            $actif=1;
            //article::ajouterNouveauArticle($EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage);
            $ID=null;
            articleAdmin::chargerImage($ID,$EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $actif, $typeModif);
        }
    }

    public function chargerImage($ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $Image, $actif, $typeModif){
        $article = article::getArticleParID($ID);
        if((isset($Image['couverture'])) && (!empty($Image['couverture']['name']))){
            $nomImage = $ID;
            $tailleMaximale = 1048576;
            $extensionsValides = array('png', 'gif', 'jpg', 'jpeg');
            if($Image['couverture']['size'] <= $tailleMaximale){
                $extensionUpload = strtolower(substr(strrchr($Image['couverture']['name'],'.'), 1));
                if(in_array($extensionUpload,$extensionsValides)){
                    $chemin = "public/images/articles/".$ID.".".$extensionUpload;
                    $accepterFichier = move_uploaded_file($Image['couverture']['tmp_name'], $chemin);
                    if($accepterFichier){
                        $nomImage = $ID.'.'.$extensionUpload;
                        if($typeModif=="modifier"){
                            $resultat = article::modifierArticle($ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);

                        }else{
                            $resultat = article::ajouterNouveauArticle($EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage);
                        }
                    }else{
                        var_dump("erreur durant l'import du fichier");
                        die();
                        return "Une erreur s'est produite durant l'importation du fichier, veuillez réessayer ou inclure une autre image.";
                    }
                }else{
                    var_dump("erreur durant l'import du fichier");
                    die();
                    return "L'extension du fichier n'est pas supportée.<br/> Veuillez utiliser le format (jpg, jpeg, png ou gif).";
                }
            }else{
                return "L'image de couverture ne doit pas dépasser 1 Mo";
            }
        }else{
            if(($article->Image) && ($typeModif=='ajouter')){
                if($typeModif=="modifier"){
                    $resultat = article::modifierArticle($ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);

                }else{
                    $resultat = article::ajouterNouveauArticle($EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage);
                }
            }else{
                $nomImage = null;
                if($typeModif=="modifier"){
                    $resultat = article::modifierArticle($ID, $EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage, $actif);

                }else{
                    $resultat = article::ajouterNouveauArticle($EAN, $ISBN, $TypeArticle_ID, $Titre, $Auteur, $Dessinateur, $Edition, $Collection, $Prix, $Parution, $nomImage);
                }
            }
        }
    }
}

?>