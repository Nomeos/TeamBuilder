<?php
ob_start();
?>
    <header class="heading ">
        <h1 style="text-align: center">My teams</h1>
    </header>

    <table>

        <tr>
            <th>Team name</th>
            <th>Number of members</th>
            <th>Capitaine</th>
        </tr>
        <?php foreach ($myTeams as $team): ?>
            <tr>
                <td><?= $team->name ?></td>
                <td><?= sizeof($team->members())?></td>
                <td><?= $team->getCapitain()->name ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
$contenu = ob_get_clean();
require "layout.php";