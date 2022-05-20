<!------------------ ----------------------- Vue de la page article ------------------------------------------- -->

<!-- VUE NON DEFINITIVE, A MODIFIER ULTERIEUREMENT -->
<div class="container-fluid main">
    <div class="row">
    <?php 
    include(dirname(__FILE__).'/../templates/navbar.php');
    ?>

        <div class="secondColumn col-12 col-md-8">
            <div class="d-flex flex-column contentMiddle">
                <h1 id="mobileTitle" class="text-center"> <?=$article->title?> </h1>
                <div id="imgCategory">
                    <img src="/public/assets/img/article/<?=$article->id?>.jpg" alt="image illustrant l'article">
                </div>
                <div>
                    <p> <?=$article->content?></p>
                </div>
                <p class="card-text">Publié le <?=$article->publicated_at?> par <?=$author->pseudo?> </p>

                <?php if(!empty($_SESSION['user'])) { ?>
                    <a href="">
                        <p id="addRemark">
                            Ajouter un commentaire
                        </p>
                    </a>
                <?php } ?>
                
                

                <div class="remark">
                    Ici seront affichés les différents commentaires liés à l'article
                    <?php
                    foreach ($allRemarks as $remark) { ?>
                        <p><?=$remark->content?></p>
                        <p><?=$remark->publicated_at?> par <?=$author->pseudo?></p> <br><br><br>
                    <?php }
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
            <a href="/contact">
                <p id="contact"> Qui suis-je? Me contacter </p>
            </a>
        </div>

    </div>
</div>
<!------------------------------------------------  Modale de commentaires  ------------------------------------------------------------ ------------>

<div id="modal" class="modal">
    <form class="modal-content" action="/article" method="post">
        <div class="headContainer">
            <span id="close" class="close" title="Close Modal">&times;</span>
            <h1>Ecrire un commentaire</h1>
        </div>

        <div class="container">
            <label for="uname"><b>Ecrire</b></label>
            <textarea name="content" id="remarkCont" cols="30" rows="10"></textarea>

            <button type="submit" id="connect">Poster</button>
        </div>

    </form>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -------------------------->

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