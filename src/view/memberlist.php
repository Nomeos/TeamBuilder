<?php
ob_start();
?>
<header class="heading ">
    <h1 style="text-align: center">List of students</h1>
</header>

<table>

    <tr>
        <th>Students</th>
        <th>Teams</th>
    </tr>
    <?php foreach ($allMembers as $member): ?>
        <tr>
            <?php if($currentUserConnected->role_id === 2) : ?>
            <td ><a href="index.php?action=UserProfil&userid=<?= $member->id ?>">  <?=$member->name ?></a></td>
            <?php else :?>
            <td ><a>  <?=$member->name ?></a></td>
            <?php endif;?>
            <td>
                <?=
                implode(',', array_map(function ($team) {
                        return "<a href='#'>" . $team->name . "</a>";
                    }
                        , $member->teams()
                    )
                )
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$contenu = ob_get_clean();
require "layout.php";