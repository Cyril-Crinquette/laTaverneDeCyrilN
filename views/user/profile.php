<h1 id="mobileTitle" class="text-center">Profil </h1>
<h6 class="text-center">
    <?=SessionFlash::display('message')?>
</h6>

<?php
if(empty($error)) { 
    ?>
    <div class="gdParents">
        <div class="parents">
            <div class="text-center text">
                <h5>Numéro de membre: <span><?=$user->id;?></span></h5>
                <h5> Pseudo: <span><?=$user->pseudo;?></span></h5>
                <h5> Mail: <span><?=$user->email;?></span></h5>
                <h5> Inscription enregistrée le: <span><?=$user->registered_at;?></span></h5>
                <h5> Inscription validée le: <span><?=$user->validated_at;?></span></h5>
                <p><span><?=$user->description;?></span></p>
            </div>
            <div class="img">
                <img src="/public/assets/img/user/<?=$user->id?>.jpg" alt="image de profil de l'utilisateur">
            </div>
        </div>
    </div>
    <?php 
}
?>
<div class="function">
    <div class="functions">
        <?php
    if ($_SESSION['user']->id == $id) { ?>
        <a href="/modification-utilisateur?id=<?=$user->id;?>">
            <button type="button" class="btn btn-light">Modifier votre profil</button>
        </a>
        <?php 
    } 

    if ($user->id_roles == 1 ) { ?>
        <a href="/nouvel-article"><strong>
                <button type="button" class="btn modify">Nouvel article</button>
            </strong></a>
        <a href="/dash-board-articles"><strong>
                <button type="button" class="btn modify">Dash board articles</button>
            </strong></a>
        <a href="/dash-board"><strong>
                <button type="button" class="btn modify">Dash board utilisateurs</button>
            </strong></a>
        <?php 
    } 

    if ($_SESSION['user']->id == $id || $user->id_roles == 1) { ?>
        <a href="#" onclick="deleteConfirm('suppression?id=<?=$user->id?>')">
            <button type="button" class="btn delete">Supprimer votre profil</button>
        </a>
        <?php 
    } 
    ?>
    </div>
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