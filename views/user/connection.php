<!-- ------------------- Page de connexion contenant le formulaire de connexion ----------------------------- -->

<h1 id="mobileTitle" class="text-center"> Connexion </h1>
<div class="contain">
    <main>
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="formElement">
                <label for="email"> Mail:</label>
                <input type="email" required name="email" id="email" value="<?=$email ?? ''?>">
                <div class="errors"> <?=$errors['email'] ?? ''?> </div>
            </div>
            <div class="formElement">
                <label for="password"> Mot de passe:</label>
                <input type="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" name="password"
                    id="password" value="<?=$password ?? ''?>">
                <div class="errors"> <?=$errors['password'] ?? ''?> </div>
            </div>
            <div class="formValid">
                <input id="validInscription" type="submit" value="Connexion">
                <a href="/inscription">Pas encore de compte ?</a>
            </div>
        </form>
    </main>
</div>
<div id="contact">
    <a href="/contact">
        <p> Qui suis-je? Me contacter</p>
    </a>
</div>
<div class="text-center back">
    <a href="/accueil">
        <div>Retour au site</div>
    </a>
</div>