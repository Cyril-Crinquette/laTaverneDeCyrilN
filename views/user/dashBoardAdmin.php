<!------------------------------------------------------- Vue du dash board utilisateurs --------------------------------------------------------- -->

<h1 id="mobileTitle" class="text-center"> Dash board utilisateurs </h1>
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
            <th scope="col">Bannissement</th>
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
            <td scope="col"><a href="#" onclick="deleteConfirm('/suppression?id=<?=$user->id?>')">Bannir</a></td>
        </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>
<!------------------------------------------------------------------------------------------------------------------------------------------------ -->
