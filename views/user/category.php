<!------------------ ----------------------- Vue de la page de catégories ------------------------------------------- -->

<div class="container-fluid main">
    <div class="row">
        <?php 
        include(dirname(__FILE__).'/../templates/navbar.php');
        ?>
        <div class="secondColumn col-12 col-md-8">
            <div class="d-flex flex-column contentMiddle">
                <h1 id="mobileTitle" class="text-center"> <?=$category->name?> </h1>
                <div id="imgCategory">
                    <img src="/public/assets/img/category/<?=$category->id?>.jpg" alt="image illustrant la catégorie">
                </div>
                <div>
                    <div class="textContent">
                        <p><?=$category->content?></p>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($articlesCategory as $value) { 
                        echo '<a href="/article?id='.$value->id.'">' ?>
                    <div class="col">
                        <div class="card">
                            <img src="/public/assets/img/article/<?=$value->id?>.jpg" class="card-img-top"
                                alt="image de l'article">
                            <div class="card-body">
                                <h5 class="card-title"><?=$value->title?></h5>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php 
                }
                ?>
                </div>
            </div>
        </div>
        <div class="thirdColumn col-12 col-md-2">
            <div>
                <h4 class="text-center feelings">Coups de coeur de l'année</h4>
                <!--------------------------------------------- Intégration du carroussel:coups de coeur ------------------------------------------------->
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"
                    data-bs-interval="false">
                    <div class="carousel-inner cardHeight ">
                        <div class="carousel-item active">
                            <a href="/article?id=4"><img src="public/assets/img/metroidDread.jpg" class="d-block w-100"
                                    alt="image du jeu Metroid Dread"></a>
                        </div>
                        <div class="carousel-item">
                            <a href="/article?id=5"><img src="public/assets/img/theEvilWithin.jpg" class="d-block w-100"
                                    alt="image du jeu The Evil Within"></a>
                        </div>
                        <div class="carousel-item">
                            <a href="/article?id=2"><img src="public/assets/img/slayTheSpire.jpg" class="d-block w-100"
                                    alt="image du jeu Slay the Spire"></a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
            <div id="contact">
                <a href="/contact">
                    <p> Qui suis-je? Me contacter</p>
                </a>
            </div>
        </div>

    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->