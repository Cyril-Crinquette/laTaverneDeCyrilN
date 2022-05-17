<!------------------ ------------------------------ Header général ---------------------------------------------- -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La taverne de Cyril</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <!-- Chargement de la feuille de style commune aux différentes pages -->
    <link rel="stylesheet" href="/public/assets/css/<?=$style?>">
    <!-- Chargement de la feuille de style correspondant à la page d'accueil -->
</head>

<body>
    <header>

        <!------------------------------------ Affichage de la version PC --------------------------------------- -->
        <div class="container-fluid d-none d-md-block navbarLaptop">
            <div class="row">
                <div class="col-2 logo">
                    <a href="/accueil"><img src="/public/assets/img/logo.svg" alt="Logo du site"></a>
                </div>
                <div class="col-8 titleHeader d-flex justify-content-center align-items-center">
                    <h1 id="pcTitle"> <?=$pageTitle?> </h1>
                </div>
                <div class="col-2 loginHeader d-flex justify-content-center align-items-center">
                <?php if(empty($_SESSION["user"])){?>
                    <p id="userInt"> <a href="/connexion">Connexion</a>/<a href="/inscription">Inscription</a> </p>
                <?php } else {?>
                    <div id="userPicture">fggufuf</div>
                    <p id="userInt"> <a href="/déconnexion">Déconnexion</a> </p>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- ------------------------------------------------------------------------------------------------------- -->
        <?php
        include(dirname(__FILE__).'/navbarMobile.php');
        ?>
    </header>
