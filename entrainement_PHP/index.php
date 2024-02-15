<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training</title>
</head>

<body>
    <form action="/entrainement_PHP/" method="get"></form>
    <label>Nom :</label>
    <input type="text" name="nom">
    <input type="submit" value="Confirmer">
</body>

</html>
<?php

// echo $_GET['var1']; //Atribue la valeur de URL en ecrivant par Exemple: ?var1=valeur1 va afficher valeur1


print_r($_GET); // print_r = function qui affiche un tableau. Exemple: ?var1=valeur1 ?&var2=valeur2 dans URL, va afficher valeur1 et valeur2   Array ( [var1] => valeur1 [?var2] => valeur2 ) 