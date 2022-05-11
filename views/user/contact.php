<!------------------------------------------------------- Vue de la page de contact --------------------------------------------------------- -->

<h1 id="mobileTitle" class="text-center"> Contact </h1>
<main> 
    <div class="img">
        <img src="/public/assets/img/contactMe.jpg" alt="une photo de moi regardant l'objectif">
    </div>
    <div class="text">
        <div class="info">
            <h4> Qui suis-je?</h4>
            <p> J'aime étudier tous les langages de programmation à la Manu</p>
        </div>
        <div class="contact">
            <h4> Me contacter </h4>
            <form action="" method="post" novalidate>
                <label for="email">Mail</label>
                <input type="email" required name="email" id="email" value="<?=$email ?? ''?>">
                <div class="errors"><?= $errors['email'] ?? '' ?></div>
                <label for="name">Nom</label>
                <input type="text" required name="name" id="name" value="<?=$name ?? ''?>">
                <div class="errors"><?= $errors['name'] ?? '' ?></div>
                <label for="contactMe">Votre message</label>
                <textarea name="contactMe" id="contactMe" value="<?=$contactMe ?? ''?>"></textarea>
                <div class="errors"><?= $errors['contactMe'] ?? '' ?></div>
                <button type="submit">Soumettre</button>
            </form>
        </div>
    </div>
</main>
<div class="text-center back">
<a href="/accueil">
    <div>Retour au site</div>
</a>
</div>
<!------------------------------------------------------- ------------------------------------------------------------------------------------- -->
















<!------------------------------------------------  Modale de connexion  --------------------------------------------------- -->

<!-- <div id="modal" class="modal">
    <form class="modal-content" action="" method="post">
        <div class="headContainer">
            <span id="close" class="close" title="Close Modal">&times;</span>
            <h1>La taverne de Cyril</h1>
        </div>

        <div class="container">
            <label for="uname"><b>Mail</b></label>
            <input type="email" placeholder="Mail" required>

            <label for="psw"><b>Mot de passe</b></label>
            <input type="password" placeholder="Mot de passe" required>

            <button type="submit" id="connect">Se connecter</button>

        </div>

        <div class="footContainer">
            <div class="signUp">
                <p>Pas encore de compte ? <a class=" signUpLink" href="/inscription">S'inscrire</a></p>
            </div>
        </div>
    </form>
</div> -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->