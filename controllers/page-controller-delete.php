<!------------------------------------------------- Controller de suppression ------------------------------------------------------- -->
<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';


if (!empty($_GET)) {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $userDelete = User::delete($id);

    if ($userDelete) {
        SessionFlash::set('La taverne compte désormais un membre de moins');
    }
}

header('location: '.$_SERVER['HTTP_REFERER']);
die;



