<?php ob_start() ?>

<main class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des utilisateurs</h1>
            <table class="table">
                <thead>
                    <td>ID</td>
                    <td>Identifiant</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Adresse mail</td>
                    <td>Edition</td>
                </thead>
                <tbody>
                    <?php foreach($utilisateur as $utilisateur){ ?>
                        <tr>
                            <td><?= $utilisateur->ID?></td>
                            <td><?= $utilisateur->Login?></td>
                            <td><?= $utilisateur->Nom?></td>
                            <td><?= $utilisateur->Prenom?></td>
                            <td><?= $utilisateur->AdresseMail?></td>
                            <td><a href="<?=ROOT_PATH?>afficher_utilisateur">
                                    <?php if(($_SESSION['role'] == 2) && (($utilisateur->RoleUtilisateur == 3)||($_SESSION['login']))): ?>Editer        <!--Vendeur-->
                                    <?php elseif(($_SESSION['role'] == 1) && (($utilisateur->RoleUtilisateur != 1)||($_SESSION['login']))): ?>Editer    <!--Admin-->
                                    <?php endif ?>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
        </section>
    </div>
</main>
<?php
    $titre = "Gérer client";
    $content = ob_get_clean();
?>