<!-------------------------- Controller du message de contact, appel des vues du message de contact --------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Appel des vues
include(dirname(__FILE__).'/../views/templates/template_messageContact/header.php');
include(dirname(__FILE__).'/../views/user/messageContact.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
