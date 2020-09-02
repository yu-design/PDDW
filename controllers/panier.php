<?php
    $titre = "Pannier";
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/panier.php';


    if(REQ_ACTION == "ajouter"){

        if(empty($_SESSION['role'])){

            header("Location: ".ROOT_PATH."login");
        }
        else
        {
            Panier::ajouterAuPanier(REQ_TYPE_ID);
        }
    }
    elseif (REQ_ACTION =="supprimer"){
        Panier::retirerDuPanier(REQ_TYPE_ID);
    }

    if (count($_SESSION['panier']) < 1 ) {
        include 'views/panierVide.php';
    } 
    else {

        $articles = Panier::getPanier($_SESSION['panier']);
        include 'views/panier.php';
    }   

    
    navControl();
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

/*

Pannier:
    - Vérifier si la variable de empty($_SESSION['AddPanier'])?true:false;
        * Si non , continuer le code
        * Si oui, Ajouter article dans une liste (tableau) + rafraichir $_SESSION['AddArticlePanier'] + ajouter en DB que l'article a été ajouté en achat et stocker le prix fix.
    
    - Afficher s'il y a quelque chose dans le pannier -> empty($_SESSION['panierPlein'])?true:false;
        * Si panier vide -> afficher : Votre panier est vide
        * Si panier contient des données : afficher les données (foreach)

    - Si utilisateur clique sur valider commande
        * ajout en db de l'ajout d'une vente avec les références de prix qui on étés stockés dans la db au moment date de la validation de la vente.
        * Le panier se vide (tableau en session se vide)

*/


?>


