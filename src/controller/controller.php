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

