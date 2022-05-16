<p>
        <?$error??''?>
    </p>
    <h6 class="text-center">
    <?=SessionFlash::display('message')?>
    </h6>

    <?php if (empty($error)) { ?>
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
        </div>
        <!-- <h4 class=" rdv text-center">Rendez-vous du patient</h4> -->
        <!-- <div class="rdvParent">
            <?php
                //if (!empty($allInfo)) {
                    //foreach ($allInfo as $value) {
                        //echo '<p class="text-center"> Fixé pour le '.$value->dateHour.'</p>'
                        ?>
            <a class="linkProfil" href="/suppression?id=<?=$value->appId?>">
                <p class="text-center">Supprimer le rendez-vous </p>
            </a>
            <br>
            <?php //}
                //} else {
                //    echo '<p class="text-center"> Aucun rendez-vous n\'est pris pour ce patient</p>';
                //}
            //}
            ?>
        </div> -->
        <a href="/modification-utilisateur?id=<?=$user->id;?>"><h6>Modifier les informations</h6></a> <br>
    <!-- </div> -->