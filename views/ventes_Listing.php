<?php ob_start(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Montant</th>
      <th scope="col">Identifiant client</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<?php foreach($ventes as $vente):?>
    <tr>
        <th scope="row"><?= $vente->DateTransaction ?></th>
        <td><?= $vente->MontantTotal ?></td>
        <td><?= $vente->Utilisateur_ID ?></td>
        <td>
          <a href="<?=ROOT_PATH?>commande/<?= $vente->ID ?>" class="btn btn-primary">Voir<a>
        </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>

<?php
  $title = "Listing commande client";
  $content = ob_get_clean();
?>
