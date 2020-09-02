<?php

require_once 'db.php';


class Vente {

    public $ID;
    public $DateTransaction;
    public $Utilisateur_ID;
    public $MontantTotal;
    public $Contenu;
    public $Nom;
    public $Prenom;

    public function  __construct($data=NULL){
        if(is_array($data)){
            $this->ID = $data['ID'];
            $this->DateTransaction = $data['DateTransaction'];
            $this->Utilisateur_ID = $data['Utilisateur_ID'];
            $this->MontantTotal = $data['MontantTotal'];
            $this->Contenu = [];
            $this->Nom = $data['Nom'] != null? $data['Nom'] : '';
            $this->Prenom = $data['Prenom']!= null? $data['Prenom'] : '';
            
        }        
    }


    public function getListingVente(){
        global $db;
        $response = $db->prepare('SELECT vente.ID, DateTransaction, MontantTotal, Nom, Prenom FROM vente INNER JOIN utilisateur on utilisateur.ID = vente.Utilisateur_ID');
        $response->execute();
        $commandes = $response->fetchAll(PDO::FETCH_CLASS, "vente");

        $response->closeCursor();
        return $commandes;
    }

    public function getListingVenteUtilisateur($Utilisateur_ID){
        global $db;
        $response =  $db->prepare('SELECT * FROM vente WHERE Utilisateur_ID = :Utilisateur_ID');
        $response->execute([':Utilisateur_ID'=>$Utilisateur_ID]);
        $commandes = $response->fetchAll(PDO::FETCH_CLASS, "vente");
        $response->closeCursor();

        return $commandes;
    }

    public function getVenteParID($ID) {
        global $db;
        $response = $db->prepare('SELECT vente.ID, DateTransaction, MontantTotal, Nom, Prenom FROM vente INNER JOIN utilisateur on utilisateur.ID = vente.Utilisateur_ID WHERE vente.ID = :ID');
        $response->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'vente');
        $response->execute([':ID' => $ID]);
        $commande = $response->fetch();

        $response->closeCursor();

        return $commande;    
    }

    public function AjouterVente($Utilisateur_ID, $MontantTotal, $DateTransaction) {
        global $db;
        $response = $db->prepare('INSERT INTO vente SET DateTransaction = :DateTransaction, Utilisateur_ID = :Utilisateur_ID , MontantTotal= :MontantTotal');
        $response->execute([':DateTransaction' => $DateTransaction,':Utilisateur_ID' => $Utilisateur_ID,':MontantTotal' => $MontantTotal]);
        $response->closeCursor();
    }

    public function validerPanier($Utilisateur_ID,$MontantTotal){
        self::ajouterVente($Utilisateur_ID,$MontantTotal,date("Y-m-d"));
        $ventes = self::getListingVenteUtilisateur($Utilisateur_ID);
        $vente = $ventes[count($ventes)-1];
        return $vente->ID;
    }
}

?>
