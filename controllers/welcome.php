<?php

$titre="Bédébile - Boutique en ligne";

include 'views/includes/head.php';

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

include 'views/includes/header.php';
include 'views/welcome.php';
include 'views/includes/main.php';
include 'views/includes/footer.php';

?>