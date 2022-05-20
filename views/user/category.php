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
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident debitis odit temporibus
                        facilis eligendi deserunt obcaecati vel nulla cumque distinctio similique voluptates tempora
                        dignissimos officia nihil, fuga quod non. Error! <br>
                        Un paragraphe qui explique quelle est cette catégorie
                    </p>
                </div>


                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($articlesCategory as $value) { 
                        echo '<a href="/article?id='.$value->id.'">' ?>
                        <div class="col">
                            <div class="card">
                                <img src="/public/assets/img/article/<?=$value->id?>.jpg" class="card-img-top" alt="image de l'article">
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
                            <img src="public/assets/img/metroidDread.jpg" class="d-block w-100"
                                alt="image du jeu Metroid Dread">
                        </div>
                        <div class="carousel-item">
                            <img src="public/assets/img/theEvilWithin.jpg" class="d-block w-100"
                                alt="image du jeu The Evil Within">
                        </div>
                        <div class="carousel-item">
                            <img src="public/assets/img/slayTheSpire.jpeg" class="d-block w-100"
                                alt="image du jeu Slay the Spire">
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
<!------------------------------------------------  Modale de connexion  ------------------------------------------------------------ -->

<!-- <div id="modal" class="modal">
    <form class="modal-content" action="" method="post">
        <div class="headContainer">
            <span id="close" class="close" title="Close Modal">&times;</span>
            <h1>La taverne de Cyril</h1>
        </div>

        <div class="container">
            <label for="uname"><b>Mail</b></label>
            <input type="email" placeholder="Mail" required>

            <label for="psw"><b>Mot de passe</b></label>
            <input type="password" placeholder="Mot de passe" required>

            <button type="submit" id="connect">Se connecter</button>

        </div>

        <div class="footContainer">
            <div class="signUp">
                <p>Pas encore de compte ? <a class=" signUpLink" href="/inscription">S'inscrire</a></p>
            </div>
        </div>
    </form>
</div> -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->