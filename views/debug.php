<?php ob_start() ?>

<div class="padding-top100"></div>
Vous voici sur la page débug !

<p>Variable d'objet :</p>
<p><?= $recupUtilisateur->ID ?></p>
<p><?= $recupUtilisateur->Login ?></p>
<p><?= $recupUtilisateur->DateNaissance ?></p>
<p>Variable de session :</p>
<p><?= "Votre id est ".$_SESSION['id']?></p>
<p><?= "Votre Login est ".$_SESSION['login']?></p>
<p><?= "Votre mail est ".$_SESSION['mail']?></p>
<p><?= "Votre password est ".$_SESSION['password']?></p>
<p><?= "Votre role est ".$_SESSION['role']?></p>

<?php
    $titre = "Débugueur de chocolat !";
    $content = ob_get_clean();
?>