<?php 
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';
    require 'models/article.php';
    require 'models/contenuVente.php';
    require 'models/vente.php';

    if(REQ_ACTION =="validerPanier"){

        $venteID = Vente::validerPanier($_SESSION['id'],$_SESSION['totalPanier']);
        $listeArticles = article::getArticleParID($_SESSION['panier']);
        ContenuVente::ajouterContenuCommande($listeArticles, $venteID);
        $_SESSION['panier'] = [];
        $titre = "Confirmation commande ".$venteID;
        include 'views/vente_Valide.php';
    }

    elseif (!REQ_TYPE_ID){
        $vente = Vente::getListingVenteUtilisateur($_SESSION['id']);
        $titre = "Historique de vos commandes";
        include 'views/vente.php';
    }

    else{
        $titre = "Contenu de la commande";
        
        $vente = Vente::getCommandeParId(REQ_TYPE_ID);
        $vente->Contenu = ContenuVente::getContenuCommande($vente->ID);
        include 'views/vente_Detail.php';
    }

    navControl();
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

?>
