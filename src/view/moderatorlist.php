<?php
ob_start();
?>
<header class="heading ">
    <h1 style="text-align: center">List of moderators</h1>
</header>

<table>

    <tr>
        <th>Moderators</th>

    </tr>
    <?php foreach ($moderators as $member): ?>
        <tr>
            <td><?= $member->name ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$contenu = ob_get_clean();
require "layout.php";