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

    // Utilisez la fonction file_get_contents pour lire le contenu du fichier SQL
    $sqlFilePath = 'C:\wamp64\www\IDAW\TP4\exo3\sql\create_db.sql'; // /!\  il faut mettre le chemin absolue /!\
    $sqlContent = file_get_contents($sqlFilePath);

    // Exécutez le code SQL contenu dans le fichier
    $pdo->exec($sqlContent);

    echo "La base de données a été initialisée avec succès.";
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}

$pdo = null;
?>

