<!------------------------------ Controller de la page "me contacter, traitement php et appel des vues correspondantes -------------------- -->

<?php

// Appel des constantes 

require_once(dirname(__FILE__).'/../config/constForm.php');


//Traitement des données

//..............

// Appel des vues de la page contact 

    include(dirname(__FILE__).'/../views/templates/template_contact/header.php');
    if (empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        // S'il n'y a aucune erreur et le formulaire est envoyé en post, alors on confirme l'utilisateur le bon envoi du message
        include(dirname(__FILE__).'/../views/user/messageContact.php');
    } else {
        // Si des erreurs persistent, on renvoie l'utilisateur vers la page de contact, autant que nécessaire
        include(dirname(__FILE__).'/../views/user/contact.php');
    } 
    include(dirname(__FILE__).'/../views/templates/footer.php');
    // La vue du footer de la page contact correspond au footer général

