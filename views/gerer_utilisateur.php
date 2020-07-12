<?php ob_start(); ?>

<table>
    <thead>
            <tr>
                <th>Pseudo</th>
            </tr>  
    </thead>
    <tbody>
            <?php foreach($utilisateur as $user): ?>
                <tr>
                    <td><?= $user->Pseudo ?></td>
                </tr>
            <?php endforeach;?>
    </tbody>
</table>

<?php
    $titre = "Gérer utilisateur";
    $content = ob_get_clean();
?>