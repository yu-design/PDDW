<?php
function navControl(){
    if(!empty($_SESSION['login']))
    {
        if($_SESSION['role'] == USER)
        {
            include 'views/includes/nav-user.php';
        }
        else
        {
            if($_SESSION['role'] == VENDEUR){
                include 'views/includes/nav-vendeur.php';
            }
            else{
                include 'views/includes/nav-admin.php';
            }
        }
    }
    else
    {
        include 'views/includes/nav.php';

    }
}

/* Idée de pouvoir récupérer le type d'article pour afficher via la page article
function verificationTypeArticle(){

}
*/

?>