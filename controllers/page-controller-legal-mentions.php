<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données, etc...
require_once dirname(__FILE__) . '/../utils/init.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'legal-mentions.css';
$pageTitle = 'Mentions légales';

// Appel des vues de la page article
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/legal-mentions.php');
include(dirname(__FILE__).'/../views/templates/footer.php');