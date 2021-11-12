<?php
ob_start();
?>


    <!-- TODO : Changer la manière d'afficher si l'utilisateur est un captiaine ou un membre,
    implémenter le changement de nom et la sauvegarde, je voulais mettre un form et envoyer le nom rentré dans le controller,
    Vérifier si c'est un modérateur ou l'utilisateur pour changer la méthode d'update-->
    <header class="heading ">
        <h1 style="text-align: center">My profile : <?= $currentUserConnected->name ?></h1>
    </header>


    <form action="index.php?action=SaveUser&userid=<?= $currentUserConnected->id ?>">
        <label for="fname">Mon nom :</label>
        <a>Mon status : <?= $currentUserStatus->name ?></a> <br>
        <a>Mon rôle : <?= $currentUserRole->name ?></a> <br>
        <button type="submit">SAVE</button>
    </form>


<?php if ($currentUserteams != []): ?>
    <?php foreach ($currentUserteams as $team): ?>
        <?php if ($team->is_captain == 1): ?>
            <a>Captiaine de: <?= \TeamBuilder\model\entity\Team::find($team->team_id)->name ?></a><br>
        <?php else: ?>
            <a>Membre de: <?= \TeamBuilder\model\entity\Team::find($team->team_id)->name ?></a><br>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <a>Inscrit dans aucune équipe</a>
<?php endif; ?>


<?php
$contenu = ob_get_clean();
require "layout.php";