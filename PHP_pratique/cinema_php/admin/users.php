<?php

require_once "../inc/functions.inc.php";


if (!isset($_SESSION['user'])) {

    header("location:" . RACINE_SITE . "authentification.php");
} else {
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
        header("location:" . RACINE_SITE . "index.php");
    }
}

$title = "Users";
require_once "../inc/header.inc.php"

?>

<div class="d-flex flex-column m-auto mt-5 table-responsive">
    <h2 class="text-center fw-bolder mb-5 text-danger">Liste des utilisateurs</h2>

    <table class="table table-dark table-bordered mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Civility</th>
                <th>Address</th>
                <th>ZipCode</th>
                <th>City</th>
                <th>Country</th>
                <th>Rôle</th>
                <th>Suprimer</th>
                <th>Modifier le rôle</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $users = allUsers();

            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?= $user['id_user'] ?></td>
                    <td><?= ucfirst($user['firstName']) ?></td>
                    <td><?= ucfirst($user['lastName']) ?></td>
                    <td><?= $user['pseudo'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['civility'] ?></td>
                    <td><?= $user['address'] ?></td>
                    <td><?= $user['zipCode'] ?></td>
                    <td><?= $user['city'] ?></td>
                    <td><?= $user['country'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php

require_once "../inc/footer.inc.php"

?>