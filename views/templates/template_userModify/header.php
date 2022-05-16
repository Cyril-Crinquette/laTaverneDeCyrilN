<!------------------ ------------------- Header de la page de modification de  l'utilisateur -------------- ------------------------- -->


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
    <link rel="stylesheet" href="/public/assets/css/css_userModify/style.css">
    <!-- Chargement de la feuille de style correspondant à la page de confirmation du message -->
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
                    <h1 id="pcTitle"> Modification de l'utilisateur </h1>
                </div>
                <div class="col-2 loginHeader d-flex justify-content-center align-items-center">
                <p> <a href="/connexion">Connexion</a>/<a href="/inscription">Inscription</a> </p>

                </div>
            </div>
        </div>
        <!-- ---------------------------------------------------------------------------------------------------- -->

        <!--------------------------------------- NavBar en version mobile---------------------------------------- -->
        <div class="collapse mobileNav d-md-none" id="navbarToggleExternalContent">
            <div class="listNavMobile">
                <?php
                        foreach ($categories as $value) {
                            echo '<div><a href="/category?categoryTheme='.$value->title.'">'.$value->title.'</a></div>';
                        };
                    ?>
            </div>
        </div>
        <nav class="navbar mobileNav navbar-dark d-md-none">
            <div class="container-fluid navbarFlexible">
                <div class="logoAndNav">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="/accueil"><img class="smallLogo" src="/public/assets/img/logo.svg" alt="Logo du site"></a>
                </div>
                <div>
                    <p> <a href="/connexion">Connexion</a>/<a href="/inscription">Inscription</a> </p>
                </div>
            </div>
        </nav>
        <!-- ------------------------------------------------------------------------------------------------------- -->
    </header>