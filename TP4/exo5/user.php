<?php

require_once('config.php'); // faire a la place un require_once(init_pdo dans lequel on fait un requice once init db)

// Définir l'en-tête Content-Type pour indiquer que nous renvoyons du JSON
header("Access-Control-Allow-Origin: *");// * veut dire que les domaine peuvent acceder à l'API elle est public
header("Content-Type: application/json; charset=UTF-8");

// Fetch user by id + fetch all users
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Endpoint GET /user.php/{id} (Récupérer un utilisateur par ID)
        $user_id = $_GET['id'];
        try {
            // Établir la connexion à la base de données
            $pdo = new PDO("mysql:host=" . _MYSQL_HOST . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Exécuter la requête SQL pour récupérer un utilisateur par ID
            $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
            $stmt->execute([$user_id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // L'utilisateur a été trouvé, renvoyez-le au format JSON
                http_response_code(200);
                echo json_encode($user);
            } else {
                // L'utilisateur n'a pas été trouvé
                http_response_code(404); // Not Found
                echo json_encode(['error' => 'Utilisateur non trouvé']);
            }

        } catch (PDOException $erreur) {
            // En cas d'erreur de base de données
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Erreur de base de données: ' . $erreur->getMessage()]);
        }
    } else { // on fetch tout les user si on a pas d'id
        try {
            // Établir la connexion à la base de données
            $pdo = new PDO("mysql:host=" . _MYSQL_HOST . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Exécuter la requête SQL pour récupérer tous les utilisateurs
            $stmt = $pdo->query("SELECT * FROM user");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retourner la liste des utilisateurs au format JSON
            echo json_encode($users);
        } catch (PDOException $erreur) {
            // En cas d'erreur de base de données
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Erreur de base de données: ' . $erreur->getMessage()]);
        }
    }
}





// CREATION d'un user
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Endpoint POST /user.php (Créer un nouvel utilisateur)
    //on regarde dans l'entête de la requête
    $data = json_decode(file_get_contents('php://input'), true); // php://input est un flux PHP spécial qui permet de lire le corps de la requête HTTP POST.

    // Vérifier si les données nécessaires sont présentes
    echo $data['name'], $data['email'];
    if (isset($data['name']) && isset($data['email'])) {
        try {
            // Établir la connexion à la base de données
            $pdo = new PDO("mysql:host=" . _MYSQL_HOST . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Exécuter la requête SQL pour insérer un nouvel utilisateur
            $stmt = $pdo->prepare("INSERT INTO user (name, email) VALUES (?, ?)");
            $stmt->execute([$data['name'], $data['email']]);

            // Renvoyer une réponse 201 Created
            http_response_code(201); // Created
            echo json_encode(['message' => 'Utilisateur créé avec succès']);
        } catch (PDOException $erreur) {
            // En cas d'erreur de base de données
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Erreur de base de données: ' . $erreur->getMessage()]);
        }
    } else {
        // En cas de données manquantes
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Données manquantes ^^']);
    }
}





// Modification d'un user
elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Endpoint PUT /user.php (Mettre à jour un utilisateur)
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['user_id']) && isset($data['new_name']) && isset($data['new_email'])) {
            try {
                // Établir la connexion à la base de données
                $pdo = new PDO("mysql:host=" . _MYSQL_HOST . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Exécuter la requête SQL pour mettre à jour un utilisateur
                $stmt = $pdo->prepare("UPDATE user SET name = ?, email = ? WHERE id = ?");
                $stmt->execute([$data['new_name'], $data['new_email'], $data['user_id']]);

                // Renvoyer une réponse 200 OK
                http_response_code(200); // OK
                echo json_encode(['message' => 'Utilisateur ' . $data['user_id'].' mis à jour avec succès']);
            } catch (PDOException $erreur) {
                // En cas d'erreur de base de données
                http_response_code(500); // Internal Server Error
                echo json_encode(['error' => 'Erreur de base de données: ' . $erreur->getMessage()]);
            }
        } else {
            // En cas de données manquantes
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Données manquantes']);
        }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Endpoint DELETE /user.php (Supprimer un utilisateur)
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['user_id'])) {
        try {
            // Établir la connexion à la base de données
            $pdo = new PDO("mysql:host=" . _MYSQL_HOST . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Exécuter la requête SQL pour supprimer un utilisateur
            $stmt = $pdo->prepare("DELETE FROM user WHERE id = ?");
            $stmt->execute([$data['user_id']]);
            // Renvoyer une réponse 204 No Content (pas de contenu car l'utilisateur est supprimé)
            http_response_code(204); // No Content


        } catch (PDOException $erreur) {
            // En cas d'erreur de base de données
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Erreur de base de données: ' . $erreur->getMessage()]);
        }
    } else {
        // En cas de données manquantes
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Données manquantes']);
    }
}

else {
    // En cas de méthode non autorisée
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Méthode non autorisée']);
}
?>
