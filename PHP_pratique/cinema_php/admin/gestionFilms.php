<?php


require_once "../inc/functions.inc.php";


if (!isset($_SESSION['user'])) {

    header("location:" . RACINE_SITE . "authentification.php");
} else {
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
        header("location:" . RACINE_SITE . "index.php");
    }
}


// echo '<br> <br> <br> <br>';
$info = '';

if (!empty($_POST)) {
    debug($_POST);

    $verif = true;

    foreach ($_POST as $value) {

        if (empty(trim($value))) {
            $verif = false;
        }
    }

    // la superglobal $_FILES a un indice "image" qui correspond au "name" de l'input type="file" du formulaire, ainsi qu'un indice "name" qui contient le nom du fichier en cours de téléchargement.

    if (!empty($_FILES['image']['name'])) { // si le nom du fichier en cours de téléchargement n'est pas vide, alors c'est qu'on est entrain de télécharger une photo
        debug($_FILES);

        $image = 'img/' . $_FILES['image']['name']; // $image contient le chemin relatif de la photo et sera enregistré en BDD. On utilise ce chemin pour les "src" des balises <img>.

        copy($_FILES['image']['tmp_name'], '../assets/' . $image);

        // On enregistre le fichier image qui se trouve à l'adresse contenue dans $_FILES['image']['tmp_name'] vers la destination qui est le dossier "img" à l'adresse "../assets/nom_du_fichier.jpg".

    }



    if (!$verif || empty($image)) {


        $info = alert("tout les champs sont requis", "danger");
    } else {




        // 'img/'.$_FILES['image']['name'] NOM
        // $_FILES['image']['type'] TYPE
        // $_FILES['image']['size'] TAILLE
        // $_FILES['image']['tmp-name'] EMPLACEMENT TEMPORAIRE
        // $_FILES['image']['error'] ERREUR SI oui/non l'image a été réceptionné

        if ($_FILES['image']['error'] != 0 ||  $_FILES['images']['size'] == 0 || !isset($_FILES['image']['type'])) {

            $info = alert("L'image n'est pas valide", "danger");
        }

        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $title = isset($_POST['director']) ? $_POST['director'] : null;
        $title = isset($_POST['actors']) ? $_POST['actors'] : null;
        $title = isset($_POST['categories']) ? $_POST['categories'] : null;
        $title = isset($_POST['duration']) ? $_POST['duration'] : null;
        $title = isset($_POST['synopsis']) ? $_POST['synopsis'] : null;
        $title = isset($_POST['date']) ? $_POST['date'] : null;
        $title = isset($_POST['price']) ? $_POST['price'] : null;
        $title = isset($_POST['stock']) ? $_POST['stock'] : null;
        $title = isset($_POST['ageLimit']) ? $_POST['ageLimit'] : null;
    }
}

$title = "Gestion / Films";
require_once "../inc/header.inc.php";
?>
<main class="">


    <h2 class="text-center fw-bolder mb-5 text-danger">Ajouter un film</h2>


    <form action="" method="post" enctype="multipart/form-data" ">
        <!-- l'attribut enctype spécifie que le formulaire envoie des fichiers en plus des données texte => permet d'uploader un fichier (ex photo)-->

        <div class=" row">
        <div class="col-md-6 mb-5">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" class="form-control" value="">
        </div>
        <div class="col-md-6 mb-5">
            <label for="image">Photo</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        </div>



        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="director">Réalisateur</label>
                <input type="text" id="director" name="director" class="form-control" value="">
            </div>
            <div class="col-md-6 mb-5">
                <label for="actors">Acteur(s)</label>
                <input type="text" id="actors" name="actors" class="form-control" placeholder="Séparez les noms d'acteurs avec un /">
            </div>
        </div>


        <div class="row">
            <div class="mb-3">
                <label for="ageLimit" class="form-label">Age limite</label>
                <select multiple name="ageLimit" id="ageLimit" class="form-select form-select-lg">
                    <option value="10">10</option>
                    <option value="13">13</option>
                    <option value="16">16</option>

                </select>
            </div>
        </div>

        <div class="row">
            <label for="category">Genre du film</label>
            <div class="form-check col-sm-12 col-md-4">
                <input type="radio" name="category" id="flexRadioDefault1" value="" class="form-check">
                <label class="form-check-label" for="flexRadioDefault1"></label>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="duration">Durée du film</label>
                <input type="time" class="form-control" id="duration" name="duration" value="">
            </div>
            <div class="col-md-6 mb-5">
                <label for="date">Date de sorti</label>
                <input type="date" class="form-control" id="date" name="date" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="price">Prix</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="price" name="price" aria-label="Euro amount (with dot and two decimal places)" value="">
                    <span class="input-group-text">€</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="form-control" min="0" value="">
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <label for="synopsis">Synopsis</label>
                <textarea type="text" name="synopsis" id="synopsis" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-danger fs-3 w-25 p-3">Ajouter</button>
        </div>
    </form>
</main>






<?php

require_once "../inc/footer.inc.php";
?>