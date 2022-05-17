<!------------------------------ Controller d'un article, appel des vues relatives-------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données, etc...
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';
require_once dirname(__FILE__) . '/../models/Article.php';
require_once dirname(__FILE__) . '/../models/Remark.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'article.css';
$pageTitle = 'Article';

// Appel de la constante "category"
require_once(dirname(__FILE__).'/../config/constCategory.php');

// Récupération du type titre de l'article dans le get
if(!empty($_GET)){
    $articleTitle = $_GET['articleTitle'];
};


// Appel des vues de la page article
    include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/user/article.php');
    include(dirname(__FILE__).'/../views/templates/footer.php');
    // La vue du footer de la page article correspond au footer général