<?php ob_start(); ?>
<main class="container">
    <div class="row">
        <section class="col-12">
            <table class="table" >
                <thead>
                    <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Prix</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach($articles as $article):?>
                <tr>
                    <th scope="row"><?= $article->Titre ?></th>
                    <td><?= $article->Prix ?></td>
                    <td>
                        <div class="container">
                            <div class="row">
                            <div class="col">
                                <a href="<?= ROOT_PATH.'article/'.$article->ID ?>" class="btn btn-primary">Voir le détail</a>
                                <a href="<?=ROOT_PATH.'panier/'.$article->ID."/supprimer"?>" class="btn btn-danger">Supprimer</a>
                            </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
                </tbody>
            </table>

            <div class="container">
            <div class="row">
                <div class="col-6"> Total de votre panier : <?= $_SESSION['totalPanier']?>€ </div>
                    <div class="col-6">
                        <a href="<?=ROOT_PATH?>vente//validerPanier" class="btn btn-primary">Valider le panier</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>





<?php
    $title="Detail du panier";
    $content= ob_get_clean();
?>