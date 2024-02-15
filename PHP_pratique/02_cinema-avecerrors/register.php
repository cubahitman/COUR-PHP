<?php


require_once "inc/functions.inc.php";

$year1 = ((int) date('Y')) - 12;
$month = (date('m'));
$date = (date('d'));

$dateLimitSup = $year1 . "-" . $month . "-" . $date;

$year2 = ((int) date('Y')) - 100;
$dateLimitInf = $year2 . "-" . $month . "-" . $date;




// debug($_POST);

if (isset($_POST['submit'])) {
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') 

    if (!empty($_POST)) {
        $verif = true;

        foreach ($_POST as  $value) {

            if (empty(trim($empty))) {
                $verif = false;
            }
        }

        if (!$verif) {
            $info = alert("Veuillez renseigner tous les champs", "danger");
        } else {

            // on stocke les values de nos champs dans des variables et en les passant dans la fonction trim()

            $firstName = trim($_POST['firstName']);
            $lastName = trim($_POST['lastName']);
            $pseudo = trim($_POST['pseudo']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $mdp = trim($_POST['mdp']);
            $civility = trim($_POST['civility']);
            $birthday = trim($_POST['birthday']);
            $adress = trim($_POST['adress']);
            $zipCode = trim($_POST['zipCode']);
            $city = trim($_POST['city']);
            $country = trim($_POST['country']);
        }
    }
    if (!isset($firstName) || strlen($firstName) < 2 || preg_match('/[0-9]+/', $lastName)) {
        $info = alert("Le prénom n'est pas valide", "danger");
    }
    if (!isset($lastName) || strlen($lastName) < 2 || preg_match('/[0-9]+/', $lastName)) {
        $info .= alert("Le nom n'est pas valide", "danger");
    }
    if (!isset($pseudo) || strlen($pseudo) < 2) {
        $info .= alert("Le pseudo n'est pas valide", "danger");
    }
    if (!isset($mdp) || strlen($mdp) < 5 || strlen($mdp) > 15) {
        $info .= alert("Le mot de passe n'est pas valide", "danger");
    }
    if (!isset($confirmMdp) || $mdp !== $confirmMdp) {
        $info .= alert("Entrez le même mot de passe", "danger");
    }
    if (isset($email) || strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $info .= alert("L'email n'est pas valide", "danger");
    }
    if (!isset($phone) || !preg_match('#^[0-9]+$#', $phone)) {
        $info .= alert("Le numéro n'est pas valide", "danger");
    }
    if (!isset($civility) || ($civility !== 'f' && $civility !== 'h')) {
        $info .= alert("entrez votre genre", "danger");
    }
    if (!isset($adress) || strlen($adress) < 5 || strlen($adress) > 50) {
        $info .= alert("L'adresse n'est pas valide", "danger");
    }
    if (!isset($zipCode) || !preg_match('#^[0-9]+$#', $zipCode)) {
        $info .= alert("Le code postal n'est pas valide", "danger");
    }
    if (!isset($city) || strlen($city) > 50) {
        $info .= alert("La ville n'est pas valide", "danger");
    }
    if (!isset($country) || strlen($country) < 5 || strlen($country) > 50) {
        $info .= alert("Le pays n'est pas valide", "danger");
    }
    if (!isset($birthday) || ($birthday > $dateLimitSup && $birthday < $dateLimitInf)) {
        $info .= alert("Entrez une date supérieure à 2012", "danger");
    }
};
// if (empty($info)) {

//     $emailExist = checkEmailUser($email);

//     if ($emailExist) {
//         $info = alert("Vous avez deja un compte", "danger");
//     }

//     if ($pseudoExist) {
//         $info = alert("Le pseudo existe deja", "danger");
//     }
// }

// debug($_POST);

// $firstName = $_POST['firstName'];
// $lastName = $_POST['lastName'];
// $pseudo = $_POST['pseudo'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $mdp = $_POST['mdp'];
// $civility = $_POST['civility'];
// $birthday = $_POST['birthday'];
// $adress = $_POST['adress'];
// $zipCode = $_POST['zipCode'];
// $city = $_POST['city'];
// $country = $_POST['country'];

// inscriptionUsers($firstName, $lastName, $pseudo, $email, $phone, $mdp, $civility, $birthday, $adress, $zipCode, $city, $country);


$title = "Inscriptions";
require_once "inc/header.inc.php";



?>

<main style="background: url(assets/img/0y6s5s9b.bmp) no-repeat; background-size:cover; background-size:cover; background-attachment:fixed ">

    <div class="w-75 m-auto p-5" style="background: rgba(20,20,20,0.9);">
        <h2 class="text-center p-3 mb-5">Créer un compte</h2>

        <form action="#" method="post">


            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label for="lastName" class="form-label mb-3">Nom</label>
                    <input type="text" class="form-control fs-5" id="lastName" name="lastName">

                </div>
                <div class="col-md-6 mb-5">
                    <label for="firstName" class="form-label mb-3">Prénom</label>
                    <input type="text" class="form-control fs-5" id="firstName" name="firstName">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 mb-5">
                    <label for="pseudo" class="form-label mb-3">Pseudo</label>
                    <input type="text" class="form-control fs-5" id="pseudo" name="pseudo">
                </div>

                <div class="col-md-4 mb-5">
                    <label for="email" class="form-label mb-3">Email</label>
                    <input type="text" class="form-control fs-5" id="email" name="email" placeholder="email@exemple.com">
                </div>

                <div class="col-md-4 mb-5">
                    <label for="phone" class="form-label mb-3">phone</label>
                    <input type="text" class="form-control fs-5" id="phone" name="phone">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label for="password" class="form-label mb-3">Mot de passe</label>
                    <input type="password" class="form-control fs-5" id="mdp" name="mdp" placeholder="Entrez votre mot de passe">

                </div>
                <div class="col-md-6 mb-5">
                    <label for="confirmMdp" class="form-label mb-3">Confirmation du mot de passe</label>
                    <input type="password" class="form-control fs-5" id="confirmMdp" name="confirmMdp" placeholder="Confirmez votre mot de passe">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label class="form-label mb-3">Civilité</label>
                    <select class="form-select fs-5" name="civility" id="">
                        <option value="h">Homme</option>
                        <option value="f">Femme</option>
                    </select>


                </div>
                <div class="col-md-6 mb-5">
                    <label for="birthday" class="form-label mb-3">Date de naissance</label>
                    <input type="date" class="form-control fs-5" id="birthday" name="birthday">

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 mb-5">
                    <label for="adress" class="form-label mb-3">Adresse</label>
                    <input type="text" class="form-control fs-5" id="adress" name="adress">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="ZipCode" class="form-label mb-3">Code postal</label>
                    <input type="text" class="form-control fs-5" id="zipCode" name="zipCode">
                </div>

                <div class="col-md-5">
                    <label for="city" class="form-label mb-3">Ville</label>
                    <input type="text" class="form-control fs-5" id="city" name="city">
                </div>

                <div class="col-md-4">
                    <label for="country" class="form-label mb-3">Pays</label>
                    <input type="text" class="form-control fs-5" id="country" name="country">
                </div>
            </div>

            <div class="row mt-5">
                <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">S'inscrire</button>
            </div>



        </form>
    </div>


</main>





















<?php
require_once "inc/footer.inc.php";

?>