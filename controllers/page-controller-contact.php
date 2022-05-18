<!------------------------------ Controller de la page "me contacter", traitement php et appel des vues correspondantes -------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'contact.css';
$pageTitle = 'Contact';

//Appel des constantes et initialisation du tableau d'erreurs
require_once(dirname(__FILE__).'/../config/constCategory.php');
require_once(dirname(__FILE__).'/../config/constForm.php');

$errors=[];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Traitement des données
// Mail
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
if (!empty($email)) {
    $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$testEmail) {
        $errors["email"] = "L'adresse email n'est pas au bon format";
    }
} else {
    $errors["email"] = "Veuillez rentrer une adresse mail";
}

// Name
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));    
// On vérifie que ce n'est pas vide
if (empty($name)) {
    $errors['name'] = 'Veuillez saisir votre nom';
} else { // Pour les champs obligatoires, on retourne une erreur
    $checkedName = filter_var(
        $name,
        FILTER_VALIDATE_REGEXP,
        array("options" => array("regexp" => '/' . REG_EXP_NO_NUMBER . '/'))
    );
    if (!$checkedName) {
        $errors['name'] = 'Veuillez saisir un nom valide';
    }
}

// Message
$contactMe = trim(filter_input(INPUT_POST, 'contactMe', FILTER_SANITIZE_SPECIAL_CHARS));
if(!empty($contactMe)){
    $checkMsg = filter_var($contactMe, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REG_EXP_TEXTAREA . '/')));
    if(!$checkMsg){
        $errors["contactMe"] = "Veuillez saisir des caractères valides pour que votre message soit envoyé";
    }
} else {
    $errors["contactMe"] = "Veuillez rentrer votre message";
}
}

// Appel des vues de la page contact 

if (empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // S'il n'y a aucune erreur et le formulaire est envoyé en post, alors on confirme à l'utilisateur le bon envoi du message
    header('location: /confirmation');
    exit;
} else {
    include(dirname(__FILE__).'/../views/templates/header.php');
    // Si des erreurs persistent, on renvoie l'utilisateur vers la page de contact, autant que nécessaire
    include(dirname(__FILE__).'/../views/user/contact.php');
} 
include(dirname(__FILE__).'/../views/templates/footer.php');
// La vue du footer de la page contact correspond au footer général

