<?php
require_once('config.php');
$connectionString = "mysql:host=" . _MYSQL_HOST;
if (defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$pdo = NULL;
try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}

$request = $pdo->prepare("select * from user");
$request->execute();
//Récupère toutes les lignes de résultats sous forme d'objets et les stocke dans la variable $users.
$users = $request->fetchAll(PDO::FETCH_OBJ);

// Affichage des résultats dans un tableau HTML
echo '<table border="1">'; //Commence à générer un tableau HTML avec une bordure.
echo '<tr><th>ID</th><th>Nom</th><th>Email</th></tr>';
foreach ($users as $user) {
    echo '<tr>';
    echo '<td>' . $user->id . '</td>';
    echo '<td>' . $user->name . '</td>';
    echo '<td>' . $user->email . '</td>';
    echo '</tr>';
}
echo '</table>';

// Fermeture de la connexion à la base de données
$pdo = null; // Ferme la connexion à la base de données en attribuant null à la variable $pdo.
?>
