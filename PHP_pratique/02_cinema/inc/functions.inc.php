<!-- Ficher qui contient les fonctions php àutiliser dans notre similar_text -->
<?php
session_start();


//////////Fonction de débugage/////////////////////////

function debug($var)
{
    echo '<pre class= "border border-dark bg-light text-primary w-50 p-3 ">';

    var_dump($var);

    echo '</pre>';
}



/////////////// Fonction de connecxion à la BDD//////////////////////////////

/**
 * On va utiliser l'extension PHP Data Object (PDO), elle définit une excellente interface pour accéder à une base de données depuis PHP et d'éxécuter des requêtes SQL.
 * pour se connecter à la BDD avec PDO, il fault crée une instance de cette Class/Objet (PDO) qui représente une connexion à la BDD. 
 */

// On déclare des constantes d'environnment qui vont contenir les infomations à la connexion à la BDD
// Constante du serveur => locahost
define("DBHOST", "localhost");

// Constante de l'utilisateur de la BDD  du serveur en local => root
define("DBUSER", "root");

// Constante pour le mot de passe de serveur en local => pas de mot de passe
define("DBPASS", "");

// Constante pour le nom de la BDD
define("DBNAME", "cinema");


function connexionBdd()
{

    //Sans la variable $dsn et sans le constantes, on se connecte à la BDD:

    // $pdo = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

    // DSN (Data Source Name) et les constantes
    //avec la variable DSN 

    // $dsn = "mysql:host=localhost;dbname=cinema;charset=utf8";

    $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    try {
        $pdo = new PDO($dsn, DBUSER, DBPASS);

        //On définit le mode d'erreur de PDO sur Exception

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    return $pdo;
}

//    connexionBdd();

/////////////////////// Une function pour créer la table users /////////

function createTableUsers()
{
    $pdo = connexionBdd();

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id_user INT PRIMARY KEY AUTO_INCREMENT, 
        firstName VARCHAR(50) NOT NULL,
        lastName VARCHAR(50) NOT NULL,
        pseduo VARCHAR (50) NOT NULL,
        email VARCHAR (100) NOT NULL,
        mdp VARCHAR (255) NOT NULL,
        phone VARCHAR (30) NOT NULL,
        civility ENUM ('f', 'h') NOT NULL,
        bithday DATE NOT NULL,
        address VARCHAR (50) NOT NULL,
        zipCode VARCHAR (50) NOT NULL,
        city VARCHAR (50) NOT NULL,
        country VARCHAR (50) NOT NULL,
        role ENUM ('ROLE_USER', 'ROLE_ADMIN') DEFAULT 'ROLE_USER'
    )";

    $request = $pdo->exec($sql);
}
// createTableUsers();


// <<<<<<<<<<<<<Function pour creer la table film>>>>>>>>>>>>>>>>>>>>>>>>>>>

function createTableFilms()
{
    $pdo = connexionBdd();


    $sql = " CREATE TABLE IF NOT EXISTS films (
         id_film INT PRIMARY KEY AUTO_INCREMENT,
         category_id INT NOT NULL,
         title VARCHAR(100) NOT NULL,
         director VARCHAR(100) NOT NULL,
         actors VARCHAR(100) NOT NULL,
         ageLimit VARCHAR(5)  NULL,
         duration TIME NOT NULL,
         synopsis TEXT NOT NULL,
         date DATE NOT NULL,
         image VARCHAR(255) NOT NULL,
         price FLOAT NOT NULL,
         stock INT NOT NULL

         )";

    $request = $pdo->exec($sql);
}
// createTableFilms();

function createTablecategories()
{
    $pdo = connexionBdd();

    $sql = "CREATE TABLE IF NOT EXISTS categories (
        id_category INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        description TEXT NULL
    )";
    $request = $pdo->exec($sql);
}
// createTablecategories();



// <<<<<<<<<<<<<<<<Une fonction pour la création des clés étrangeres >>>>>>>>>>>>>>

//    $tableF : table ou on va créer la clé étrangere
//    $tableP  ; table a partir  de lequelle on recupere la clé primaire
//    $foreign : Le nom de  la clé étrangere 
//    $primary : le nom de la clé primaire

function foreignKey(string $tableF, string $foreign, string $tableP, string $primary)
{
    $pdo = connexionBdd();



    $sql = "ALTER TABLE $tableF ADD CONSTRAINT FOREIGN KEY ($foreign) REFERENCES $tableP($primary)";

    $request = $pdo->exec($sql);
}

//  <<<<<<<<<<<<<<<<<Creation de la clef etrangere dans la table films 
// foreignKey('films', 'category_id', 'categories', 'id_category');



?>