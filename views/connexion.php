<?php ob_start() ?>

<form action="<?=ROOT_PATH.'connexion'?>" method="POST">
    <div class="form-group">
        <label for="idlogin">Login</label>
        <input type="text" class="form-control" id="idlogin" name="login">
    </div>
    <div class="form-group">
        <label for="idpassword">Mot de passe</label>
        <input type="password" class="form-control" id="idpassword" name="Mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<?php
    $titre = "Se connecter";
    $content = ob_get_clean();
?>