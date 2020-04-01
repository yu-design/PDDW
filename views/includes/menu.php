<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?ROOT_PATH?>public/css/boostrap.min.css">
        <link rel="stylesheet" href="<?ROOT_PATH?>public/css/sticky-footer-navbar.css">
        <script src="<?=ROOT_PATH?>public/js/jquery-3.4.1.slim.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <nav>
            <div id="header-top">
                <div id="logo">
                    <a href="index.php"><img src="public/images/logo-bedebile.png" alt="logo" /></a>
                </div id="zone_recherche">
                    <a href="#"><img src="public/images/loupe.png" alt="loupe"/></a>
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Que cherchez-vous ?</button>
                    </form>
                </div>
                <div id="btn_favoris">
                    <div id="caddie">
                        <a href="#"><img src="public/images/caddie.jpg" alt="caddie" /></a>
                    </div>
                    <div id="favoris">
                        <a href="#"><img src="public/images/coeur.jpg" alt="favoris" /></a>
                    </div>
                </div>
                <div id="ligne_gauche_admin"></div>
                <div id="admin_user">
                        <!--Ici sera placé la zone de gestion des utilisateurs pour pouvoir modifier leurs profils, visionner leurs cartes de fidélité, voir les achats qu'ils ont effectués.
                        Pour l'admin, il vera également les achats qu'il aura pû faire mais également voir les statistiques de vente et valider les commandes.-->
                        <!--si l'utilisateur n'est pas connecté, un bouton se connecter sera présent à la place-->
                </div>
                <div id="ligne_droite_admin"></div>
                <div id="btn_connexion_help">
                    <div id="btn_connexion"><!--A n'afficher que si un utilisateur est connecté-->
                        <a href="index.php"><img src="public/images/connexion.jpg" alt="logo" /></a>
                    </div>
                    <div id="btn_help">
                        <a href="index.php"><img src="public/images/help.jpg" alt="logo" /></a>
                    </div>
                </div>
            </div>
            <div id="background">
            </div>
    <div class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?=ROOT_PATH?>">E-Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>article">Les articles</a></li>
                </ul>
                <?php if(empty($_SESSION['id'])):?>
                    <a href="<?=ROOT_PATH?>login" class="btn btn-outline-success my-2 my-sm-0">Se connecter</a>
                    <?php else:?>
                    <a href="<?=ROOT_PATH?>user" class="btn btn-outline-info my-2 my-sm-0">Mon compte</a>
                    <a href="<?=ROOT_PATH?>logout" class="btn btn-outline-success my-2 my-sm-0">Se déconnecter</a>
                    <?php endif?>
                </div>
            </div>
        </nav>
    
    
    
    
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>