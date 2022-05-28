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

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$article = Article::getById($id);
$author = Article::getAuthor($id);
$pageTitle = $article->title;
$publicated_at= date('Y-m-d-H:i:s');
$allRemarks = Article::getRemarksById($id);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));

    if(!empty($content)){
        $remark = new Remark($id, $_SESSION['user']->id, $content, $publicated_at); 
        $remark->save();
        header('location: /article?id='.$article->id);
        exit;
    }
}

// Appel des vues de la page article
    include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/user/article.php');
    include(dirname(__FILE__).'/../views/templates/footer.php');
