<!-------------------------------- Controller du profil, appel des vues du profil -------------------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Fichier permettant d'afficher les messages de sessionFlash
require_once(dirname(__FILE__).'/../helpers/sessionFlash.php');

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

$email= intval(filter_input(INPUT_GET,'email',FILTER_SANITIZE_SPECIAL_CHARS));
    $user = User::getByEmail($email);
    if ($patient instanceof PDOException) {
        $error=$user->getMessage();
    }

// Appel des vues
include(dirname(__FILE__).'/../views/templates/template_profile/header.php');
include(dirname(__FILE__).'/../views/user/profile.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
