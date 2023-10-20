
# API Web TP5 Exo 5 - Info

Cette API Web permet de gérer des utilisateurs avec des opérations de base (CRUD), telles que l'affichage de tous les utilisateurs, l'affichage d'un utilisateur par ID, la création d'un nouvel utilisateur, la mise à jour d'un utilisateur et la suppression d'un utilisateur.

## Requêtes Possibles

### 1. Afficher tous les utilisateurs

- **Méthode HTTP**: GET
- **Paramètres**: Aucun
- **Endpoint**:[http://localhost/IDAW/TP4/exo5/user.php](http://localhost/IDAW/TP4/exo5/user.php)
- **Réponse Statut HTTP**: 200 HTTP OK
- **Exemple de Réponse (JSON)**:
   ```json
   [
       {
           "id": "20",
           "name": "newnew_name",
           "email": "new_email@new_email.com"
       },
       {
           "id": "18",
           "name": "nom2",
           "email": "taah@ccc"
       }
   ]
   ```

### 2. Afficher un utilisateur par ID

- **Méthode HTTP**: GET
- **Paramètres**: `id`
- **Endpoint**: [http://localhost/IDAW/TP4/exo5/user.php?id=20](http://localhost/IDAW/TP4/exo5/user.php?id=20)
- **Réponse Statut HTTP**: 200 HTTP OK
- **Exemple de Réponse (JSON)**:
   ```json
   {
       "id": "20",
       "name": "newnew_name",
       "email": "new_email@new_email.com"
   }
   ```

### 3. Créer un nouvel utilisateur

- **Méthode HTTP**: POST
- **Paramètres (format JSON)**:
   ```json
   {
       "name": "!!!!!!!!!!!!!!!!!!!!!!!!!",
       "email": "taah@ccc"
   }
   ```
- **Endpoint**: (http://localhost/IDAW/TP4/exo5/user.php)
- **Réponse Statut HTTP**: 201 HTTP CREATED
- **Exemple de Réponse (JSON)**:
   ```json
   {
       "message": "Utilisateur créé avec succès"
   }
   ```

### 4. Mettre à jour un utilisateur

- **Méthode HTTP**: PUT
- **Paramètres (format JSON)**:
   ```json
   {
       "user_id": 20,
       "name": "nameExemple!",
       "email": "taah@ccc"
   }
   ```
- **Endpoint**: [http://localhost/IDAW/TP4/exo5/user.php](http://localhost/IDAW/TP4/exo5/user.php)
- **Réponse Statut HTTP**: 200 HTTP OK
- **Exemple de Réponse (JSON)**:
   ```json
   {
       "message": "Utilisateur 20 mis à jour avec succès"
   }
   ```

### 5. Supprimer un utilisateur

- **Méthode HTTP**: DELETE
- **Paramètres (format JSON)**:
   ```json
   {
       "user_id": 20
   }
   ```
- **Endpoint**: [http://localhost/IDAW/TP4/exo5/user.php](http://localhost/IDAW/TP4/exo5/user.php)
- **Réponse Statut HTTP**: 204 HTTP No Content



