<!------------------------------------------------------- Vue du dash board articles--------------------------------------------------------- -->

<h1 id="mobileTitle" class="text-center"> Dash board articles </h1>

<h6 class="text-center">
    <?=SessionFlash::display('message')?>
</h6>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titre</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Auteur</th>
            <th scope="col">Date de publication</th>
            <th scope="col">Modification</th>
            <th scope="col">Suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($articlesList as $article) { ?>
        <tr>
            <td scope="col"><?=$article->id;?> </th>
            <td scope="col"><?=$article->title;?></td>
            <td scope="col"><?=$article->category;?></td>
            <td scope="col"><?=$article->author;?></td>
            <td scope="col"><?=$article->publicated_at;?></td>
            <td scope="col"><a href="/modification-article?id=<?=$article->id?>"> Modifier</a></td>
            <td scope="col"><a href="/suppression-article?id=<?=$article->id?>">Supprimer</a>
        </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>