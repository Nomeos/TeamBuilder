<?php
ob_start();
?>
    <header class="heading managing">
        <h1 style="text-align: center">WELCOME</h1>
        <a style="text-align: right">Connected as : <?= $_SESSION["actualMemberConnected"]->name ?></a>
    </header>

    <div class="container dashboard">
        <section class="row">

            <div class="column">
                <a class="button managing column" href="index.php?action=MemberList">List of members</a>
            </div>
            <div class="column">
                <a class="button results column" href="index.php?action=MyTeams">My teams</a>
            </div>
            <div class="column">
                <a class="button results column" href="index.php?action=Moderators">Moderators</a>
            </div>
        </section>
    </div>

<?php
$contenu = ob_get_clean();
require "layout.php";

























