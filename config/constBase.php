<?php

// On stocke dans le fichier constBase.php les constantes permettant de stocker les valeurs dont nous avons besoin
// lors de la création d'un nouvel objet issu de la classe PDO
define('DSN', 'mysql:dbname=tavern;host=127.0.0.1;charset=utf8');
define('USER', 'tavern_admin');
define('PASSWORD', 'SL.Tlfgp.Yf*C_aj');
define('ERROR_ARRAY', [
    '0' => "Erreur générique",
    '1' => "Vous n'êtes pas connecté à la base de données",
    '2' => "Vous êtes en erreur numéro 2",
]);
