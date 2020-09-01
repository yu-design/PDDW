<?php ob_start() ?>
    <div class="row">
        <div class="col">
            <img class="card-img-top" src="public/images/articles/<?= $article->Image?>" alt="Card image cap" style="width: 18rem;">
        </div>
        <div class="col">
            <h5><?=$article->Titre?></h5>
            Auteur : <?=$article->Auteur?><br/>
            Dessinateur : <?=$article->Dessinateur?><br/>
            Edition : <?=$article->Edition?><br/>
            Collection : <?=$article->Collection?><br/>
            Réf EAN : <?=$article->EAN?><br/>
            Réf ISBN : <?=$article->ISBN?><br/>
            Date de parution : <?=$article->Parution?><br/>
            Prix : <?=$article->Prix?>
            <p></p>
            <a href=<?=ROOT_PATH."articles"?> class="btn btn-primary">Retour</a>
            <p></p>
            <a href="<?=ROOT_PATH?>panier/<?= $article->ID ?>/add" class="btn btn-primary">Ajouter au panier<a>
        </div>
    </div>
<?php
    $titre = "Article Description".$article->Titre;
    $content = ob_get_clean();
?>