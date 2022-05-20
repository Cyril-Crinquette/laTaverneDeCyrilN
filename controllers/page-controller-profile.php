<!-------------------------------- Controller du profil, appel des vues du profil -------------------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'profile.css';
$pageTitle = 'Profil';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$user = User::getOne($id);
$email= $_SESSION['user']->email;

if ($user instanceof PDOException) {
    $error=$user->getMessage();
}
// Appel des vues
include_once(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/profile.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
