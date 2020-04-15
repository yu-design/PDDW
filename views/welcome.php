<?php ob_start() ?>
Coucou, vous êtes sur la page welcome !
<?php
$titre = "Bienvenue";
$content = ob_get_clean();
include 'includes/template.php';
?>
