<?php

$titre="Bédébile - Presentation";

include 'views/includes/head.php';

if(!empty($_SESSION['login']))
{
    if($_SESSION['role'] == USER)
    {
        include 'views/includes/nav-user.php';
    }
    else
    {
        include 'views/includes/nav-admin.php';
    }
}
else
{
    include 'views/includes/nav.php';

}

include 'views/includes/header-presentation.php';
include 'views/presentation.php';
include 'views/includes/main.php';
include 'views/includes/footer.php';

?>