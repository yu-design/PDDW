<?php 
    include 'views/includes/head.php';
    require 'navControler.php';
    require 'models/utilisateur.php';
    require 'models/article.php';
    require 'models/contenuVente.php';
    require 'models/vente.php';

    if(REQ_ACTION =="validerPanier"){

        $venteID = Vente::validerPanier($_SESSION['id'],$_SESSION['totalPanier']);
        $listeArticles = article::getArticleFiltrerParID($_SESSION['panier']);
        ContenuVente::ajouterContenuVente($listeArticles, $venteID);
        $_SESSION['panier'] = [];
        $titre = "Confirmation vente ".$venteID;
        include 'views/vente_Valide.php';
    }

    elseif (!REQ_TYPE_ID){
        $ventes = Vente::getListingVenteUtilisateur($_SESSION['id']);
        $titre = "Historique de vos ventes";
        include 'views/vente.php';
    }

    else{
        $titre = "Contenu de la vente";
        
        $vente = Vente::getVenteParId(REQ_TYPE_ID);
        $vente->Contenu = ContenuVente::getContenuVente($vente->ID);
        include 'views/vente_Detail.php';
    }

    navControl();
    include 'views/includes/main.php';
    include 'views/includes/footer.php';

?>
