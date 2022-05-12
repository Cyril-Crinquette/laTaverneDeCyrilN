<!------------------------- Controller de l'accueil, appel des vues de l'accueil-------------------------- -->


<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Appel de la constante "category"
require_once(dirname(__FILE__).'/../config/constCategory.php');

// Récupération du type de catégorie choisi dans le get
if(!empty($_GET)){
    $category = $_GET['categoryTheme'];
};

// Appel des vues de l'accueil
include(dirname(__FILE__).'/../views/templates/header.php');
// La vue du header de la page d'accueil correspond au header général
include(dirname(__FILE__).'/../views/user/home.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
// La vue du footer de la page d'accueil correspond au footer général
