<?php ob_start() ?>

<div class="padding-top100"></div>
Veuillez entrer vos coordonnées (Tous les champs sont obligatoires).
<?php if($user['RoleUtilisateur_ID']==3): //Client ?>
    <form action="<?=ROOT_PATH.'modifUtilisateur'?>" method="POST">
        <div class="form-group">
            <label for="idlogin">Login:</label>
            <input type="text" class="form-control"  id="idlogin" placeholder="<?=$user['Login']?>" value="<?=$user['Login']?>" name="login" readonly>
        </div>
        <div class="form-group">
            <label for="idprenom">Prenom:</label>
            <input type="text" class="form-control"  id="idprenom" placeholder="<?=$user['Prenom']?>" value="<?=$user['Prenom']?>" name="prenom" readonly>
        </div>
        <div class="form-group">
            <label for="idnom">Nom:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$user['Nom']?>" value="<?=$user['Nom']?>" name="nom" readonly>
        </div>
        <div class="form-group">
            <label for="idnom">Pseudo:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$user['Nom']?>" value="<?=$user['Pseudo']?>" name="pseudo">
        </div>
        <div class="form-group">
            <label for="idemail">Email:</label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" placeholder="<?=$user['AdresseMail']?>" value="<?=$user['AdresseMail']?>" name="email">
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
            <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$user['DateNaissance']?>">
        </div>
        <div class="form-group">
            <label for="idadresse">Adresse:</label>
            <input type="text" class="form-control" id="idprenom" name="adresse" value="<?=$user['Adresse']?>">
        </div>
        <div class="form-group">
            <label for="idcp">Code postal:</label>
            <input type="text" class="form-control" id="idcp" name="cp" value="<?=$user['CP']?>">
        </div>
        <div class="form-group">
            <label for="idville">Ville:</label>
            <input type="text" class="form-control" id="idville" name="ville" value="<?=$user['Ville']?>">
        </div>
        <div class="form-group">
            <label for="idnumtel">Numéro de téléphone:</label>
            <input type="" class="form-control" id="idnumtel" name="numtel" value="<?=$user['NumTelephone']?>">
        </div>
        <div>
            <label for="actif">Désactiver le compte</label>    
            <input type="checkbox" id="actif" name="actif" value="<?=$user['Actif']?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
<?php endif; ?>
<?php if($user['RoleUtilisateur_ID']==2): //Vendeur ?>
    <form action="<?=ROOT_PATH.'modifUtilisateur'?>" method="POST">
        <div class="form-group">
            <label for="idlogin">Login:</label>
            <input type="text" class="form-control"  id="idlogin" placeholder="<?=$user['Login']?>" value="<?=$user['Login']?>" name="login">
        </div>
        <div class="form-group">
            <label for="idprenom">Prenom:</label>
            <input type="text" class="form-control"  id="idprenom" placeholder="<?=$user['Prenom']?>" value="<?=$user['Prenom']?>" name="prenom">
        </div>
        <div class="form-group">
            <label for="idnom">Nom:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$user['Nom']?>" value="<?=$user['Nom']?>" name="nom">
        </div>
        <div class="form-group">
            <label for="idnom">Pseudo:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$user['Nom']?>" value="<?=$user['Pseudo']?>" name="pseudo">
        </div>
        <div class="form-group">
            <label for="idemail">Email:</label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" placeholder="<?=$user['AdresseMail']?>" value="<?=$user['AdresseMail']?>" name="email">
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
            <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$user['DateNaissance']?>">
        </div>
        <div class="form-group">
            <label for="idadresse">Adresse:</label>
            <input type="text" class="form-control" id="idprenom" name="adresse" value="<?=$user['Adresse']?>">
        </div>
        <div class="form-group">
            <label for="idcp">Code postal:</label>
            <input type="text" class="form-control" id="idcp" name="cp" value="<?=$user['CP']?>">
        </div>
        <div class="form-group">
            <label for="idville">Ville:</label>
            <input type="text" class="form-control" id="idville" name="ville" value="<?=$user['Ville']?>">
        </div>
        <div class="form-group">
            <label for="idnumtel">Numéro de téléphone:</label>
            <input type="" class="form-control" id="idnumtel" name="numtel" value="<?=$user['NumTelephone']?>">
        </div>
        <div>
            <label for="actif">Désactiver le compte</label>
            <input type="checkbox" id="actif" name="actif" value="<?=$user['NumTelephone']?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
<?php endif; ?>
<?php if($user['RoleUtilisateur_ID']==1): //Admin ?>
    <form action="<?=ROOT_PATH.'modifUtilisateur'?>" method="POST">
        <div class="form-group">
            <label for="idlogin">Login:</label>
            <input type="text" class="form-control"  id="idlogin" placeholder="<?=$user['Login']?>" value="<?=$user['Login']?>" name="login">
        </div>
        <div class="form-group">
            <label for="idprenom">Prenom:</label>
            <input type="text" class="form-control"  id="idprenom" placeholder="<?=$user['Prenom']?>" value="<?=$user['Prenom']?>" name="prenom">
        </div>
        <div class="form-group">
            <label for="idnom">Nom:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$user['Nom']?>" value="<?=$user['Nom']?>" name="nom">
        </div>
        <div class="form-group">
            <label for="idnom">Pseudo:</label>
            <input type="text" class="form-control"  id="idnom" placeholder="<?=$user['Nom']?>" value="<?=$user['Pseudo']?>" name="pseudo">
        </div>
        <div class="form-group">
            <label for="idemail">Email:</label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="idemail" placeholder="<?=$user['AdresseMail']?>" value="<?=$user['AdresseMail']?>" name="email">
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
            <input type="date" class="form-control" id="idanniversaire" name="anniversaire" value="<?=$user['DateNaissance']?>">
        </div>
        <div class="form-group">
            <label for="idadresse">Adresse:</label>
            <input type="text" class="form-control" id="idprenom" name="adresse" value="<?=$user['Adresse']?>">
        </div>
        <div class="form-group">
            <label for="idcp">Code postal:</label>
            <input type="text" class="form-control" id="idcp" name="cp" value="<?=$user['CP']?>">
        </div>
        <div class="form-group">
            <label for="idville">Ville:</label>
            <input type="text" class="form-control" id="idville" name="ville" value="<?=$user['Ville']?>">
        </div>
        <div class="form-group">
            <label for="idnumtel">Numéro de téléphone:</label>
            <input type="" class="form-control" id="idnumtel" name="numtel" value="<?=$user['NumTelephone']?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
<?php endif; ?>

<?php
    $titre = "S'enregistrer";
    $content = ob_get_clean();
?>