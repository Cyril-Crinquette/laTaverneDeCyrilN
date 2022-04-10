<?php

    # Appel des constantes et initialisation du tableau d'erreurs

    require_once(dirname(__FILE__).'/../config/constCategory.php');
    require_once(dirname(__FILE__).'/../config/constForm.php');

    $errors=[];

    # Traitement des données

    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS));
    // On vérifie que ce n'est pas vide
    if (empty($login)) {
        $errors['login'] = 'Veuillez saisir votre pseudo';
    } else { // Pour les champs obligatoires, on retourne une erreur
        $checkedLogin = filter_var(
            $login,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REG_EXP_LOGIN . '/'))
        );
        if (!$checkedLogin) {
            $errors['login'] = 'Veuillez saisir un pseudo valide';
        }
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