<!-------------------------------- Controller de modification d'utilisateur, appel des vues de modification d'utilisateur -------------------------------- -->

<?php

// Fichier d'initialisation permettant le lancement d'une session, la connection à la base de données etc..
require_once dirname(__FILE__) . '/../utils/init.php';

// Fichier permettant d'afficher les messages de sessionFlash
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');

// Appel des modèles nécessaires dans le controller
require_once dirname(__FILE__) . '/../models/User.php';

# Appel des constantes et initialisation du tableau d'erreurs
require_once(dirname(__FILE__) . '/../config/constCategory.php');
require_once(dirname(__FILE__) . '/../config/constForm.php');
$errors = [];

// Nommage des variables pour appeler le fichier CSS voulu et afficher le titre voulu
$style = 'userModify.css';
$pageTitle = 'Modification du profil';

// $email= intval(filter_input(INPUT_GET,'email',FILTER_SANITIZE_SPECIAL_CHARS));
// $id= intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));

// var_dump($_SESSION['user']);
// die;

// if ($user instanceof PDOException) {
//     $error = $user->getMessage();
// }

// $id= $_SESSION['user']->id;
// $user = User::getOne($id);



    if (!empty($_GET)) {
        $id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $user = User::getOne($id);
    }
    
    $email=$user->email;
    $validated_at=$user->validated_at;
    $id_roles=$user->id_roles;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # Traitement des données
    // Pseudo
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REG_EXP_LOGIN . '/')));

    if (!empty($pseudo)) {
        if (!$isOk) {
            $errors['pseudo'] = 'Merci de choisir un pseudo valide';
        }
    } else {
        $errors['pseudo'] = 'Vous devez choisir un pseudo';
    }

    // Vérification des mots de passe rentrés
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($password)) {
        $errors['password'] = 'Veuillez saisir votre mot de passe';
    } else {
        if (empty($confirmPassword)) {
            $errors['password'] = 'Veuillez confirmer votre mot de passe';
        } else {
            if ($password != $confirmPassword) {
                $errors['password'] = 'Veuillez saisir 2 fois le même mot de passe';
            } else {
                $checkedPassword = filter_var(
                    $password,
                    FILTER_VALIDATE_REGEXP,
                    array("options" => array("regexp" => '/' . REG_EXP_PASSWORD . '/'))
                );
                if (!$checkedPassword) {
                    $errors['password'] = 'Veuillez saisir un mot de passe d\'au moins 8 caractères, comprenant au minimum une lettre et un chiffre';
                } else {
                    $securedPassword = password_hash($password, PASSWORD_DEFAULT);
                }
            }
        }

        // Vérification de la photo de profil
        if (isset($_FILES['filePicture'])) {
            $filePicture = $_FILES['filePicture'];
            if (!empty($filePicture['tmp_name'])) {
                if ($filePicture['error'] > 0) {
                    $errors["filePicture"] = "Erreur survenue lors du transfert de fichier";
                } else {
                    if (!in_array($filePicture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                        $errors["filePicture"] = "Le format du fichier n'est pas accepté";
                    } else {
                        $extension = pathinfo($filePicture['name'], PATHINFO_EXTENSION);
                        $from = $filePicture['tmp_name'];
                        $fileName = uniqid('img_') . '.' . $extension;
                        $to = dirname(__FILE__) . '/../public/uploads/' . $fileName;
                        move_uploaded_file($from, $to);
                    }
                }
            }
        }

        // Description
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($description)) {
            $description = '';
        } else {
            $checkContent = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REG_EXP_TEXTAREA . '/')));
        if (!$checkContent) {
            $errors["description"] = "Veuillez saisir des caractères valides pour votre description";
        }
        }
    }

    // if(empty($errors)){
    //     $securedPassword = password_hash($password, PASSWORD_DEFAULT);
    //     $user = new User($pseudo, $email, $securedPassword, "", 2);
    //     $user->save();
    //     $link = $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST'].'/validation?mail='.$email;
    //     $message = '
    //     Veuillez cliquer sur le lien suivant:<br>
    //     <a href="'.$link.'">Activation</a>
    //     ';
    //     mail($email, 'Validation de votre inscription', $message);
    // }

    if(empty($errors)) {
        $oneUser = new User($pseudo, $email, $password, $description, $id_roles, $validated_at);
        $user = $oneUser->update($id);
    }
    
}



# Appel des vues
if (empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // $id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
    header('location: /profil?id='.$user->id);
    // S'il n'y a aucune erreur et que le formulaire est envoyé en post, alors on renvoie l'utilisateur vers sa page de profil
} else {
    include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/user/userModify.php');
    include(dirname(__FILE__) . '/../views/templates/footer.php');
}  // Si des erreurs persistent, on laisse l'utilisateur sur la page de modification de profil 
