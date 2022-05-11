<!------------------------------ Controller de la page "inscription", traitement php et appel des vues correspondantes -------------------- -->

<?php

    # Appel des constantes et initialisation du tableau d'erreurs

    require_once(dirname(__FILE__).'/../config/constCategory.php');
    require_once(dirname(__FILE__).'/../config/constForm.php');

    $errors=[];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # Traitement des données

    // Mail
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if (!empty($email)) {
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["email"] = "L'adresse email n'est pas au bon format";
        }
    } else {
        $error["email"] = "Veuillez rentrer une adresse mail";
    }

    // Vérification des mots de passe rentrés
    if(!empty($_POST)){
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
    }
    
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
    }

    // Vérification de la photo de profil
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
}






    # Appel des vues

    include(dirname(__FILE__).'/../views/templates/template_inscription/header.php');
    if (empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        include(dirname(__FILE__).'/../views/user/confirmedMail.php');
        // S'il n'y a aucune erreur et le formulaire est envoyé en post, alors on envoie l'utilisateur vers sa page de profil
    } else {
        include(dirname(__FILE__).'/../views/user/inscription.php');
    }  // Si des erreurs persistent, on renvoie l'utilisateur vers la page d'inscription, autant que nécessaire
    
    include(dirname(__FILE__).'/../views/templates/footer.php');
    // Le footer général suffit pour la page d'inscription