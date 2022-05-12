<!-------------------------------- Controller du profil, appel des vues du profil -------------------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Appel des vues
include(dirname(__FILE__).'/../views/templates/template_profile/header.php');
include(dirname(__FILE__).'/../views/user/profile.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
