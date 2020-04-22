<?php ob_start() ?>
<div class="padding-top100"></div>
<form action="<?=ROOT_PATH.'connexion'?>" method="POST">
    <div class="form-group">
        <label for="idlogin">Login</label>
        <input type="text" class="form-control" id="idlogin" name="login">
    </div>
    <div class="form-group">
        <label for="idpassword">Mot de passe</label>
        <input type="password" class="form-control" id="idpassword" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<?php
    $content = ob_get_clean();
?>