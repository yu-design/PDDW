<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo">
                <a href="<?=ROOT_PATH?>"><img src="<?=ROOT_PATH?>public/images/logo-bedebile.png"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=ROOT_PATH?>">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=ROOT_PATH?>presentation">Présentation</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Articles
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=ROOT_PATH?>nouveautes_article">Nouveautés</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Bandes dessinées</a>
                            <a class="dropdown-item" href="#">Mangas</a>
                            <a class="dropdown-item" href="#">Comics</a>
                            <a class="dropdown-item" href="#">Romans</a>
                        </div>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?=ROOT_PATH?>modifier_utilisateur">Gestion profil</a>
                            <a class="dropdown-item" href="<?=ROOT_PATH?>historique_commande">Historique de commande</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 space-search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class=" d-none d-xl-block">
                        <div class="favorit-items">
                            <i class="far fa-heart"></i>
                        </div>
                    </li>
                    <li>
                        <div class="shopping-card">
                            <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <a href="<?=ROOT_PATH?>deconnexion" class="btn btn-outline-success my-2 my-sm-0">Se déconnecter</a>
                    </div>
                </ul>
            </div>
        </nav>