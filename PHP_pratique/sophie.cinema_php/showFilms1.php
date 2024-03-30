<?php

require_once "inc/functions.inc.php";







if (isset($_GET) && !empty($_GET)) {
    if (isset($_GET['id_film']))
        $films = showFilm($_GET['id_film']);
}

// if (isset($_GET) && !empty($_GET)) {
//     if (isset($_GET['id_category'])) {
//         // $message = "films à vous proposer dans cette categorie";
//         $films = filmByCategory($_GET['id_category']);

//         if (count($films) == 0) {
//             $info = alert("Aucun film dans cette categorie", "danger");
//         }
//     }
// }
if (isset($_GET['action']) && isset($_GET['id_category'])) {

    if (!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_category'])) {

        $idCategory = $_GET['id_category'];
        $category = showCategory($idCategory);
    }
}
// $categories = allCategories();


$title = $films['title'];
require_once "inc/header.inc.php";


?>

<main class="mt-5">

    <div class="film bg-dark">

        <div class="back">
            <a href=""><i class="bi bi-arrow-left-circle-fill"></i></a>
        </div>
        <div class="cardDetails row mt-5">
            <h2 class="text-center mb-5"></h2>
            <div class="col-12 col-xl-5 row p-5">
                <img src="<?= RACINE_SITE . "assets/img/" . $films['image'] ?>" alt="Affiche du film">
                <div class="col-12 mt-5">
                    <form action="panier.php" method="POST" enctype="multipart/form-data" class="w-50 m-auto row justify-content-center p-5">

                        <input type="hidden" name="id_film" value="<?= $film['id_film'] ?>">
                        <input type="hidden" name="title" value="<?= $film['title'] ?>">
                        <input type="hidden" name="price" value="<?= $film['price'] ?>">
                        <input type="hidden" name="stock" value="<?= $film['stock'] ?>">
                        <input type="hidden" name="image" value="<?= $film['image'] ?>">
                        <select name="quantity" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">


                            <option value="">stock</option>


                        </select>

                        <input class="btn btn-outline-danger mt-3 w-100" type="submit" value="Ajouter au panier" name="ajout_panier" id="addCart">

                    </form>
                </div>

            </div>
            <div class="detailsContent  col-md-7 p-5">
                <div class="container mt-5">
                    <div class="row">
                        <h3 class="col-4"><span>Realisateur :</span></h3>
                        <ul class="col-8">
                            <li><?= $films['director'] ?></li>

                        </ul>
                        <hr>
                    </div>
                    <div class="row">
                        <h3 class="col-4"><span>Acteur :</span></h3>
                        <ul class="col-8">

                            <li><?= $films['actors'] ?></li>
                            <li></li>
                            <li></li>


                        </ul>
                        <hr>
                    </div>
                    <div class="row">
                        <h3 class="col-4"><span>Àge limite :</span></h3>
                        <ul class="col-8">
                            <li><?= $films['ageLimit'] ?></li>


                        </ul>
                        <hr>
                    </div>
                    <div class="row">
                        <h3 class="col-4"><span>Genre : </span></h3>
                        <ul class="col-8">
                            <li><?= $films['genre'] ?></li>

                        </ul>
                        <hr>
                    </div>
                    <div class="row">
                        <h3 class="col-4"><span>Durée : </span></h3>
                        <ul class="col-8">
                            <li><?= $films['duration'] ?></li>


                        </ul>
                        <hr>
                    </div>
                    <div class="row">
                        <h3 class="col-4"><span>Date de sortie:</span></h3>
                        <ul class="col-8">
                            <li><?= $films['date'] ?></li>

                        </ul>
                        <hr>
                    </div>
                    <div class="row">
                        <h3 class="col-4"><span>Prix : </span></h3>
                        <ul class="col-8">
                            <li><?= $films['price'] ?></li>

                        </ul>
                        <hr>
                    </div>
                    <div class="row">
                        <h3 class="col-4"><span>Stock :</span> </h3>
                        <ul class="col-8">
                            <li><?= $films['stock'] ?></li>

                        </ul>
                        <hr>
                    </div>
                    <div class="row">
                        <h5 class="col-4"><span>Synopsis :</span></h5>
                        <ul class="col-8">
                            <li><?= $films['synopsis'] ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>



<?php
require_once "inc/footer.inc.php";


?>