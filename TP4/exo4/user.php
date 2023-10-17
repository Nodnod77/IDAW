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
// mon code se repète trop, -> penser à faire des fonctions d'affichage
// Action de Création (Create)
if (isset($_POST['create'])) { // create est le name='create' du <button>
    $name = $_POST['name']; // name est le name ='name' de l'<input> email
    $email = $_POST['email'];  // email est le name ='email' de l'<input> email
    $insert = $pdo->prepare("INSERT INTO user (name, email) VALUES (?, ?)");
    $insert->execute([$name, $email]);
}

// Action de Mise à jour (Update)
if (isset($_POST['update'])) {

    $userId = $_POST['user_id'];
    $name = $_POST['new_name'];
    $email = $_POST['new_email'];
    $update = $pdo->prepare("UPDATE user SET name = ?, email = ? WHERE id = ?"); // ? marque le paramètre qui est mis après dans execute
    $update->execute([$name, $email, $userId]); // ne pas oublier de passer les paramètres
}

// Action de Suppression (Delete)
if (isset($_POST['delete'])) {
    $userId = $_POST['user_id'];
    $delete = $pdo->prepare("DELETE FROM user WHERE id = ?");
    $delete->execute([$userId]);
}

$request = $pdo->prepare("SELECT * FROM user");
$request->execute();
/*
Le mode PDO::FETCH_OBJ est l'une des constantes possibles que vous pouvez utiliser avec la méthode fetchAll() de PDO
 pour spécifier comment vous souhaitez que les résultats de votre requête soient récupérés.

Lorsque vous utilisez PDO::FETCH_OBJ, cela signifie que vous récupérez chaque ligne de résultat sous forme d'objet.
 Chaque colonne de la ligne est représentée en tant que propriété de cet objet, où le nom de la propriété correspond au
 nom de la colonne dans le résultat de la requête.
*/
$users = $request->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Utilisateurs</title>
</head>
<body>
<h1>Gestion des Utilisateurs</h1>

<!-- Formulaire d'ajout d'utilisateur -->
<form method="POST">
    <h2>Ajouter un nouvel utilisateur</h2>
    <label for="name">Nom :</label>
    <input type="text" name="name" required>
    <label for="email">Email :</label>
    <input type="email" name="email" required>
    <button type="submit" name="create">Ajouter</button>
</form>

<!-- Tableau des utilisateurs -->
<h2>Liste des utilisateurs</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->name; ?></td>
            <td><?php echo $user->email; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                    <input type="text" name="new_name" placeholder="Nouveau nom" required>
                    <input type="email" name="new_email" placeholder="Nouveau email" required>
                    <button type="submit" name="update">Modifier</button>
                </form>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                    <button type="submit" name="delete">Supprimer</button>
                </form>

            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
