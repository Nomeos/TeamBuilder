<?php

require '../vendor/autoload.php';

session_start();
require 'controller/controller.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        // Affiche la page d'accueil du site
        case 'Home' :
            displayHomepage();
            break;
        // Affiche le formulaire d'inscription
        case 'MemberList' :
            displayMemberlist();
            break;
        // Permet d'afficher la home de base au lancement du site
        default :
            displayHomepage();
    }
} else {
    displayHomepage();
}