<!------------------------------------------------------- Vue de la page d'accueil--------------------------------------------------------- -->

<div class="container-fluid main">
    <div class="row">
    <?php 
    include(dirname(__FILE__).'/../templates/navbar.php');
    ?>
        <div class="secondColumn col-12 col-md-8">
            <div class="d-flex flex-column contentMiddle">
                <h1 id="mobileTitle" class="text-center"> La taverne de Cyril </h1>
                <div class="imgDiv">
                    <img src="/public/assets/img/home2.jpg" alt="image de nombreux jeux issus de différentes catégories">
                </div>
                <div class= "textContent">
                    <p> Vous en avez marre des banalités lues dans la presse actuelle? <br>
                    De tous ces blockbusters sans saveur qui pullulent et occupent tout l'espace médiatique à chaque fin d'année? <br>
                    Bref vous avez besoin de renouveau? Ne bougez pas, vous êtes au bon endroit! <br>
                    En effet, ce site a pour but de faire découvrir aux internautes des jeux vidéo qui sont, pour certains, moins mis en avant dans la presse vidéoludique. <br>
                    Sur la taverne de Cyril, les rédacteurs d'articles ne s'attardent pas sur les graphismes ou la technique pure, mais sur le coeur même d'un jeu vidéo. <br>
                    Ainsi, pour les diverses catégories que vous trouverez sur le site, les contenus traiteront aussi bien de jeux indépendants que de AAA. <br>
                    L'idée est de mettre en avant les spécificités d'un jeu et d'expliquer pourquoi on le recommande. <br>
                    Donc en quelque sorte, on place les bons jeux vidéo sous le feu des projecteurs, pour redonner ses lettres de noblesse au jeu vidéo tel qu'on l'a toujours aimé. <br>
                    Par ailleurs, il existe une trés grande variété de genres dans l'univers vidéoludique et la taverne a également pour but de vous faire découvrir de nouvelles choses. <br>
                    Sortir de sa zone de confort et changer ses habitudes est souvent trés enrichissant, alors si vous êtes un joueur occasionnel, on vous invite à adopter un nouveau point de vue. <br>
                    Quant aux néophytes qui ne jouent et ne connaissent pas le jeu vidéo, on vous envie, pléthore de pépites vidéoludiques vous attendent, foncez et profitez!
                    </p>
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
            <a href="/contact">
                <p id="contact"> Qui suis-je? Me contacter</p>
            </a>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->