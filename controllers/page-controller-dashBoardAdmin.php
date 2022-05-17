<!-------------------------------- Controller du dash board, appel des vues du dash board -------------------------------- -->
<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'dashBoardAdmin.css';
$pageTitle = 'Dash board';

$usersList = User::getAll();
// $usersList = User::getAll($search);

// Appel des vues
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/dashBoardAdmin.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
