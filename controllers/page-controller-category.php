<!------------------------------ Controller d'une catégorie, appel des vues relatives-------------------- -->

<?php

require_once dirname(__FILE__) . '/../config/constCategory.php';

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données, etc...
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';
require_once dirname(__FILE__) . '/../models/Article.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'category.css';
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$category = Category::getOne($id);
$pageTitle = $category->name;
$articlesCategory = Category::getArticlesById($id);

// Appel des vues de la page category
    include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/user/category.php');
    include(dirname(__FILE__).'/../views/templates/footer.php');
