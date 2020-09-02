<?php ob_start() ?>

<div class="padding-top100"></div>
Veuillez entrer vos coordonnées (Tous les champs sont obligatoires).

<form action="<?=ROOT_PATH.'nouveau_utilisateur'?>" method="POST">
    <div class="form-group">
        <label for="idlogin">Login:</label>
        <input type="text" class="form-control" id="idlogin" name="login">
    </div>
    <div class="form-group">
        <label for="idemail">Email:</label>
        <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" name="email">
    </div>
    <div class="form-group">
        <label for="idpassword">Password:</label>
        <input type="password" class="form-control" id="idpassword" name="password">
    </div>
    <div class="form-group">
        <label for="idconfirmpassword">Confirm password:</label>
        <input type="password" class="form-control" id="idconfirmpassword" name="confirm_password">
    </div>
    <div class="form-group">
        <label for="idnom">Nom:</label>
        <input type="text" class="form-control" id="idnom" name="nom">
    </div>
    <div class="form-group">
        <label for="idprenom">Prénom:</label>
        <input type="text" class="form-control" id="idprenom" name="prenom">
    </div>
    <button type="submit" class="btn btn-primary">s'inscrire</button>
</form>


<?php
    $titre = "S'enregistrer";
    $content = ob_get_clean();
?>