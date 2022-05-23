<!------------------------------ Controller de la page "create article", traitement php et appel des vues correspondantes -------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__).'/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/Article.php';
require_once dirname(__FILE__) . '/../models/User.php';
require_once dirname(__FILE__) . '/../models/Category.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'createArticle.css';
$pageTitle = 'Création d\'article';

# Appel des constantes et initialisation du tableau d'erreurs
// require_once(dirname(__FILE__).'/../config/constCategory.php');
require_once(dirname(__FILE__).'/../config/constForm.php');
$errors=[];
$id_users= $_SESSION['user']->id;
$publicated_at= date('Y-m-d-H:i:s');

//On redirige l'utilisateur sur la page de bienvenue s'il n'a pas le statut d'administrateur
if($_SESSION['user']->id_roles != 1) {
    header('location: /bienvenue');
    exit;
}

$categoryList = Category::getAll(); 
$categoryId= [];
foreach ($categoryList as $key => $value) {
array_push($categoryId, $value->id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

# Traitement des données

// Catégorie
$category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($category)) {
        if (!in_array($category, $categoryId)) {
            $errors["category"] = "La catégorie entrée n'est pas valide!";
        }
    }

// Titre
$title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
$isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REG_EXP_LOGIN.'/')));

if(!empty($title)){
    if(!$isOk){
        $errors['title'] = 'Merci de choisir un titre valide';
    }
}else{
    $errors['title'] = 'Vous devez choisir un titre';
}

// Contenu de l'article
$content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
if(!empty($content)){
    $checkMsg = filter_var($content, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REG_EXP_TEXTAREA . '/')));
    if(!$checkMsg){
        $errors["content"] = "Veuillez saisir des caractères valides pour que votre article paraisse";
    }
} else {
    $errors["content"] = "Veuillez écrire votre article";
}

if (empty($errors)) {
    $article = new Article($id_users, $category, $title, $content, $publicated_at);
    $article->save();
    $id = $article->id;
}

// Vérification de la photo de l'article
if (isset($_FILES['filePicture'])) {

    $filePicture = $_FILES['filePicture'];
    if(!empty($filePicture['tmp_name'])){

        if($filePicture['error']>0){
            $errors["filePicture"] = "Erreur survenue lors du transfert de fichier"; 
        } else {

            if(!in_array($filePicture['type'], AUTHORIZED_IMAGE_FORMAT)){
                $errors["filePicture"] = "Le format du fichier n'est pas accepté";
            } else {

                $extension = pathinfo($filePicture['name'],PATHINFO_EXTENSION);
                $from = $filePicture['tmp_name'];
                $to = dirname(__FILE__).'/../public/assets/img/article/'.$id.'.jpg';
                $result = move_uploaded_file($from, $to);
            }
        }
    } 
}



}

# Appel des vues
if (empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // $article = new Article($id_users, $category, $title, $content, $publicated_at);
    // $article->save();
    header('location: /dash-board-articles');
    // S'il n'y a aucune erreur et que le formulaire est envoyé en post, alors on envoie l'administrateur vers le dash board articles
} else {
    include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/user/createArticle.php');
    include(dirname(__FILE__).'/../views/templates/footer.php');
}  // Si des erreurs persistent, on laisse l'administrateur vers la page de création d'article, autant que nécessaire