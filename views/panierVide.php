<?php ob_start() ?>

    <div>
        Le panier est vide !
    </div>

<?php
    $title = "Le panier est vide";
    $content = ob_get_clean();
?>