<?php ob_start() ?>

<div class="padding-top100"></div>
Veuillez entrer les informations liées au nouvel article (Tous les champs sont obligatoires).

<form action="<?=ROOT_PATH.'ajouter_article'?>" method="POST">
    <div class="form-group">
        <label for="idEAN">EAN :</label>
        <input type="text" class="form-control" id="idEAN" name="EAN" value=<?=$article->EAN?>>
    </div>
    <div class="form-group">
        <label for="idISBN">ISBN :</label>
        <input type="text" class="form-control" id="idISBN" name="ISBN" value=<?=$article->ISBN?>>
    </div>
    <div class="form-group">
        <label for="idtype">Type d'article :</label>
        <select class="form-control" id="idtype" name="typeArticle_ID" value="<?=$article->typeArticle_ID?>">
            <option value="1">Bande dessinée</option>
            <option value="2">manga</option>
            <option value="3">Comics</option>
            <option value="4">Roman</option>
        </select>
    </div>
    <div class="form-group">
        <label for="idtitre">Titre:</label>
        <input type="text" class="form-control" id="idtitre" name="titre" value=<?=$article->Titre?>>
    </div>
    <div class="form-group">
        <label for="idauteur">Auteur :</label>
        <input type="text" class="form-control" id="idauteur" name="auteur" value=<?=$article->Auteur?>>
    </div>
    <div class="form-group">
        <label for="iddessinateur">Dessinateur :</label>
        <input type="text" class="form-control" id="iddessinateur" name="dessinateur" value=<?=$article->Dessinateur?>>
    </div>
    <div class="form-group">
        <label for="idedition">Edition :</label>
        <input type="text" class="form-control" id="idedition" name="edition" value=<?=$article->Edition?>>
    </div>
    <div class="form-group">
        <label for="idcollection">Collection :</label>
        <input type="text" class="form-control" id="idcollection" name="collection" value=<?=$article->Collection?>>
    </div>
    <div class="form-group">
        <label for="idprix">Prix :</label>
        <input type="text" class="form-control" id="idprix" name="prix" value=<?=$article->Prix?>>
    </div>
    <div class="form-group">
        <label for="iddate">Parution :</label>
        <input type="date" class="form-control" id="iddate" name="date" value=<?=$article->Parution?>>
    </div>
    <div class="form-group">
        <label for="idcouverture">Couverture :</label>
        <input type="file" name="couverture" id="idcouverture" value="<?= ROOT_PATH.'/public/images/articles/manga'.?>">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter article</button>
</form>

<?php
    $titre = "Gérer un article".$article->Titre;
    $content = ob_get_clean();
?>