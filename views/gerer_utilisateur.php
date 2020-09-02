<?php ob_start() ?>

<div class="padding-top100"></div>
Veuillez entrer vos coordonnées (Les champs avec une <span class="colorRed">*</span> sont obligatoires).
    <form action="<?=ROOT_PATH.'utilisateurs/'.$utilisateur->ID.'/Modifier'?>" method="POST">
        <div class="form-group">
            <label for="idlogin">Login <span class="colorRed">*</span> :</label>
            <input type="text" class="form-control"  id="idlogin" placeholder="<?=$utilisateur->Login?>" value="<?=$utilisateur->Login?>" name="login">
        </div>
        <div class="form-group">
            <label for="idprenom">Prénom :</label>
            <input type="text" class="form-control"  id="idprenom" placeholder="<?=$utilisateur->Prenom?>" value="<?=$utilisateur->Prenom?>" name="prenom">
        </div>
        <div class="form-group">
            <label for="idnom">Nom :</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$utilisateur->Nom?>" value="<?=$utilisateur->Nom?>" name="nom">
        </div>
        <div class="form-group">
            <label for="idnom">Pseudo :</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$utilisateur->Pseudo?>" value="<?=$utilisateur->Pseudo?>" name="pseudo">
        </div>
        <div class="form-group">
            <label for="idemail">Email <span class="colorRed">*</span> :</label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" placeholder="<?=$utilisateur->AdresseMail?>" value="<?=$utilisateur->AdresseMail?>" name="email">
        </div>
        <div class="form-group">
            <label for="idpassword">Modifier votre mot de passe :</label>
            <input type="password" class="form-control" id="idpassword" name="password">
        </div>
        <div class="form-group">
            <label for="idconfirmpassword">Confirmer nouveau mot de password :</label>
            <input type="password" class="form-control" id="idconfirmpassword" name="confirm_password">
        </div>
        <?php if($_SESSION['role']!=3): ?>
            <div class="form-group">
                <label for="idanniversaire">Date de naissance :</label>
                <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$utilisateur->DateNaissance?>">
            </div>
        <?php else:?>
            <?php if(empty($utilisateur->DateNaissance)): ?>
                <div class="form-group">
                    <label for="idanniversaire">Date de naissance :</label>
                    <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$utilisateur->DateNaissance?>">
                </div>
            <?php else: ?>
                <div class="form-group">
                    <label for="idanniversaire">Date de naissance :</label>
                    <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$utilisateur->DateNaissance?>" readonly>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="form-group">
            <label for="idadresse">Adresse :</label>
            <input type="text" class="form-control" id="idprenom" name="adresse" value="<?=$utilisateur->Adresse?>">
        </div>
        <div class="form-group">
            <label for="idcp">Code postal :</label>
            <input type="text" class="form-control" id="idcp" name="cp" value="<?=$utilisateur->CP?>">
        </div>
        <div class="form-group">
            <label for="idville">Ville :</label>
            <input type="text" class="form-control" id="idville" name="ville" value="<?=$utilisateur->Ville?>">
        </div>
        <div class="form-group">
            <label for="idnumtel">Numéro de téléphone :</label>
            <input type="" class="form-control" id="idnumtel" name="numtel" value="<?=$utilisateur->NumTelephone?>">
        </div>
        <?php if($_SESSION['role']==1): ?>
            <div class="form-group">
                <label for="idrole">Type de compte :</label>
                <select class="form-control" id="idrole" name="role">
                    <?php if($utilisateur->RoleUtilisateur_ID == 2): ?>
                    <option value="2">Vendeur</option>
                    <option value="3">Client</option>
                    <?php elseif($utilisateur->RoleUtilisateur_ID == 3): ?>
                    <option value="3">Client</option>
                    <option value="2">Vendeur</option>
                    <?php endif?>
                </select>
            </div>
        <?php endif; ?>
        <?php if($utilisateur->RoleUtilisateur_ID!=1): ?>
            <div>
                <label for="actif">Désactiver le compte</label>
                <input type="checkbox" id="actif" name="actif" >
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>


<?php
    $titre = "Modifier le profil de l'utilisateur";
    $content = ob_get_clean();
    ob_end_flush();
?>