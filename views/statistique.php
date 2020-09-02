<?php ob_start() ?>

    <script type="text/javascript" src="public\js\charts.js"></script>

    <div id="charts"></div>
<?php
    $titre = "Statistique de vente";
    $content = ob_get_clean();
?>