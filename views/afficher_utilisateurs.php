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
                    <?php foreach($utilisateurs as $utilisateur){ ?>
                        <tr>
                            <td><?= $utilisateur->ID?></td>
                            <td><?= $utilisateur->Login?></td>
                            <td><?= $utilisateur->Nom?></td>
                            <td><?= $utilisateur->Prenom?></td>
                            <td><?= $utilisateur->AdresseMail?></td>
                            <td>
                                <?php if($_SESSION['role'] == 2): ?><a href="<?=ROOT_PATH.'utilisateurs/'.$utilisateur->ID.'/Modifier'?>" class="btn btn-primary" <?php if($utilisateur->RoleUtilisateur_ID != 3){ echo "hidden";} ?> >Editer</a>
                                <?php elseif($_SESSION['role'] == 1): ?><a href="<?=ROOT_PATH.'utilisateurs/'.$utilisateur->ID.'/Modifier'?>" class="btn btn-primary" <?php if($utilisateur->RoleUtilisateur_ID == 1){ echo "hidden";} ?> >Editer</a>
                                <?php endif?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>
</main>
<?php
    $titre = "Gérer client";
    $content = ob_get_clean();
?>


<!--
Essai de pagination pour afficher les utilisateurs (je ne désespère pas de la faire fonctionner pour un prochain projet :)
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
-->
