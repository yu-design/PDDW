<?php ob_start()?>
<form method="POST">
    <div class="form-group">
        <label for="idlogin">Pseudo</label>
        <input type="text" class="form-control" id="idlogin" name="login">
    </div>
    <div class="form-group">
        <label for="idpassword">Mot de passe</label>
        <input type="password" class="form-control" id="idpassword" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Connecter</button>
</form>
<?php
$title = "Se connecter";
$content = ob_get_clean();
include 'includes/template.php';
?>
