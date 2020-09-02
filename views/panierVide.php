<?php ob_start() ?>

    <div>
        Votre panier est vide !
    </div>

<?php
    $title = "Le panier est vide";
    $content = ob_get_clean();
?>