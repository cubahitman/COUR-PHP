<?php
$title = 'Les Fontions en PHP';
$titre = 'Les Fontions en PHP';
$paragraphe = 'Les fonctions';
?><?php
        include_once "inc/header.inc.php";
        ?>
<main class="container px-5 border border-dark">
    <div class="row">
        <h2 class="mt-5">1 - Les fonctions prédéfinies </h2>
        <ul>
            <li> Une fonction prédéfine permet de réaliser un traitrement spécifique prédéterminé dans le language PHP</li>
        </ul>
        <div class="col-sm-12 mt-5">
            <h3 class="text-primary text-center mb-5">Les fonctions prédéfinies des chaînes de carcatères </h3>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <!-- https://www.php.net/manual/en/function.rtrim.php -->
                        <li><span>substr()</span> : permet d'extraire une partie d'une chaine de caractère</li>
                        <li><span>strpos()</span>: permet de récuperer la position d'un caractère dans une chaîne de caractère </li>
                        <li><span>strlen()</span> : permet de récupérer la taille d'une chaîne de carctére</li>
                        <li><span>substr_replace()</span> : permet de remplacer un segment de la chaîne</li>
                        <li><span>substr_ireplace()</span>: Version insensible à la casse de str_replace()</li>
                        <li><span>str_contains()</span> : permet de vérifier si la chaîne contient un mot particulier</li>
                        <li><span>str_starts_with()</span> : permet de vérifier si une chaîne commence par une sous-chaîne donnée</li>

                    </ul>
                </div>
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <li><span>str_ends_with()</span> : permet de vérifier si une chaîne se termine par une sous-chaîne donnée</li>
                        <li><span>trim()</span> : permet de supprimer les espaces avant et après une chaîne de caractère </li>
                        <li><span>strtolower()</span> : permet de retourner la chaîne en miniscule</li>
                        <li><span>strtoupper()</span> : permet de retourner la chaîne en majuscules</li>
                        <li><span>ucfirst()</span> : permet de mettre le premier caractère en majuscule. </li>
                        <li><span>lcfirst()</span> : permet de mettre le premier caractère en miniscule. </li>
                    </ul>
                </div>
            </div>

            <?php

            $maChaine = "bonjour j'aime le PHP !!";

            # J'affiche un caractére de la chîne de caractére
            echo $maChaine[3] . '<br>';  // Affiche le letre j

            # Modifier un caractére de la chaîne
            $maChaine[0] = "B";  // je chnage le b ninscule avec un b majuscule
            echo $maChaine . '<br>';

            # Extraire une partie de la chaîne de carctére

            $nvlChaine = substr($maChaine, 0, 9); // cette fonction prend en paramètre la variable, le point de départ et la longueur qu'on souhaite obtenir
            echo $nvlChaine . '<br>';

            //Exercice 
            // Récupérez une partie du texte (de l'indice 0 à l'indice 40) et  remplacer la partie en lever avec ce morceau de code :
            // ...<a href="#"> lire la suite </a>
            $texte = " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi ducimus illum, sequi harum vitae tempore veritatis? Aliquam saepe quia delectus molestiae aut repudiandae expedita autem, dolorem dolorum cum nesciunt dolor.
                    Praesentium eum, molestiae autem quas numquam temporibus et cupiditate corporis quo eos deserunt magni non cum explicabo doloribus, fugiat illum necessitatibus maxime! Similique corporis veniam sunt consequuntur soluta est aliquam?
                    Mollitia, sint incidunt est vero, blanditiis, officiis nostrum quisquam maxime rem sed at neque dolor magni ratione. Veniam, obcaecati. Voluptate consequuntur consectetur provident voluptates ex mollitia, saepe odio necessitatibus voluptas?
                    Facilis, officia illo accusantium libero quidem laborum inventore, eveniet excepturi nobis neque doloremque itaque expedita voluptatum molestias hic quo facere! Aliquam suscipit deserunt perferendis nesciunt illo earum eaque quo excepturi.";
            //Correction
            $partie = substr($texte, 0, 40);

            echo "<p>$partie...<a href=\"#\"> lire la suite </a></p>";

            // /!\ attention: les espaces sont des caractères dans la chaîne et les accents circonflexe sont soncsidérés comme 2 caractéres

            # Récuperer la position d'un caratére dans une chaîne de caractére
            echo 'La position de la lettre H dans ma phrase est : ' . strpos($maChaine, 'H') . '<br>'; // La position 19
            //Attention la fonction est case sensitive elle fait attention à la casse des lettres : si je met la lettre h en miniscule il ne nous affiche rien.
            //  var_dump(strpos($maChaine, 'h'));

            # Récuperer la taille d'une chaîne de caractère

            echo strlen($maChaine) . '<br>';

            #Remplacer une partie de la chaîne
            $maChaine = str_replace('PHP', 'JS', $maChaine); // Les paramètres de la fonction : la chaîne de caractére à changer, la chaîne de caractère qui remplace, et a variable à manipuler
            echo $maChaine . '<br>';
            // Ici aussi la fonction est sensible à la casse on ne change pas la valeur si y'en as une différence entre la valeur cherché et stocké
            // il existe un eautre fonction qui ne fait pas une distinction entre les lettres majuscule et minisculedans la chaîne 
            $maChaine = str_ireplace('bonjour', 'Hello', $maChaine);
            echo $maChaine . '<br>';

            # Varifier si la chaîne contient un mot particulier 

            var_dump(str_contains($maChaine, 'JS')); // les paramètres : la variable qui contient la chaîne et le mot à vérifier dans la chaîne // sensible à la casse 
            // Le résiltat est un boolean true ou false (trouvé ou pas trouvé)

            echo '<br>';
            # Vérifier si la chaîne commence par ce que vous lui passez dans les paramétres

            var_dump(str_starts_with($maChaine, 'Hel'));

            echo '<br>';

            # Vérifier si la chaîne se termine par ce que vous lui passez dans les paramétres
            var_dump(str_ends_with($maChaine, '!'));

            echo '<br>';

            # Supprimer les espaces en début et fin de chaîne
            $testTrim = "   Je suis une phrase avec des espaces au début et à la fin   ";

            echo $testTrim . '<br>';
            echo strlen($testTrim) . '<br>';

            $nouveau = trim($testTrim);
            echo $nouveau  . '<br>';
            echo strlen($nouveau) . '<br>';

            ?>

        </div>

        <div class="col-sm-12 mt-5">
            <h3 class="text-primary text-center mb-5">Les fonctions prédéfinies des tableaux </h3>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <li><span>array_push()</span> : permet d'ajouter plusieurs valeurs à la fin d' un tableau</li>
                        <li class="alert alert-warning">Si on veut ajouter une seule valeur à la fin on utilise la syntaxe : <strong>$tableau[] = valeur_à_ajouter</strong> </li>
                        <li><span>array_unshift</span>: permet d'ajouter une valeur au début d'un tableau</li>
                        <li><span>array_pop</span>: permet de supprimer la dernière valeur d'un tableau</li>
                        <li><span>array_shift</span>: permet de supprimer la première valeur d'un tableau</li>
                        <li><span>unset()</span>: permet de supprimer un élément d'un tableau</li>
                        <li><span>shuffle</span>: permet de mélanger et réorganiser un tableau</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <li><span>array_chunk</span>: permet de déviser un tableau en plusieurs parties et avec un nombre de valeurs à définir</li>
                        <li><span>count() / sizeof()</span> : permet de retourner la taille du tableau passé en paramètre.</li>
                        <li><span>in_array()</span>: permet de vérifier qu'une valeur est présente dans un tableau.</li>
                        <li><span>array_key_exists()</span> : permet de vérifier si une clé existe dans un tableau.</li>
                        <li><span>explode()</span> : permet de transformer une chaîne de caractère en tableau</li>
                        <li><span>implode()</span> : permet de Transformer un tableau en chaîne de caractères.</li>
                        <li><span>array_slice()</span> : permet de récuperer une partie d'un tableau </li>

                    </ul>
                </div>
            </div>

            <?php
            $tableau = ['Rouge', 'Bleu', 'Rose', 'Violet'];
            echo '<pre>';
            var_dump($tableau);
            echo '</pre>';

            # Ajouter des valeurs à la fain
            //array_push($tableau, 'Vert','noir'); // dans les paramétres on met la variable qui contient le tableau ensuite les valeurs à ajouter
            echo '<pre>';
            //var_dump($tableau);
            echo '</pre>';

            # Ajouter des valeurs au début
            //array_unshift($tableau,'Gris', 'Jaune');
            echo '<pre>';
            //var_dump($tableau);
            echo '</pre>';

            # Supprimer la dernière valeur du tableau

            //$valeurSupprimerFin = array_pop($tableau); // Supprime la valeur et je peux la stocker dans une variable 

            echo '<pre>';
            //var_dump($tableau);// tableau après suppressioin de la dernière valeur
            echo '</pre>';
            echo '<pre>';
            //var_dump($valeurSupprimerFin);// La couleur supprimée à la fin du tableau
            echo '</pre>';

            # Supprimer la première valeur du tableau
            //$valeurSupprimerDebut = array_shift($tableau);

            echo '<pre>';
            //var_dump($tableau);// tableau après suppressioin de la première valeur
            echo '</pre>';
            echo '<pre>';
            //var_dump($valeurSupprimerDebut);// La couleur supprimée au début du tableau
            echo '</pre>';

            # Mélanger un tableau

            //shuffle($tableau);
            echo '<pre>';
            //var_dump($tableau);
            echo '</pre>';

            # Diviser un tableau en plusieurs partie
            //$tableau2 = array_chunk($tableau,3, true); // En ajoutant true  dans les paramètres, je garde les même indices au valeurs du tableau d'origine
            echo '<pre>';
            //var_dump($tableau2);
            echo '</pre>';

            # Compter les éléments dans un tableau

            $nbr1 = count($tableau);
            $nbr2 = sizeof($tableau);

            // var_dump($nbr2);

            # Vérifier une valeur dans un tableau

            //$result = in_array('Bleu', $tableau); // cette fonction est sensible à la casse 
            echo '<pre>';
            //var_dump($result);
            echo '</pre>';

            # Vérfifier une clé dans un tableau 
            $result = array_key_exists(2, $tableau);
            echo '<pre>';
            var_dump($result);
            echo '</pre>';

            # Créer un tableau à partir de deux tableaux

            $couleur = ['Rouge', 'Orange', 'Turquoise'];

            $all = [...$tableau, ...$couleur]; // On décompose chacun des tableaux avec l'opérateur de décomposition(...)
            echo '<pre>';
            //var_dump($all);// La variable $all contient le nouveau tableau indéxé créer à partir des deux tableaus 
            echo '</pre>';

            //Je n'aurais pas le m^me résultat avec cette syntaxe

            $all = [$tableau, $couleur];
            echo '<pre>';
            var_dump($all); // resultat: un tableau multidimentsionnel
            echo '</pre>';

            # Transformer une chaîne de caratére en tableau
            $maChaine2 = 'Je me transforme en tableau';
            $chaineEnTableau = explode(' ', $maChaine2); // Le sparamètres : le caractére de séparation dans la chaîne, et la variable de la chaîne à scinder
            echo '<pre>';
            var_dump($chaineEnTableau);
            echo '</pre>';

            # Transformer un tableau en chaîne de caractère

            $monTab = ['Salut', 'je', 'viens', 'du', 'tableau', '!'];
            $tableauEnChaine = implode(' ', $monTab); // Les paramètres : le caractére de séparation dans la chaîne et la variable du tableau à fusionner 
            echo '<pre>';
            var_dump($tableauEnChaine);
            echo '</pre>';
            echo $tableauEnChaine;

            # Récupérer une partie d'un tableau

            $monArray = [
                'a' => 1,
                'b' => 2,
                'c' => 3,
                'd' => 4,
                'e' => 5
            ];

            $nvArray = array_slice($monArray, 1, 2);

            echo '<pre>';
            var_dump($nvArray);
            echo '</pre>';

            ?>
        </div>
        <div class="col-sm-12 mt-5">
            <h3 class="text-primary text-center mb-5">Les fonctions <span>isset()</span> et <span>empty()</span></h3>
            <ul>
                <li class="alert alert-success">Ces fonctions sont utiles lorsque vous souhaitez effectuer une validation de données.</li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="text-success text-center">isset()</h4>
                    <ul>
                        <li>La fonction<span> isset()</span> détermine si une variable existe.</li>
                        <li>La fonction vérifie si la variable est définie, et non NULL </li>
                        <li>La fonction retourne true quand la variable testé est définie ou elle ne contient pas la valeur NULL</li>
                    </ul>

                </div>
                <div class="col-sm-12 col-md-6">
                    <h4 class="text-success text-center">empty()</h4>
                    <ul>
                        <li>La fonction <span>empty()</span> vérifie si une variable est vide.</li>
                        <li>La focntion retourne true si la variable testé est égale à :
                            <ul>
                                <li>"" (une chaîne vide)</li>
                                <li>0 (0 en tant qu'entier)</li>
                                <li>"0" (0 en tant que chaîne de caractères)</li>
                                <li>NULL</li>
                                <li>false</li>
                                <li>array() (un tableau vide)</li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
            <hr>
            <?php

            $var1 = 0;
            $var2 = '';

            if (isset($var1)) { // si true

                echo "\$var1 existe et est non NULL <br>";
            } else {
                echo "\$var1 n'existe pas ou elle est NULL <br>";
            }

            ##################################
            if (empty($var2)) { //true

                echo "\$var2 est vide (0, string vide, NULL, false, non définie) <br>";
            } else {

                echo "\$var2 n'est pas vide<br>";
            }

            // Différence entre isset et empty : si on supprime les déclaration des variables $var1 et $var2 : empty() reste vrai car $var2 n'est pas définie , isset() devient fausse car $var1 n'est pas définie non plus.
            // Utilisation : empty() : pour valider et vérifier qu'un champs de formulaire est rempli. isset() pour vérifier l'existance d'une variable avant de l'utiliser.
            ?>
        </div>
    </div>
    <div class="row">
        <h2 class="mt-5">2 - Les fonctions Utilisateurs </h2>
        <ul>
            <li>Les fonctions utilisateurs sont des morceaux de code écrits dans des accolades et portant un nom.</li>
            <li>On applele une fonction au besoin pour exécuter le code qui s'y trouve .</li>
            <li>Il est d'usage de créer des fonctions pour ne pas se répéter quand on veut exécuter plusieurs fois le même traitement . On parle alors de "factoriser" son code.</li>
        </ul>

        <?php

        function separation()
        { // on déclare une fonction avec le mot clé "function" suivi du nom de la fonction et d'une paire de () qui accueillerons des paramètres ultérieurement

            echo "<hr>";
        }
        separation(); // pour exécuter une fonction (donc le code qui s'y trouve), on l'appelle en écrivant son nom suivi d'une paire de ()

        ////////////////////// Fonctions avec paramétres et return ///////////////////////////////////


        // Fonction sans return

        function bonjour1($prenom, $nom)
        { // $prenom et $nom sont les paramètres de notre fonction. Ils permettent de recevoir une valeur car il s'agit de variables de reception

            echo "<p> Bonjour $prenom $nom ! </p>";
        }
        bonjour1('Julius', 'TOLO'); // si la fonction attend des valeurs  il faut obligatoirement les lui donner. Ces valeurs s'apellent des arguments
        bonjour1('Assia', 'BECHICHI');


        // La même fonction avec return

        function bonjour2($prenom, $nom)
        {

            return "<p> Bonjour $prenom $nom ! </p>"; // return permet de sortir la phrase "Bonjour ..." et de la renvoyer à l'endroit où la fonction est applée

            //Après le return tout les instructions ne sront pas exécuter

        }

        echo bonjour2('César', 'CORTES'); // Ici on met un echo car la fonction nous retourne la phrase mais ne l'affiche pas directement
        echo bonjour2('Malla', 'DOSSO');


        //Ici on peut remplacer les arguments par des variables (provenant d'un formulaire par exemple )
        $prenom1 = 'Issa';
        $nom1 = 'JAFARI';
        echo bonjour2($prenom1, $nom1); // Les deux arguments sont variables et peuvent recevoir n'importe quelle valeur 

        $prenom1 = 'Gwladys';
        $nom1 = 'JACOBIN';
        echo bonjour2($prenom1, $nom1);


        // Exercice : vous écriver une fonction qui multiplie un nombre 1 par un nombre 2 fournis lors de l'appel . cette fonction retourne le résultat de la multiplication . Vous afficher le résultat

        function multiplier($nombre1, $nombre2)
        {
            $resultat = $nombre1 * $nombre2;
            return "<p> Le résultat de la multiplication de la valeur $nombre1 x $nombre2 est égale à : $resultat</p>";
            // return "<p> Le résultat de la multiplication de la valeur $nombre1 * $nombre2 est égale à : " . $nombre1 * $nombre2 . "</p>"; 

        }

        echo  multiplier(200, 5859);
        $nbr1 = 20;
        $nbr2 = 6;

        echo  multiplier($nbr1, $nbr2 = 4); // je réaffecte une nouvelle valeur à ma variable  directement dans les arguments de ma fonction

        //Le résultat de la multiplication de la valeur $nombre1 * $nombre2 est égale à : (la valeur de la multiplication)


        //Fonction avec paramètres optionnel

        // certains paramétres peuvent ne pas être passés. Un evaleur est fournie lors de la dérclaration.
        // Afin de se servir d'un paramètre optionnel il faut utiliser les arguments nommées

        function bonjour3($bonjour = "Salut", $prenom, $nom)
        {
            //Sans les paramétres nommés je suis obligée de mettre le paramétre optionnel à la fin des paramétres dans les () de la fonction  

            echo "<p> $bonjour $prenom $nom</p>";
        }
        bonjour3(prenom: 'Yacine', nom: 'DJEDIDEN', bonjour: 'Hello');

        ?>
    </div>
    <div class="row">
        <h2 class="my-5">3- Portée des variables dans les fonctions</h2>
        <div class="col-sm-12 col-md-4">
            <h3 class="text-primary text-center mb-5">Variable locale</h3>
            <p>Les variables déclarées dans vos scripts ne sont pas accessibles dans vos fonctions et inversement.</p>
            <?php
            define("A", "je suis une constante");
            $a = 5;
            function maFonction()
            {
                echo A; // la constante est appelé à l'exterieur de la fonction et je peux bien récupérer sa valeur de l'intérieur de la fonction
                $b = 3;
                // echo $a; // affiche variable non définie
                echo "<p> La variable \$b  = $b .</p>"; // Affiche 3 : ici nous nous trouvons dans l'espace local de la focntion. cette variable est dite "locale"
            }
            maFonction();

            echo "<p> La variable \$a  = $a .</p>";
            //  echo "<p> La variable \$b  = $b .</p>"; // je demande à afficher la variable $b qui est définie dans la fonction => affiche variable indéfinie : on ne peut pas accéder à cette variable car elle n'est connue que à l'intérieur de la fonction
            ?>
        </div>
        <div class="col-sm-12 col-md-4">
            <h3 class="text-primary text-center mb-5">Variable globale</h3>
            <p>Les variables déclaréses dans vos scripts peuvent être accessible dans vos fonctions à condition d'être déclarées avce le mot clé <span>global</span> dans celles-ci.</p>
            <?php
            $a = 2;
            function maFonction2()
            {
                define("B", "je suis une constante");
                global $a; // permet d'aller chercher la variable à l'éxtérieur de la fonction pour pouvoir l'exploiter à l'intérieur
                $b = 6;
                echo "<p> La variable \$a  = $a .</p>"; // affiche 5
                echo "<p> La variable \$b  = $b .</p>"; // Affiche 3 
                $a = 8;
            }
            maFonction2();

            echo "<p> La variable \$a  = $a .</p>";
            echo B;

            ?>


        </div>
        <div class="col-sm-12 col-md-4">
            <h3 class="text-primary text-center mb-5">Variable static</h3>
            <p>Les variables d'une fonction sont réinitialisées à chaque appel de cette fonction.</p>
            <p>Si l'on veut conserver la valeur précédente, il faut déclarer la variable comme static</p>
            <?php
            function maFonction3()
            {

                static $a = 9;
                $a++;

                echo "<p> La variable \$a  = $a .</p>";
            }
            maFonction3();
            maFonction3();
            maFonction3();

            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2 class="my-5">4- Typage des paramètres dans les fonctions</h2>
            <ul>
                <li>Dans nos fonctions on peut ajouter des contraintes de type sur les arguments et sur les valeurs de retour de fonction</li>
                <li>Le typage permet un débogage du code plus rapide. En effet, si vous ne transmettez pa sle bon type de paramétre à votre fonction, ou si elle ne retourne pas le bon type, une erreur se déclenchera immédiatement au de la fonction. Sinon , vous pourriez avoir une cascades d'erreurs non détéctés et retournant un résultat faux.</li>
            </ul>
            <?php

            function prix(int $val): void
            { // La fonction attends un entier en argument (int $val) et ne retourne rien void

                echo "<p>Cet objet coûte $val euros</p>";
            }
            prix(3); // AFfiche la chîne de caractére avec la subtitution de la variable à l(intérieur)

            // prix('Zaahid'); // l'appel avec une chîne déclenche un TypeError car la fonction attends un nombre entier en paramètre


            //On peut déclarer une union de type en écrivant plusieurs type et en les séparent par des pipes

            function cout(int|string $val): void
            {

                echo "<p>Cet objet coûte $val euros</p>";
            }
            cout(6);
            cout('Zaahid');


            function diviser(int $nbr1, int $nbr2): string
            {

                echo $nbr2 . '<br>';
                echo  $nbr1 / $nbr2 . '<br>';
                return " le résultat de \$nbr1 / \$nbr2 = " . $nbr1 / $nbr2;
            }

            echo diviser(9, 2);

            ?>



        </div>
    </div>




</main>
<?php

include_once "inc/footer.inc.php";
