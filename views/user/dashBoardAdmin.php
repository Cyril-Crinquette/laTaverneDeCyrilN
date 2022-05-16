<!------------------------------------------------------- Vue du dash board--------------------------------------------------------- -->


<!-- <div class="values">
    <div class="val-box">
        <i class='bx bxs-invader bx-md'></i>
        <div>
            <h3> <?=$nbAdmins?></h3>
            <span>Admin</span>
        </div>
    </div>

    <div class="val-box">
        <i class='bx bxs-group bx-md'></i>
        <div>
            <h3><?=$nbPartners?></h3>
            <span>Partenaires</span>
        </div>
    </div>

    <div class="val-box">
        <i class='bx bxs-face bx-md'></i>
        <div>
            <h3><?=$nbUsers?></h3>
            <span>clients</span>
        </div>
    </div>

    <div class="val-box">
        <i class='bx bxs-error-alt bx-md'></i>
        <div>
            <h3>0</h3>
            <span>Bannis</span>
        </div>
    </div>
</div> -->

<table width="100%">
    <thead>
        <tr>
            <td>Id</td>
            <td>Pseudo</td>
            <td>Email</td>
            <td>Date de validation</td>
            <td>Statut</td>
            <td>Profil</td>
            <td>Supprimer</td>
        </tr>
    </thead>
    <tbody>

        <?php
                foreach ($usersList as $profilUser) { ?>

        <tr>
            <td class="people">
                <img src="/public/assets/img/theMessenger.png" alt="image de profil">

                <div class="people-de">
                    <h5><?=strtoupper(($profilUser->id) )?></h5>
                </div>
            </td>

            <td class="people-des">
                <h5><?=$profilUser->pseudo?></h5>
            </td>

            <td class="people-des">
                <h5><?=$profilUser->email?></h5>
            </td>

            <td class="active">
                <?php 
                            if (!is_null($profilUser->activated_at)) { ?>
                <p>Actif</p>
                <?php } else { ?>
                <p class="inactif">inactif</p>
                <?php } ?>
            </td>


            <td class="role">
                <p>Admin</p>
            </td>


            <td class="edit"><a href="#">Modifier </a></td>
        </tr>

        <?php } ?>







    </tbody>
</table>