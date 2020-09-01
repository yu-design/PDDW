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
            <li class="nav-item">
                <a class="nav-link" href="<?=ROOT_PATH?>articles">Articles</a>
            </li>
            <!--
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Articles
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?=ROOT_PATH?>nouveautes_article">Nouveautés</a>
                    <div class="dropdown-divider"></div>
                    $_SESSION['typeArticleAffichage']=1
                    <a class="dropdown-item" name='1' href="<?=ROOT_PATH?>articles">Bandes dessinées</a>
                    <a class="dropdown-item" name='2' href="<?=ROOT_PATH?>articles">Mangas</a>
                    <a class="dropdown-item" name='3' href="<?=ROOT_PATH?>articles">Comics</a>
                    <a class="dropdown-item" name='4' href="<?=ROOT_PATH?>articles">Romans</a>
                </div>
            </li>
            -->
        </ul>
        <form class="form-inline my-2 my-lg-0 space-search">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <!--<div class="collapse navbar-collapse" id="navbarCollapse">-->
                <a href="<?=ROOT_PATH?>nouveau_utilisateur" class="btn btn-outline-success my-2 my-sm-0">S'enregistrer</a>
                <div class="entreBouton"></div>
                <a href="<?=ROOT_PATH?>connexion" class="btn btn-outline-success my-2 my-sm-0">Se connecter</a>
            <!--</div>-->
        </ul>
    </div>
</nav>