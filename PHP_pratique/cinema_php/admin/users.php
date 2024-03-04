<?php
require_once "../inc/header.inc.php"
?>

<div>
    <h2>Liste des utilisateurs</h2>

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
                    <td><?= $user['id_users'] ?></td>
                    <td><?= $user['firstName'] ?></td>
                    <td><?= $user['lastName'] ?></td>
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