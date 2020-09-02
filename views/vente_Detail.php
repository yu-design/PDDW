<?php ob_start(); ?>


<dl class="row grey">
    <dt class="col-sm-4">
        Commande effectuée le
        <br>
        <?= $vente->DateTransaction?>    
    <dt>
    <dt class="col-sm-4">
        Total
        <br>
        <?= $vente->MontantTotal?>
    <dt>
    <dt class="col-sm-4">
        Effectuée par :
        <br>
        <?= $vente->Utilisateur_ID?>    
    <dt>
</dl>
<?php foreach($vente->contenu as $contenu):?>
    <dl class="row">
        <dt class="col-sm-4"><?=$contenu->imageDate?></dt>
        <dt class="col-sm-4"><?=$contenu->titre?></dt>
        <dt class="col-sm-4"><?=$contenu->prixDate?>€</dt>
    </dl>
<?php endforeach ?>

<?php
    $title="Detail de la commande numéro ".$vente->ID;
    $content= ob_get_clean();
?>