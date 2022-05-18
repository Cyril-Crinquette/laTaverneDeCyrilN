<!-------------------------------- Controller de modification d'article, appel des vues de modification d'article -------------------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__).'/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/Article.php';
require_once dirname(__FILE__) . '/../models/User.php';
require_once dirname(__FILE__) . '/../models/Category.php';


// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'articleModify.css';
$pageTitle = 'Modification d\'article';

# Appel des constantes et initialisation du tableau d'erreurs
// require_once(dirname(__FILE__).'/../config/constCategory.php');
require_once(dirname(__FILE__).'/../config/constForm.php');

$errors=[];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

# Traitement des données

// Catégorie
$category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($category)) {
        if (!in_array($category, $categoryList)) {
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
                $fileName = uniqid('img_').'.'.$extension;
                $to = dirname(__FILE__).'/../public/uploads/'.$fileName;
                move_uploaded_file($from, $to);
            }
        }
    } 
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
}

# Appel des vues
if (empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        header('location: /dash-board-articles');
    // S'il n'y a aucune erreur et que le formulaire est envoyé en post, alors on envoie l'administrateur vers le dash board articles
} else {
    include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/user/articleModify.php');
    include(dirname(__FILE__).'/../views/templates/footer.php');
}  // Si des erreurs persistent, on laisse l'administrateur sur la page de modification d'article

