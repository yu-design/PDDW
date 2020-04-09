<?php 
    require 'models/manga.php';
    $title="Neko-Shop";
    include 'views/includes/header.php';

    //navbar basée sur le role
    if(!empty($_SESSION['login'])){
        if($_SESSION['role'] == USER)
        {
    
            include 'views/includes/navbarUser.php';
        }
        else
        {
            include 'views/includes/navbarAdmin.php';
        }
    }
    else
    {
        include 'views/includes/navbarAnonymous.php';
    
    }

    // affichage de tout les mangas si pas d'id défini
    if (!REQ_TYPE_ID && !REQ_ACTION) {

        $mangas = Manga::getMangas();
        include 'views/mangas.php';
    } 
    else {

        if(REQ_ACTION == 'edit') {

            $manga = Manga::getMangaById(REQ_TYPE_ID);
            include 'views/mangaDetail.php';
        }
        elseif(REQ_ACTION == 'delete'){

        }
        else{
            $manga = Manga::getMangaById(REQ_TYPE_ID);
            include 'views/mangaDetail.php';
        }
        
    }
    
    include 'views/includes/content.php';
    include 'views/includes/footer.php';
?>