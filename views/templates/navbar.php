<!--------------------------------- Navigation dans les catégories en version PC ------------------------->
<div class="firstColumn col-2 d-none d-md-block">
    <div class=navCat>
        <h4 class="text-center">Catégories</h4>
        <ul class="categoryList">
            <?php
                foreach ($categories as $value) {
                    echo '<li><a href="/category?id='.$value->id.'">'.$value->name.'</a></li>';
                };
            ?>
        </ul>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------- -->