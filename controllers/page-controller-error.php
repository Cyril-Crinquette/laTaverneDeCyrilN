<!-------------------------- Controller de error, appel des vues de error --------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

$msgError = "Vous n'êtes pas connecté à la base de données";
$error = intval(filter_input(INPUT_GET, 'error', FILTER_SANITIZE_NUMBER_INT));
// switch ($error) {
//     case 1:
//         $msgError = "Vous n'êtes pas connecté à la base de données";
//         break;
//     default:
//         # code...
//         break;
// }

include(dirname(__FILE__).'/../views/templates/template_error/header.php');
include(dirname(__FILE__).'/../views/error.php');
include(dirname(__FILE__).'/../views/templates/footer.php');