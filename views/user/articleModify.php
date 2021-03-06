<!-- ------------------- Page de modification contenant le formulaire de modification d'article ----------------------------- -->
<h1 id="mobileTitle" class="text-center"> Modification d'article </h1>
<main>
    <div class="img">
        <img src="/public/assets/img/articleModify.jpg" alt="des boîtes de jeux en pagaille, de différents genres">
    </div>
    <div class="text">
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>?id=<?=$id?>" enctype="multipart/form-data"
            method="post">
            <div class="formDiv">
                <label for="category">Catégorie</label>
                <select name="category" required id="category" class="form-control">
                    <?php foreach ($categoryList as $category) {
                            $isSelected = isset($article) && ($category->id == $article->id_categories) ? 'selected' : '';
                            echo '<option value="' . $category->id . '" ' .  $isSelected  . '>' . $category->name . '</option>';
                        } ?>
                </select>
                <div class="errors">
                    <?= $errors['category'] ?? '' ?>
                    <!-- Coallescente permettant d'afficher l'erreur liée à la catégorie si elle existe -->
                </div>
                <label for="title">Titre de l'article</label>
                <input type="text" required pattern="^[a-zA-ZÀ-ÿ0-9. -\']*$" name="title" id="title"
                    value="<?=$article->title ?? ''?>">
                <!-- Coallescente permettant de laisser affiché le titre s'il est correct -->
                <div class="errors">
                    <?= $errors['title'] ?? '' ?>
                    <!-- Coallescente permettant d'afficher l'erreur liée au titre si elle existe -->
                </div>
                <label for="filePicture">Télécharger l'image de l'article</label>
                <input class="form-control" type="file" id="filePicture" aria-describedby="filePictureHelp"
                    placeholder="Photo de profil" accept="image/jpeg" name="filePicture">
                <div class="errors">
                    <?= $errors['filePicture'] ?? '' ?>
                    <!-- Coallescente permettant d'afficher l'erreur liée à la photo de profil si elle existe -->
                </div>
                <label for="content">Contenu de l'article</label>
                <textarea name="content"
                    pattern="^[0-9a-zA-ZÀÁÂÆÇÈÉÊËÌÍÎÏÑÒÓÔŒÙÚÛÜÝŸàáâæçèéêëìíîïñòóôœùúûüýÿ=\/\^+·,;:!°\[\]{}?*<>()&$#%._\n\r \'\"
                    -]*$" id="content"><?=$article->content ?? ''?></textarea>
                <div class="errors"><?= $errors['content'] ?? '' ?></div>
                <!-- Coallescente permettant d'afficher l'erreur liée au contenu de l'article si elle existe -->
                <input type="submit" value="Publier">
            </div>
        </form>
    </div>
</main>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->