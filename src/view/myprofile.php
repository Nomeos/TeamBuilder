<?php
ob_start();
?>
    <header class="heading ">
        <h1 style="text-align: center">My profile : <?= $currentUserConnected->name ?></h1>
    </header>
    <a>Mon nom : <?= $currentUserConnected->name ?> <br></a>
    <a>Mon status : <?= $currentUserStatus->name ?></a> <br>
    <a>Mon rôle : <?= $currentUserRole->name ?></a> <br>

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