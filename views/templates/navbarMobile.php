<!--------------------------------------- NavBar en version mobile------------------------------------------- -->
<div class="collapse mobileNav d-md-none" id="navbarToggleExternalContent">
    <div class="listNavMobile">
        <?php
                        foreach ($categories as $value) {
                            echo '<div><a href="/category?categoryTheme='.$value->name.'">'.$value->name.'</a></div>';
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
            <?php if(empty($_SESSION["user"])){?>
            <p id="userInt"> <a href="/connexion">Connexion</a>/<a href="/inscription">Inscription</a> </p>
            <?php } else {?>
            <p id="userInt"> <a href="/déconnexion">Déconnexion</a> </p>
            <?php } ?> 
        </div>
    </div>
</nav>
<!-- ------------------------------------------------------------------------------------------------------------- -->