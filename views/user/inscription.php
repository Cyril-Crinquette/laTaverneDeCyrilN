<!-- ------------------- Page d'inscription contenant le formulaire d'inscription ----------------------------- -->
<h1 id="mobileTitle" class="text-center"> Inscription </h1>
<form action="" method="post">
    <div class="formDiv">
        <label for="login">Mail</label>
        <input type="text" name="login" id="login" value="<?=$login ?? ''?>">
        <!-- Coallescente permettant de laisser affiché le login s'il est correct -->
        <div>
            <?= $errors['login'] ?? '' ?>
            <!-- Coallescente permettant d'afficher l'erreur liée au login si elle existe -->
        </div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" value="<?=$password ?? ''?>">
        <!-- Coallescente permettant de laisser affiché le mot de passe s'il est correct -->
        <div>
            <?= $errors['password'] ?? '' ?>
            <!-- Coallescente permettant d'afficher l'erreur liée au mot de passe si elle existe -->
        </div>
        <label for="confirmPassword">Confirmation du mot de passe</label>
        <input type="password" name="confirmPassword" id="confirmPassword" value="<?=$confirmPassword ?? ''?>">
        <!-- Coallescente permettant de laisser affiché la confirmation du mot de passe s'il est correct -->
        <div>
            <?= $errors['confirmPassword'] ?? '' ?>
            <!-- Coallescente permettant d'afficher l'erreur liée à la confirmation du mot de passe si elle existe -->
        </div>
        <input type="submit" value="S'inscrire">
    </div>
</form>

<a href="/contact">
    <p id="contact"> Qui suis-je? Me contacter</p>
</a>

<!---------------------------------------------  Modale de connexion  ------------------------------------------------ -->

<div id="modal" class="modal">
    <form class="modal-content" action="" method="post">
        <div class="headContainer">
            <span id="close" class="close" title="Close Modal">&times;</span>
            <h1>La taverne de Cyril</h1>
        </div>

        <div class="container">
            <label for="uname"><b>Mail</b></label>
            <input type="text" placeholder="Mail" required>

            <label for="psw"><b>Mot de passe</b></label>
            <input type="password" placeholder="Mot de passe" required>

            <button type="submit" id="connect">Se connecter</button>

        </div>

    </form>
</div>