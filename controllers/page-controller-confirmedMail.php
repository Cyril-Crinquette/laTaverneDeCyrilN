<!-------------------------------- Controller de l'envoi du mail, appel des vues de l'envoi du mail -------------------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'confirmedMail.css';
$pageTitle = 'Confirmation d\'envoi';

// Appel des vues
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/confirmedMail.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
