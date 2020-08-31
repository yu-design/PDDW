<?php ob_start() ?>

<main class="container">
    <div class="row">
        <section class="col-12">
            <h1>Articles</h1>
            <table class="table">
                <thead>
                    <td>ID</td>
                    <td>EAN</td>
                    <td>ISBN</td>
                    <td>Titre</td>
                    <td>Type</td>
                    <td>Auteur</td>
                    <td>Dessinateur</td>
                    <td>Edition</td>
                    <td>Collection</td>
                    <td>Prix</td>
                    <td>Parution</td>
                    <td>Actif</td>
                </thead>
                <tbody>
                    <?php foreach($articles as $article){ ?>
                        <tr>
                            <td><?= $article->ID?></td>
                            <td><?= $article->EAN?></td>
                            <td><?= $article->ISBN?></td>
                            <td><?= $article->Titre?></td>
                            <td><?= $article->TypeArticle_ID?></td>
                            <td><?= $article->Auteur?></td>
                            <td><?= $article->Dessinateur?></td>
                            <td><?= $article->Edition?></td>
                            <td><?= $article->Collection?></td>
                            <td><?= $article->Prix?></td>
                            <td><?= $article->Parution?></td>
                            <td><?= $article->Actif?></td>
                            <td>
                            <form action="<?=ROOT_PATH.'afficher_article'?>" method="POST">
                                <input type="text" class="form-control" value="<?=$article->ID?>" name="ID" hidden>
                                <button type="submit" class="btn btn-primary">Editer</button>
                            </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--
            <div class="center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item <?= ($pageCourrante == 1)? "disabled" : "" ?>">
                            <a href="./?page=1" class="page-link"> << Première</a>
                        </li>
                        <li class="page-item <?= ($pageCourrante == 1)? "disabled" : "" ?>">
                            <a href="./?page=<?= $pageCourrante-- ?>" class="page-link"> < Précédente</a>
                        </li>
                        <?php for($page=1;$page<= $pages; $page++): ?>
                            <li class="page-item <?= ($pageCourrante == $pages)? "active" : "" ?>">
                                <a href="./?page=<?= $page ?>" class="page-link"><?= $page?></a>
                            </li>
                        <?php endfor ?>
                        <li class="page-item <?= ($pageCourrante == $pages)? "disabled" : "" ?>">
                            <a href="./?page=<?= $pageCourrante++ ?>" class="page-link">Suivante ></a>
                        </li>
                        <li class="page-item <?= ($pageCourrante == $pages)? "disabled" : "" ?>">
                            <a href="./?page=<?= $pages ?>" class="page-link">Dernière >></a>
                        </li>
                    </ul>
                </nav>
            </div>
            -->
            <a href="<?=ROOT_PATH.'Ajouter_article'?>" class='btn btn-primary'>Ajouter un nouvel article</a>
        </section>
    </div>
</main>

<?php
    $titre = "Articles";
    $content = ob_get_clean();
?>