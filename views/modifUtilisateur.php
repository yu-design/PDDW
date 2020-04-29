<?php ob_start() ?>

<div class="padding-top100"></div>
Veuillez entrer vos coordonnées (Tous les champs sont obligatoires).

<form action="<?=ROOT_PATH.'enregistrer'?>" method="POST">
    <p>Login</p>
    <?=$user['Login']?>
    <p>Nom: </p>
    <?=$user['Nom']?>
    <p>Prenom: </p>
    <?=$user['Prenom']?>
    <div class="form-group">
        <label for="idemail">Email:</label>
        <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" placeholder="<?=$user['AdresseMail']?>" value="<?=$user['AdresseMail']?>" name="email">
    </div>
    <div class="form-group">
        <label for="idpassword">Modifier votre mot de passe:</label>
        <input type="password" class="form-control" id="idpassword" name="password">
    </div>
    <div class="form-group">
        <label for="idconfirmpassword">Confirmer nouveau mot de password:</label>
        <input type="password" class="form-control" id="idconfirmpassword" name="confirm_password">
    </div>
    <div class="form-group">
        <label for="idanniversaire">Date de naissance:</label>
        <input type="date" class="form-control" id="idanniversaire" name="anniversaire">
    </div>
    <div class="form-group">
        <label for="idadresse">Adresse:</label>
        <input type="text" class="form-control" id="idprenom" name="adresse">
    </div>
    <div class="form-group">
        <label for="idcp">Code postal:</label>
        <input type="text" class="form-control" id="idcp" name="cp">
    </div>
    <div class="form-group">
        <label for="idville">Ville:</label>
        <input type="text" class="form-control" id="idville" name="ville">
    </div>
    <div class="form-group">
        <label for="idnumtel">Numéro de téléphone:</label>
        <input type="text" class="form-control" id="idnumtel" name="numtel">
    </div>
    <button type="submit" class="btn btn-primary">s'inscrire</button>
</form>


<?php
    $titre = "S'enregistrer";
    $content = ob_get_clean();
?>