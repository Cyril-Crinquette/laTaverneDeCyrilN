<!--------------------------------- Controller de la page "validation", traitement php  ------------------------------ -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__).'/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

$mail = trim(filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL));

$userByMail = User::getByEmail($mail);
$userByMail->validated_at = date('Y-m-d H:i:s');

$user = new User($userByMail->id_roles, $userByMail->pseudo, $userByMail->email, $userByMail->password, $userByMail->description, $userByMail->validated_at);
$user->update($userByMail->id);
