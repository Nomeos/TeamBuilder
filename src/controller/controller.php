<?php

use TeamBuilder\model\entity\Member;

/**
 * @Name = displayHome();
 * @Do = Affiche la page home du site, celle qui sera affiché de base quand on rentre sur le site
 */


function displayHomepage()
{
    $_SESSION["actualMemberConnected"] = Member::find(AUTOLOGINID);
    require "view/homepage.php";
}

function displayMemberList(){
    $allMembers = Member::all();
    require "view/memberlist.php";
}

function displayMyTeamList(){
    $myTeams =  $_SESSION["actualMemberConnected"]->teams();
    require "view/myteam.php";
}

function displayModeratorList(){
    $moderators = $_SESSION["actualMemberConnected"]->moderators();
    require "view/moderatorlist.php";
}

