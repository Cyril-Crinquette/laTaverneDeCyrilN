<!------------------------- Controller de l'accueil, appel des vues de l'accueil-------------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'home.css';
$pageTitle = 'La taverne de Cyril';

// Appel de la constante "category"
// require_once(dirname(__FILE__).'/../config/constCategory.php');

// Récupération du type de catégorie choisi dans le get
// if(!empty($_GET)){
//     $category = $_GET['categoryTheme'];
// };

// Appel des vues de l'accueil
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/home.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
