<!------------------------------ Controller de la page de connection, traitement php et appel des vues correspondantes -------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'connection.css';
$pageTitle = 'Connection';

# Appel des constantes et initialisation du tableau d'erreurs
require_once(dirname(__FILE__).'/../config/constCategory.php');
require_once(dirname(__FILE__).'/../config/constForm.php');

$errors=[];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$user = User::getByEmail($email);
$password = $_POST['password'];

# Traitement des données
// Mail
if (!empty($email)) {
    $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$testEmail) {
        $errors["email"] = "L'adresse email n'est pas au bon format";
    }
} else {
    $errors["email"] = "Veuillez rentrer une adresse mail";
}

// Vérification du mot de passe rentré
// if (empty($password)) {
//     $errors['password'] = 'Veuillez saisir votre mot de passe';
// } else {
//             $checkedPassword = filter_var(
//                 $password,
//                 FILTER_VALIDATE_REGEXP,
//                 array("options" => array("regexp" => '/' . REG_EXP_PASSWORD . '/'))
//             );
//             if (!$checkedPassword) {
//                 $errors['password'] = 'Le mot de passe est erroné';
//             } 
//         }

// Vérification du mot de passe rentré
if(empty($errors)){
    $passwordHash = $user->password;
    $result = password_verify($password, $passwordHash);

    if(!$result){
        $errors['password'] = 'Mot de passe invalide';
    }

    if(is_null($user->validated_at)){
        $errors['password'] = 'Votre compte n\'est pas encore activé';
    }
} else {
    $errors['password'] = 'Veuillez rentrer votre mot de passe';
}

// Si tout est OK on redirige l'utilisateur vers sa page de profil, il est désormais connecté
if(empty($errors)){
    $_SESSION['user'] = $user;
    header('location: /profil');
}

}

# Appel des vues
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/connection.php');
// Si des erreurs persistent, l'utilisateur reste sur la page de connexion
include(dirname(__FILE__).'/../views/templates/footer.php');
// Le footer général suffit pour la page d'inscription