<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premier site en PHP : site avec la BDD entreprise">
    <meta name="author" content="Sahar ferchichi">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>CRUD - entreprise</title>
</head>

<body>
    <header>
        <div class="p-5 mb-4" style="background-color: #EEA545">
            <section class="container py-5">
                <h1 class="fw-bold">CRUD</h1>
                <p class="col-md-8 fs-4">Dans cette page on vas réaliser un CRUD complet, on va utiliser la BDD entreprise</p>

            </section>

        </div>
    </header>
    <main class="container">
        <?php
        function debug($var)
        {
            echo '<pre class= "border border-dark bg-light text-primary w-50 p-3 ">';
            var_dump($var);
            echo '</pre>';
        };


        ?>

        <h2 class="text-danger my=5">1- Connexion à la BDD</h2>


        <?php

        ////////////////////////////Connexion à la BDD//////////
        /**
         * *On vas utiliser l'extension PHP Data Object (PDO), elle définit une exellente interface pour acceder à une base de données depuis PHP et  d'executer des requetes SQL.
         * Pour  se connecter à la BDD avec PDO, il faut créer une instance de cet Objet (PDO) qui représente une connexion à la BDD, pour cela il faut se servir du constructeur de la clase
         * Le constructeur demande certains paramétres
         */

        //$pdo = new PDO("mysql:host=localhost; dbname=entreprise;charset=utf8", "root", "");
        // On declare des constantes d'environnement qui vont contenir les informations à la connexion à la  BDD

        // Constante de serveur => Localhost
        define("DBHOST", "localhost");
        // Constante de l'utilisateur de la BDD du serveur local => root
        define('DBUSER', 'root');
        // Constante pour le mot passe de serveur en local => pas de mot passe
        define("DBPASS", "");
        //Constante pour le nom de la BDD
        define("DBNAME", "entreprise");

        // DSN (data Source Name)
        $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

        try { // dans le try on va instancier PDO, c'est créer un objet de la class PDO

            $pdo = new PDO($dsn, DBUSER, DBPASS);



            // On définit le mode d'erreur de PDO sur Exeption
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


            // $methods = get_class_methods('PDO');

            // debug($methods);

            echo "Je suis conectée";
        } catch (PDOException $e) {   // PDOException est une classe qui représente une erreur émise pas PDO et $e c'est l'objet de la classe en question qui vas stocker cette erreur;

            die($e->getMessage()); // die permet  d'arrêter le PHP et d'afficher une erreur en utilisant  la methode getMessage  de l'objet $e


        } // le catch sera execute dés lors on auras un probléme dans le try



        ?>

        <h2 class="text-danger my-5">2- Requéte d'insertion</h2>

        <?php
        ////////////////// Requéte d'insertion ///////////////////////////////

        // On va insérer un employé en BDD : La méthode exec() éxecute une requête  SQL et re

        // $request = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire)VALUE('Assia', 'Bechichi', 'f' , 'informatique','2024-01-25', 3200)");

        // debug($request);

        // echo "Employe Assia est bien inserer dans la BDD";
        ?>


        <h2 class="text-danger my-5">3- Requete de suppression</h2>

        <?php
        /////////////////////Requete de suppression/////////////////////
        //supprimer Assia de la BB

        // $request = $pdo->exec("DELETE FROM employes WHERE prenom = 'Assia'");
        // echo "Employe Assia est bien suprime de la BDD entreprise";
        // 
        ?>

        <h2 class="text-danger my-5">4- Requete d'affichage et Recuperation</h2>
        <?php
        ///////////////Requete d'affichage///////////////

        // On va utiliser la méthode query() : au contraire d' exec(), query() est utilisé pour faire des requétes qui retournent un ou plusieurs résultats : SELECT. On peut aussi l'utiliser avec INSERT, DELETE, UPDATE

        /**
         * Valeur de retour ;
         *      succés : query() retourne un nouvel objet de la classe PDOStatement 
         *      echec : False 
         */

        ////////////// Récuperation et affichage d'une seul donnée de la BDD //////////////////

        // On va selectionner les informations de l'employé "Daniel"

        $request = $pdo->query("SELECT * FROM employes WHERE prenom LIKE 'Daniel'");

        debug($request);

        debug($request->rowCount());

        $employe = $request->fetch(PDO::FETCH_ASSOC);

        debug($employe);

        echo "<p class= 'alert alert-secondary'>Je suis {$employe['prenom']} {$employe['nom']} du service {$employe['service']}</P>";


        //Exercice :
        //afficher L'employè dont l'id_employé est 417


        $request = $pdo->query("SELECT * FROM employes WHERE id_employes LIKE 417");

        $employe = $request->fetch(); // Ont n'es pas obligé d'ajouter PDO::FETCH_ASSOC car ce ajoute deja dans le cashe


        debug($request->rowCount());

        debug($request);

        debug($employe);

        echo "<p class= 'alert alert-secondary'>Je suis {$employe['prenom']} {$employe['nom']} du service {$employe['service']}</P>";


        /////////////////////////Recupération et affichage de plusiers données de la BDD           //////////////////////

        $request = $pdo->query("SELECT * FROM employes");
        // debug($request->rowCount());
        // $employes = $request->fetch();
        echo '<div class = "row">';
        while ($employes = $request->fetch()) {
            echo '<div class="col-sm-12 col-md-3">';
            echo "<div>id : $employes[id_employes]</div>";
            echo "<div>Nom et prénom : $employes[nom] $employes[prenom]</div>";
            echo "<div>id_Le service : $employes[service]</div>";
            echo "<div>le salaire : $employes[salaire]<hr></div>";
            echo "</div>";
        };


        echo '</div>';

        // Exersice :
        //Afficher la liste des différents services dans une liste, en mettant un service par  <li>

        $request = $pdo->query("SELECT DISTINCT service FROM employes ORDER BY prenom ASC");
        while ($employes = $request->fetch()) {

            echo "<ul><li><div>Le service : $employes[service]</div>";
            "</ul>";
        }
        // debug($request->rowCount());
        // $employes = $request->fetch();



        ?>
    </main>
    <footer style=" background-color : #EEA545;">
        <div class="container">
            <hr>
            <div class="row text-center">
                <div class="col-12">
                    <p> &copy; Entreprise - <?= date('Y') ?></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>