<?php

$title = "Profil";
require_once "inc/header.inc.php";
require_once "inc/functions.inc.php";

if (empty($_SESSION['user'])) {

    header('location:authentification.php');
}



?>

<main>
    <h2 class="text-center">Bonjour <?=$_SESSION['user']['$firstName']?></h2>

</main>






<?php
require_once "inc/footer.inc.php";

?>