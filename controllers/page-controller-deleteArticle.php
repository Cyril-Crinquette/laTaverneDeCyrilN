<!------------------------------------------------- Controller de suppression d'utilisateur ------------------------------------------------------- -->
<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';
require_once dirname(__FILE__) . '/../models/Article.php';

// On s'assure que l'utilisateur qui essaye de supprimer le profil soit un administrateur
if(!empty($_GET) && ($_SESSION['user']->id_roles == 1)) {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $articleDelete = Article::delete($id);
    if ($articleDelete) {
        SessionFlash::set('Un article est sorti de la taverne');
    }
    header('location: '.$_SERVER['HTTP_REFERER']);
    exit;
} else {
    header('location: /bienvenue');
    exit;
}





