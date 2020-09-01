<?php ob_start() ?>

<div class="padding-top100"></div>
Vous pouvez modifier les informations liées à l'article (Tous les champs sont obligatoires).

<form action="<?=ROOT_PATH.'articles/'.$article->ID.'/Modifier'?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="idEAN">EAN :</label>
        <input type="text" class="form-control" id="idEAN" name="EAN" value="<?=$article->EAN?>">
    </div>
    <div class="form-group">
        <label for="idISBN">ISBN :</label>
        <input type="text" class="form-control" id="idISBN" name="ISBN" value="<?=$article->ISBN?>">
    </div>
    <div class="form-group">
        <label for="idtype">Type d'article :</label>
        <select class="form-control" id="idtype" name="typeArticle_ID" value="<?=$typeArticle?>">
            <option value="1">Bande dessinée</option>
            <option value="2">manga</option>
            <option value="3">Comics</option>
            <option value="4">Roman</option>
        </select>
    </div>
    <div class="form-group">
        <label for="idtitre">Titre:</label>
        <input type="text" class="form-control" id="idtitre" name="titre" value="<?=$article->Titre?>">
    </div>
    <div class="form-group">
        <label for="idauteur">Auteur :</label>
        <input type="text" class="form-control" id="idauteur" name="auteur" value="<?=$article->Auteur?>">
    </div>
    <div class="form-group">
        <label for="iddessinateur">Dessinateur :</label>
        <input type="text" class="form-control" id="iddessinateur" name="dessinateur" value="<?=$article->Dessinateur?>">
    </div>
    <div class="form-group">
        <label for="idedition">Edition :</label>
        <input type="text" class="form-control" id="idedition" name="edition" value="<?=$article->Edition?>">
    </div>
    <div class="form-group">
        <label for="idcollection">Collection :</label>
        <input type="text" class="form-control" id="idcollection" name="collection" value="<?=$article->Collection?>">
    </div>
    <div class="form-group">
        <label for="idprix">Prix :</label>
        <input type="text" class="form-control" id="idprix" name="prix" value="<?=$article->Prix?>">
    </div>
    <div class="form-group">
        <label for="iddate">Parution :</label>
        <input type="date" class="form-control" id="iddate" name="date" value="<?=$article->Parution?>">
    </div>
    <div class="form-group">
        <label for="idcouverture">Couverture :</label>
        <img class="card-img-top" src="../../public/images/articles/<?=$article->Image?>" alt="Card image cap" style="width: 16rem;">
        <input type="file" name="couverture" id="idcouverture">
    </div>
    <div>
        <label for="actif">Désactiver l'article</label>
        <input type="checkbox" id="actif" name="actif" >
    </div>
    <button type="submit" class="btn btn-primary">Modifier article</button>
</form>

<?php
    $titre = "Gérer un article".$article->Titre;
    $content = ob_get_clean();
?>