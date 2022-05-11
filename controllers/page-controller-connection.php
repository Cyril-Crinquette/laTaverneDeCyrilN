<!------------------------------ Controller de la page de connection, traitement php et appel des vues correspondantes -------------------- -->

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
    }
    
    if (empty($password)) {
        $errors['password'] = 'Veuillez saisir votre mot de passe';
    } else {
                $checkedPassword = filter_var(
                    $password,
                    FILTER_VALIDATE_REGEXP,
                    array("options" => array("regexp" => '/' . REG_EXP_PASSWORD . '/'))
                );
                if (!$checkedPassword) {
                    $errors['password'] = 'Le mot de passe est erroné';
                } 
            }
    }
    
    # Appel des vues

    include(dirname(__FILE__).'/../views/templates/template_connection/header.php');
    if (empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        include(dirname(__FILE__).'/../views/user/profile.php');
        // S'il n'y a aucune erreur et le formulaire est envoyé en post, alors on envoie l'utilisateur vers sa page de profil
    } else {
        include(dirname(__FILE__).'/../views/user/connection.php');
    }  // Si des erreurs persistent, on renvoie l'utilisateur vers la page d'inscription, autant que nécessaire
    
    include(dirname(__FILE__).'/../views/templates/footer.php');
    // Le footer général suffit pour la page d'inscription