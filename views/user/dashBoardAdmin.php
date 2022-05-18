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
<h6 class="text-center">
    <?=SessionFlash::display('message')?>
</h6>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Email</th>
            <th scope="col">Date de validation</th>
            <th scope="col">Profil</th>
            <th scope="col">Suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usersList as $user) { ?>
        <tr>
            <td scope="col"><?=$user->id;?> </th>
            <td scope="col"><?=$user->pseudo;?></td>
            <td scope="col"><?=$user->email;?></td>
            <td scope="col"><?=$user->validated_at;?></td>
            <td scope="col"><a href="/profil?id=<?=$user->id?>"> Profil</a></td>
            <td scope="col"><a href="/suppression?id=<?=$user->id?>">Supprimer</a>
        </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>