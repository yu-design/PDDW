<?php ob_start() ?>.
<div class="background-header404"></div>
Désolé, la page <b><?=$_SERVER['REQUEST_URI']?></b> n'existe pas...
<?php
$titre = '404';
$content = ob_get_clean();
include 'includes/template.php';
?>