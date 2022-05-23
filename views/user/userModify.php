<!-- ------------------- Page de modification du profil contenant le formulaire de modification du profil ----------------------------- -->
<h1 id="mobileTitle" class="text-center"> Modification du profil </h1>
<main>
    <div class="img">
        <img src="/public/assets/img/imgForm.jpg" alt="une photo de moi regardant l'objectif">
    </div>
    <div class="text">
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>?id=<?=$user->id?>" method="post" enctype="multipart/form-data" novalidate>
            <div class="formDiv">
                <input type="hidden" name="id" value="<?= $user->id ?>">
                <label for="pseudo">Pseudo</label>
                <input type="text" required name="pseudo" id="pseudo" value="<?=$user->pseudo ?? ''?>">
                <!-- Coallescente permettant de laisser affiché le pseudo s'il est correct -->
                <div class="errors">
                    <?= $errors['pseudo'] ?? '' ?>
                    <!-- Coallescente permettant d'afficher l'erreur liée au pseudo si elle existe -->
                </div>
                <label for="password">Mot de passe</label>
                <input type="password" required name="password" id="password" value="">
                <!-- Coallescente permettant de laisser affiché le mot de passe s'il est correct -->
                <div class="errors">
                    <?= $errors['password'] ?? '' ?>
                    <!-- Coallescente permettant d'afficher l'erreur liée au mot de passe si elle existe -->
                </div>
                <label for="confirmPassword">Confirmation du mot de passe</label>
                <input type="password" required name="confirmPassword" id="confirmPassword" value="<?=$confirmPassword ?? ''?>">
                <!-- Coallescente permettant de laisser affichée la confirmation du mot de passe s'il est correct -->
                <div class="errors">
                    <?= $errors['confirmPassword'] ?? '' ?>
                    <!-- Coallescente permettant d'afficher l'erreur liée à la confirmation du mot de passe si elle existe -->
                </div>
                <label for="filePicture">Télécharger votre photo</label>
                <input class="form-control" type="file" id="filePicture" aria-describedby="filePictureHelp"
                    placeholder="Photo de profil" accept="image/jpeg" name="filePicture">
                <div class="errors">
                    <?= $errors['filePicture'] ?? '' ?>
                    <!-- Coallescente permettant d'afficher l'erreur liée à la photo de profil si elle existe -->
                </div>
                <label for="description">Description</label>
                <textarea name="description" id="description"><?=$user->description ?? 'Il n\'existe pas de description pour cet utilisateur'?></textarea>
                <div class="errors"><?= $errors['description'] ?? '' ?></div>
                <!-- Coallescente permettant d'afficher l'erreur liée au contenu de l'article si elle existe -->
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </div>
</main>
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

<!---------------------------------------------  Modale de connexion  ------------------------------------------------ -->

<!-- <div id="modal" class="modal">
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
</div> -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->