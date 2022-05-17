<!--------------------------------- Controller de la page "validation", traitement php  ------------------------------ -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__).'/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Sécurisation de la validation du compte par envoi de mail
require_once(dirname(__FILE__).'/../helpers/JWT.php');

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'validation.css';
$pageTitle = 'Félicitations!';

$mail = trim(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL));

$userByMail = User::getByEmail($mail);

$userByMail->validated_at = date('Y-m-d H:i:s'); 

$user = new User($userByMail->pseudo, $userByMail->email, $userByMail->password, '', $userByMail->id_roles, $userByMail->validated_at);
$user->update($userByMail->id);

# Appel des vues
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/validation.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
