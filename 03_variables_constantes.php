<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Cours PHP - Les variables et les constantes</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">

</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="01_index.php">Introduction</a>
                    </li>
                    <a class="nav-link" href="02_bases.php">Les bases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="03_variables_constantes.php">Les variables et les constantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="04_conditions.php">Les conditions en PHP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="05_boucles.php">Les boucles en PHP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="06_inclusions.php">Les importations des fichier</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <?php

            echo '<h1>Les variables et les constantes en PHP</h1>';
            ?>
        </section>
    </header><!-- fin header -->

    <main class="container px-5">
        <?php

        echo '<h2> Les variables utilisateurs / affectation / concaténation </h2>';

        $number = 127; // On déclare la variable $number et on lui affecte la valeur 127.
        echo 'Ma variable $number vaut : ' . $number . '<br>'; // je concaténe avec le point (.)
        //Je peux voir le type d'une variable avec la fonction prédéfinie  gettype().

        echo 'Le type de ma variable $number est : ' . gettype($number) . '<br>'; // ici c'est integer

        ###############

        $double = 1.5;
        echo 'Ma variable $double vaut : ' . $double . '<br>';
        echo 'Le type de ma variable $double est : ' . gettype($double) . '<br>'; // ici il s'agit d'un double (nombre à virgule)


        ###############

        $chaine = 'Une chaine de caractère entre simple quotes';
        echo 'Ma variable $chaine vaut : ' . $chaine . '<br>';
        echo 'Le type de ma variable $chaine est : ' . gettype($chaine) . '<br>'; // ici il s'agit d'un string (chaine de carctère)

        ###############

        $chaine1 = "Une chaine de caractère entre double quotes";
        echo 'Ma variable $chaine1 vaut : ' . $chaine1 . '<br>';
        echo 'Le type de ma variable $chaine1 est : ' . gettype($chaine1) . '<br>'; // ici il s'agit d'un string

        ###############

        $chaine2 = "127";
        echo 'Ma variable $chaine2 vaut : ' . $chaine2 . '<br>';
        echo 'Le type de ma variable $chaine2 est : ' . gettype($chaine2) . '<br>'; // ici il s'agit d'un string

        ###############

        $chaine3 = `Une chaine de caractère entre double des backquotes`; // Les backquotes en PHP (https://www.php.net/manual/fr/language.operators.execution.php)
        echo 'Ma variable $chaine3 vaut : ' . $chaine3 . '<br>';
        echo 'Le type de ma variable $chaine3 est : ' . gettype($chaine3) . '<br>'; // ici il s'agit d'un NULL

        ###############

        $boolean = true; // ou false  // Le naviagetur  associe true à 1 et false à vide qui correspond à 0
        echo 'Ma variable $boolean vaut : ' . $boolean . '<br>';
        echo 'Le type de ma variable $boolean est : ' . gettype($boolean) . '<br>'; // ici il s'agit d'un boolean( booléen) : permet de savoir si quelque chose est vrai ou faux


        #####################################

        // Concaténation,  affectation et affectation comninées avec l'opérateur " .= " pour les chaines de caractère

        $prenom = 'Nicolas ';
        $prenom .= 'Thomas '; // On ajoute la valeur "THomas" à la valeur "Nicolas" SANS la remplacer gràce à l'opérateur ".=" 
        // echo $prenom;

        echo '<p>Bonjour ' . $prenom . '</p>';
        echo "<p> Bonjour $prenom </p>"; // affiche "Bonjour Nicolas Thomas". ici j'utilise les doubles quotes, je n'ai pas besoins de concaténer avec le point(.), dans les guillemets la variable est évaluée: c'est son contenu qui est affiché, c'est ce que l'on appelle la substitution de variable.
        $age = 30;
        echo '<p>Bonjour ' . $prenom . 'tu as ' . $age . ' ans.</p>';
        echo "<p>Bonjour $prenom tu as $age ans. </p>";
        echo 'Bonjour $prenom'; // Dans des quotes simple, $prnom est considéré comme une chaine de caractère brute: on l'ffiche littéralement.

        ##############
        //échappement des apostrophes

        $message = "aujourd'hui";
        $message = 'aujourd\'hui'; // on échappe les apostrophe quand on écrit dans les quotes simples avec "\".

        //Exercice : Vous afficher Bleu-Blanc-Rouge  en mettant le texte de chaque couleur dans des variables
        //Correction :


        $bleu = 'Bleu-';
        $vert = 'Vert-';
        $rouge = 'Rouge';

        // 1-
        echo "<p><span class=\"bleu\">$bleu</span><span class=\"vert\">$vert</span> <span class=\"rouge\">$rouge</span></p>";
        // 2-
        echo "<p><span class='text-primary'>$bleu</span> <span class='text-success'>$vert</span> <span class='text-danger'>$rouge</span></p>";
        // 3-
        echo '<span style="color:blue">' . $bleu . '</span> ' . '<span style="color:green">' . $vert . '</span> ' . '<span style="color:red">' . $rouge . '</span>';
        // 4-
        echo "<p> <span class='bleu'>$bleu<span>  <span class='vert'>$vert<span>  <span class='rouge'>$rouge<span> </p>";
        // 5
        $bleu1 = '<span style="color: blue">bleu-</span>';
        $vert1 = '<span style="color: green">vert-</span>';
        $rouge1 = '<span style="color: red">rouge</span>';

        echo $bleu1 . $vert1 . $rouge1;
        // 6

        $bleu = "blue";
        $blanc = "white";
        $rouge = "red";

        echo "<div class='d-flex justify-content-center bg-dark p-5 m-auto m-5 rounded' style='width: 40%;'>
              <div class='bg-primary text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $bleu
              </div>
              <div class='bg-$blanc text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $blanc
              </div>
              <div class='bg-danger text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $rouge
              </div>
          </div>";



        echo '<h2 class="mt-5"> Opérateurs numérique </h2>';
        $a = 10;
        $b = 2;
        //10   //2
        echo  "$a + $b = " . $a + $b . "<br>"; // affiche 12  
        echo " $a - $b = " . $a - $b . "<br>"; // affiche 8
        echo " $a * $b = " . $a * $b . "<br>"; // affiche 20
        echo " $a / $b = " . $a / $b . "<br>"; // affiche 5
        echo " $a % $b = " . $a % $b . "<br>"; // affiche 0 


        // Les opérateur d'affectation combiné pour les valeurs numèriques

        $a += $b; // équivaut à $a = $a + $b soit $a = 10 +2 // => 12

        echo $a; // 12
        echo "<br>";
        $a -= $b; // $a = $a -$b soit $a = 12 - 2 //=> 10
        echo $a;
        // il existe aussi les opérateur *= /= et %=

        ############

        //Incrémenter et décrémenter
        echo "<br>";
        $i = 0;
        $i++; // $i = $i + 1;

        echo $i;
        echo "<br>";
        $i--; // $i = $i - 1;

        echo $i;


        echo '<h2 class="mt-5"> Les variables prédéfinies : super-globale </h2>';

        echo $_SERVER["HTTP_HOST"];
        echo '<pre>';
        // var_dump($_SERVER);
        echo '</pre>';
        // Je veux afficher le contenu de ma super_global  $_SERVER["HTTP_HOST"] dans une chaine de caractère: 
        $message = " Le nom du domaine à partir duquel j'affiche ma page c'est : <strong> {$_SERVER["HTTP_HOST"]}</strong> <br>";
        // $message = " Le nom du domaine à partir duquel j'affiche ma page c'est : <strong> $_SERVER[HTTP_HOST]</strong> <br>";
        echo $message; // J'utilise les accolades pour intégrer ma variable $_SERVER["HTTP_HOST"]  dans une chaine de caractère



        /**
         * Si je veux afficher les contenu d'une variable et qu'elle soit collé à une chaine de caractère; ex: je veux afficher :
         * Aujourd'hui il fait 32°c !!
         *  ici le 32 et °c sont collés pour le faire en utilisant le mécanisme de substitution des variables il faut mettre  la variable entre accolades
         */
        $degre = 32;
        $phrase = '<p> Aujourd\'hui il fait ' . $degre . '°C !! </p>';
        //  $phrase = "<p> Aujourd\'hui il fait $degre °C !! </p>";

        echo $phrase;
        $phrase2 = "<p> Aujourd'hui il fait {$degre}°C !! </p>";
        echo $phrase2;


        echo '<h2 class="mt-5"> Transtypage des variables </h2>';
        $string1 = (int)'100';
        var_dump($string1); //affiche 100 avec type integer
        //  echo $string1;
        //  echo gettype($string1);
        $string2 = (float)'12.5';
        var_dump($string2); // affiche 12.5 avec type float
        $string3 = (int)'12.5';
        var_dump($string3); // affiche 12 avec type integer
        echo "<br>";
        $string = '150';
        echo $string;
        echo "<br>";
        echo gettype($string);
        echo "<br>";
        $entier = (int)$string;
        echo $entier;
        echo "<br>";
        echo gettype($entier);






        echo "<br>";
        ###########
        echo '<h2 class="mt-5"> Constante utilisateurs </h2>';

        # Avec la fonction prédéfinie define()

        // le nom de la constante : "CHAINE", la valeur de la constante : "la valeur de la constante CHAINE";

        define('CHAINE', 'la valeur de la constante CHAINE');
        echo CHAINE . '<br>';
        define('ENTIER', 30);
        //  define('ENTIER', '30');
        echo ENTIER . '<br>';
        echo gettype(ENTIER) . '<br>';

        //je récupère la valeur de  ma constante dans une chaine de caractère
        echo "J'ai ENTIER ans <br>"; // Pas d'interprétation de la constante ENTIER et l'affichage de son valeur
        echo "J'ai " . ENTIER . " ans <br>"; // Avec les constantes on ne peut pas utiliser le mécanispe de la subtitution des variables

        # Constante avec le mot réservé const
        //Avec const, il est possible de définir la valeur de la constante en utilisant une expression scalaire  qui  contient d'autres constantes.

        // Le nombre d'heure mensuel = Temps hebdomadaire X 52 semaines / 12 mois (soit 35X52/12 = 151.67h par mois)

        const SEMAINES_PAR_AN = 52;
        const HEURES_HEBDOMADAIRE = 35;
        const NBR_MOIS_ANNEE = 12;

        const HEURES_MENSUEL = HEURES_HEBDOMADAIRE * SEMAINES_PAR_AN / NBR_MOIS_ANNEE;
        echo HEURES_MENSUEL . '<br>';
        // Avec ses expression on ne peut pas appelé des fonctions
        //  const NBR_AU_PIF = rand(1,10);
        define('NBR_AU_PIF', rand(1, 10));
        echo NBR_AU_PIF . '<br>';


        echo '<h2 class="mt-5"> Constantes prédéfinies / Magiques </h2>';
        echo PHP_VERSION;
        echo '<br>';
        echo PHP_MAJOR_VERSION;
        echo '<br>';
        // phpinfo();


        echo __LINE__;
        echo __DIR__;











        ?>










    </main>
    <footer>
        <div class="d-flex justify-content-evenly align-items-center bg-dark text-white p-3">
            <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/langref.php">Doc PHP</a>
            <a class="nav-link" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
            <a class="nav-link" target="_blank" href="https://devdocs.io/php/">DevDocs</a>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>