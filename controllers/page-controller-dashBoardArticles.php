<!-------------------------------- Controller du dash board articles, appel des vues du dash board articles -------------------------------- -->
<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'dashBoardAdmin.css';
$pageTitle = 'Dash board articles';

$articlesList = User::getAll();
// $usersList = User::getAll($search);

$email= $_SESSION['user']->email;
$user = User::getByEmail($email);

if($user->id_roles != 1) { 
    header('location: /bienvenue');
    exit;
}

// Appel des vues
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/dashBoardArticles.php');
include(dirname(__FILE__).'/../views/templates/footer.php');