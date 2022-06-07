<!------------------------------------------------- Controller de suppression de commentaire ------------------------------------------------------- -->
<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';
require_once dirname(__FILE__) . '/../models/Article.php';
require_once dirname(__FILE__) . '/../models/Remark.php';


// On s'assure que l'utilisateur qui essaye de supprimer le commentaire soit l'auteur de ce commentaire ou un administrateur
if(!empty($_GET) && (($_SESSION['user']->id == $id_users) || ($_SESSION['user']->id_roles == 1))) {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $remarkDelete = Remark::delete($id);
    if ($remarkDelete) {
        SessionFlash::set('Le commentaire a été supprimé');
    }
    header('location: '.$_SERVER['HTTP_REFERER']);
    exit;
} else {
    header('location: /bienvenue');
    exit;
}





