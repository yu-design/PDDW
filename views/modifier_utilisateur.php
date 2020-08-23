<?php ob_start() ?>

<div class="padding-top100"></div>
Veuillez entrer vos coordonnées (Tous les champs sont obligatoires).
<?php if($Utilisateur->RoleUtilisateur_ID==3): //Client ?>
    <form action="<?=ROOT_PATH.'modifUtilisateur'?>" method="POST">
        <div class="form-group">
            <label for="idlogin">Login:</label>
            <input type="text" class="form-control"  id="idlogin" placeholder="<?=$Utilisateur->Login?>" value="<?=$Utilisateur->Login?>" name="login" readonly>
        </div>
        <div class="form-group">
            <label for="idprenom">Prenom:</label>
            <input type="text" class="form-control"  id="idprenom" placeholder="<?=$Utilisateur->Prenom?>" value="<?=$Utilisateur->Prenom?>" name="prenom" readonly>
        </div>
        <div class="form-group">
            <label for="idnom">Nom:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$Utilisateur->Nom?>" value="<?=$Utilisateur->Nom?>" name="nom" readonly>
        </div>
        <div class="form-group">
            <label for="idnom">Pseudo:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$Utilisateur->Nom?>" value="<?=$Utilisateur->Pseudo?>" name="pseudo">
        </div>
        <div class="form-group">
            <label for="idemail">Email:</label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" placeholder="<?=$Utilisateur->AdresseMail?>" value="<?=$Utilisateur->AdresseMail?>" name="email">
        </div>
        <div class="form-group">
            <label for="idpassword">Modifier votre mot de passe:</label>
            <input type="password" class="form-control" id="idpassword" name="password">
        </div>
        <div class="form-group">
            <label for="idconfirmpassword">Confirmer nouveau mot de password:</label>
            <input type="password" class="form-control" id="idconfirmpassword" name="confirm_password">
        </div>
        <div class="form-group">
            <label for="idanniversaire">Date de naissance:</label>
            <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$Utilisateur->DateNaissance?>">
        </div>
        <div class="form-group">
            <label for="idadresse">Adresse:</label>
            <input type="text" class="form-control" id="idprenom" name="adresse" value="<?=$Utilisateur->Adresse?>">
        </div>
        <div class="form-group">
            <label for="idcp">Code postal:</label>
            <input type="text" class="form-control" id="idcp" name="cp" value="<?=$Utilisateur->CP?>">
        </div>
        <div class="form-group">
            <label for="idville">Ville:</label>
            <input type="text" class="form-control" id="idville" name="ville" value="<?=$Utilisateur->Ville?>">
        </div>
        <div class="form-group">
            <label for="idnumtel">Numéro de téléphone:</label>
            <input type="" class="form-control" id="idnumtel" name="numtel" value="<?=$Utilisateur->NumTelephone?>">
        </div>
        <div>
            <label for="actif">Désactiver le compte</label>    
            <input type="checkbox" id="actif" name="actif" value="<?=$Utilisateur->Actif?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
<?php endif; ?>
<?php if($Utilisateur->RoleUtilisateur_ID==2): //Vendeur ?>
    <form action="<?=ROOT_PATH.'modifUtilisateur'?>" method="POST">
        <div class="form-group">
            <label for="idlogin">Login:</label>
            <input type="text" class="form-control"  id="idlogin" placeholder="<?=$Utilisateur->Login?>" value="<?=$Utilisateur->Login?>" name="login">
        </div>
        <div class="form-group">
            <label for="idprenom">Prenom:</label>
            <input type="text" class="form-control"  id="idprenom" placeholder="<?=$Utilisateur->Prenom?>" value="<?=$Utilisateur->Prenom?>" name="prenom">
        </div>
        <div class="form-group">
            <label for="idnom">Nom:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$Utilisateur->Nom?>" value="<?=$Utilisateur->Nom?>" name="nom">
        </div>
        <div class="form-group">
            <label for="idnom">Pseudo:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$Utilisateur->Nom?>" value="<?=$Utilisateur->Pseudo?>" name="pseudo">
        </div>
        <div class="form-group">
            <label for="idemail">Email:</label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" placeholder="<?=$Utilisateur->AdresseMail?>" value="<?=$Utilisateur->AdresseMail?>" name="email">
        </div>
        <div class="form-group">
            <label for="idpassword">Modifier votre mot de passe:</label>
            <input type="password" class="form-control" id="idpassword" name="password">
        </div>
        <div class="form-group">
            <label for="idconfirmpassword">Confirmer nouveau mot de password:</label>
            <input type="password" class="form-control" id="idconfirmpassword" name="confirm_password">
        </div>
        <div class="form-group">
            <label for="idanniversaire">Date de naissance:</label>
            <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$Utilisateur->DateNaissance?>">
        </div>
        <div class="form-group">
            <label for="idadresse">Adresse:</label>
            <input type="text" class="form-control" id="idprenom" name="adresse" value="<?=$Utilisateur->Adresse?>">
        </div>
        <div class="form-group">
            <label for="idcp">Code postal:</label>
            <input type="text" class="form-control" id="idcp" name="cp" value="<?=$Utilisateur->CP?>">
        </div>
        <div class="form-group">
            <label for="idville">Ville:</label>
            <input type="text" class="form-control" id="idville" name="ville" value="<?=$Utilisateur->Ville?>">
        </div>
        <div class="form-group">
            <label for="idnumtel">Numéro de téléphone:</label>
            <input type="" class="form-control" id="idnumtel" name="numtel" value="<?=$Utilisateur->NumTelephone?>">
        </div>
        <div>
            <label for="actif">Désactiver le compte</label>
            <input type="checkbox" id="actif" name="actif" value="<?=$Utilisateur->NumTelephone?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
<?php endif; ?>
<?php if($Utilisateur->RoleUtilisateur_ID==1): //Admin ?>
    <form action="<?=ROOT_PATH.'modifUtilisateur'?>" method="POST">
        <div class="form-group">
            <label for="idlogin">Login:</label>
            <input type="text" class="form-control"  id="idlogin" placeholder="<?=$Utilisateur->Login?>" value="<?=$Utilisateur->Login?>" name="login">
        </div>
        <div class="form-group">
            <label for="idprenom">Prenom:</label>
            <input type="text" class="form-control"  id="idprenom" placeholder="<?=$Utilisateur->Prenom?>" value="<?=$Utilisateur->Prenom?>" name="prenom">
        </div>
        <div class="form-group">
            <label for="idnom">Nom:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$Utilisateur->Nom?>" value="<?=$Utilisateur->Nom?>" name="nom">
        </div>
        <div class="form-group">
            <label for="idnom">Pseudo:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$Utilisateur->Nom?>" value="<?=$Utilisateur->Pseudo?>" name="pseudo">
        </div>
        <div class="form-group">
            <label for="idemail">Email:</label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" placeholder="<?=$Utilisateur->AdresseMail?>" value="<?=$Utilisateur->AdresseMail?>" name="email">
        </div>
        <div class="form-group">
            <label for="idpassword">Modifier votre mot de passe:</label>
            <input type="password" class="form-control" id="idpassword" name="password">
        </div>
        <div class="form-group">
            <label for="idconfirmpassword">Confirmer nouveau mot de password:</label>
            <input type="password" class="form-control" id="idconfirmpassword" name="confirm_password">
        </div>
        <div class="form-group">
            <label for="idanniversaire">Date de naissance:</label>
            <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$Utilisateur->DateNaissance?>">
        </div>
        <div class="form-group">
            <label for="idadresse">Adresse:</label>
            <input type="text" class="form-control" id="idprenom" name="adresse" value="<?=$Utilisateur->Adresse?>">
        </div>
        <div class="form-group">
            <label for="idcp">Code postal:</label>
            <input type="text" class="form-control" id="idcp" name="cp" value="<?=$Utilisateur->CP?>">
        </div>
        <div class="form-group">
            <label for="idville">Ville:</label>
            <input type="text" class="form-control" id="idville" name="ville" value="<?=$Utilisateur->Ville?>">
        </div>
        <div class="form-group">
            <label for="idnumtel">Numéro de téléphone:</label>
            <input type="" class="form-control" id="idnumtel" name="numtel" value="<?=$Utilisateur->NumTelephone?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
<?php endif; ?>

<?php
    $titre = "S'enregistrer";
    $content = ob_get_clean();
?>