<?php
require 'vente.php';
require 'contenuVente.php';

class Stats {   


    public function getStatVenteParTitre(){
    
        $listeVenteParTitre = [];

        //récupération de toute les commandes
        $ventes = Vente::getListingCommande();
        
        foreach ($ventes as $vente) {

            //récupération du contenu de la commande
            $contenu = ContenuVente::getContenuCommande($vente->ID);

            foreach ($contenu as $content) {

                //check si le titre est déjà dans la liste finale :
                //true => nbr +1
                //false => nouvelle ligne
                $titre = $content->Titre;
                if(array_key_exists($titre,$listeVenteParTitre)){

                    $listeVenteParTitre[$Ritre]++;
                }
                else{
                    $$listeVenteParTitre += array($Titre => 1);
                }            
            }        
        }

        return $listeVenteParTitre;
    }    
}

?>
