<?php ob_start() ?>

<main class="container">
    <div class="row">
        <section class="col-12">
            <h1>Articles</h1>
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
            <div class="d-flex justify-content-around flex-wrap">
                <?php foreach($articles as $article): ?>
                <div class="card" style="width: 16rem;">
                    <img class="card-img-top" src="public/images/articles/<?= $article->Image?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->Titre ?></h5>
                        <p class="card-text">
                            Auteur : <?= $article->Auteur ?><br/>
                            Prix : <?= $article->Prix ?>
                        </p>
                        <!--
                        <form action="<?= ROOT_PATH.'articles'?>" method="POST">
                            <input type="text" class="form-control" value="<?=$article->ID?>" name="IDArticle" hidden>
                            <button type="submit" class="btn btn-primary">Afficher</button>
                        </form>
                        -->
                        <a href="<?= ROOT_PATH ?>articles/<?=$article->ID?>" class="btn btn-primary">Afficher<a>
                        <br/><br/>
                        <!--
                        <form action="<?= ROOT_PATH.'articles'?>" method="POST">
                            <input type="text" class="form-control" value="<?=$article->ID?>" name="panier" hidden>
                            <button type="submit" class="btn btn-primary">Ajouter au pannier</button>
                        </form>-->
                        <a href="<?= ROOT_PATH ?>panier/<?= $article->id ?>/ajouter" class="btn btn-primary">Ajouter au panier<a>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </section>
    </div>
</main>

<?php
    $titre = "Articles";
    $content = ob_get_clean();
?>