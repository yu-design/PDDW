<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="<?=ROOT_PATH?>public/css/sticky-footer-navbar.css">-->
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/overtemplate.css">
        <script src="<?=ROOT_PATH?>public/js/jquery-3.4.1.slim.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
        
        <title><?php echo $titre; ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo">
                <a href="<?=ROOT_PATH?>"><img src="<?=ROOT_PATH?>/public/images/logo-bedebile.png"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Présentation</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Articles
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">nouveautés</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Bandes dessinées</a>
                            <a class="dropdown-item" href="#">Mangas</a>
                            <a class="dropdown-item" href="#">comics</a>
                            <a class="dropdown-item" href="#">Romans</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Gestion profil</a>
                            <a class="dropdown-item" href="#">Historique de commande</a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-item" >Administration</span>
                            <a class="dropdown-item sous-menu" href="#">Valider commande</a>
                            <a class="dropdown-item sous-menu" href="#">Gestion article</a>
                            <a class="dropdown-item sous-menu" href="#">Gestion client</a>
                            <a class="dropdown-item sous-menu" href="#">Statistique de vente</a>
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
                        <a href="<?=ROOT_PATH?>login" class="btn btn-outline-success my-2 my-sm-0">Se connecter</a>
                    </div>
                </ul>
            </div>
        </nav>
        <header>

        </header>
        <main>

        </main>
        <footer>
        </footer>
    </body>
</html>