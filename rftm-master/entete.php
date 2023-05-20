<!-- Alerte -->
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    Click
    <a href="https://www.youtube.com/watch?v=Il1PvKesJQ0" target="_blank" style="color: black; text-decoration: underline;">here</a>
    to relive all 103 of Federer's singles titles!
    <i>"EVERY Roger Federer Career Singles Title 🏆"</i>
    <!--
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    -->
</div>

<!-- Logo RFTM -->
<div class="container">
    <center>
        <br><br>
        <a href="index.php">
            <img src="Images/RFTM2.png" alt="Logo" width="190" id="logoRFTM"/>
        </a>
    </center>
</div>

<!-- Carousel -->
<div class="container"><br><br>
    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicateurs -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
            <li data-target="#demo" data-slide-to="4"></li>
            <li data-target="#demo" data-slide-to="5"></li>
        </ul>

        <!-- Carrousel -->
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="4000">
                <img src="Images/Banniere/banniere1.png" alt="Carrousel slide 1" class="d-block w-100">
            </div>
            <div class="carousel-item" data-interval="4000">
                <img src="Images/Banniere/banniere2.png" alt="Carrousel slide 2" class="d-block w-100">
            </div>
            <div class="carousel-item" data-interval="4000">
                <img src="Images/Banniere/banniere3.png" alt="Carrousel slide 3" class="d-block w-100">
            </div>
            <div class="carousel-item" data-interval="4000">
                <img src="Images/Banniere/banniere4.png" alt="Carrousel slide 4" class="d-block w-100">
            </div>
            <div class="carousel-item" data-interval="4000">
                <img src="Images/Banniere/banniere5.png" alt="Carrousel slide 5" class="d-block w-100">
            </div>
            <div class="carousel-item" data-interval="4000">
                <img src="Images/Banniere/banniere6.png" alt="Carrousel slide 6" class="d-block w-100">
            </div>
        </div>

        <!-- Contrôles -->
        <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
</div>

<!-- Animation Rolex
<div>
    <center>
        <iframe id="rolex" class="container"
                src="https://static.rolex.com/clocks/2020/federer_mobile_HTML_180x75/rolex.html"
                SCROLLING=NO frameborder=NO width="1110px" height="75px"></iframe>
    </center>
</div>
-->

<!-- Barre de menu -->
<div class="container" style="background-color: rgb(0,96,57);">
    <center>
        <nav class="navbar navbar-expand-lg navbar-dark">

            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php#lastMatches">Last matches</a>
                            <a class="dropdown-item" href="index.php#nextTournaments">Next tournaments</a>
                            <!--
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                            -->
                        </div>
                    </li>

                    <li class="nav-item"> <!-- ajouter "active" dans class pour mettre en gras légèrement -->
                        <a class="nav-link" href="statistics.php">Statistics<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item"> <!-- ajouter "active" dans class pour mettre en gras légèrement -->
                        <a class="nav-link" href="aboutRFTM.php">About RFTM<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pageContact.php">Contact me</a>
                    </li>


                </ul>

                <!--
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                -->
                <iframe id="rolex"
                        src="https://static.rolex.com/clocks/2020/federer_mobile_HTML_180x75/rolex.html"
                        SCROLLING=NO frameborder=NO width="180px" height="75px"></iframe>
            </div>
        </nav>
    </center>
</div>