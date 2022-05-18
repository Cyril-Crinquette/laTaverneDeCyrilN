<p>
    <?$error??''?>
</p>

<h6 class="text-center">
    <?=SessionFlash::display('message')?>
</h6>

<?php
if ($user->id_roles == 1 ) { ?>
    <a href="/dash-board"><strong>
    <p class="text-center">Envoi vers le dash board utilisateurs</p>
</strong></a> 
<a href="/dash-board-articles"><strong>
    <p class="text-center">Envoi vers le dash board articles</p>
</strong></a>
<a href="/nouvel-article"><strong>
    <p class="text-center">Créer un nouvel article</p>
</strong></a>
<?php }
if(empty($error)) { 
    ?>
<div class="text-center">
    <h5><?=$user->id;?></h5>
    <h5><?=$user->pseudo;?></h5>
    <h5><?=$user->email;?></h5>
    <h5><?=$user->id_roles;?></h5>
    <h5><?=$user->registered_at;?></h5>
    <h5><?=$user->validated_at;?></h5>
    <p><?=$user->description;?></p>
</div>
<div class="img">
    <img src="/public/assets/img/intoTheBreach.jpg" alt="image de profil de l'utilisateur">
</div>
<?php } ?>

<a href="/modification-utilisateur?id=<?=$user->id;?>">
    <h6 class="text-center">Modifier votre profil</h6>
</a> <br>
