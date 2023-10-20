# IDAW

TP5 - Info sur l'API web du TP5 exo 5

Les requêtes possibles sont :

1. Requête GET pour afficher tous les users :
    paramètres : aucun
    endpoint : http://localhost/IDAW/TP4/exo5/user.php
   exemple de réponse (réponse en format JSON) Http OK 200:
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
   },
   ] 

2. Requête GET pour afficher un user via son id :
   paramètre : id 
   endpoint : http://localhost/IDAW/TP4/exo5/user.php?id=20
   exemple de réponse (réponse en format JSON) http OK 200:
   {
   "id": "20",
   "name": "newnew_name",
   "email": "new_email@new_email.com"
   }

3. Requête POST pour crééer un nouveau user :
    paramètres (sous format JSON): new_name, new_email 
 exemple :
    {
   "name": "!!!!!!!!!!!!!!!!!!!!!!!!!",
   "email": "taah@ccc"
   }
    endpoint :http://localhost/IDAW/TP4/exo5/user.php
    exemple de réponse (sous format JSON) :
   {
   "message": "Utilisateur créé avec succès"
   }

4. requête PUT pour modifier un user :
   paramètres (sous format JSON): user_id,new_name, new_email
   exemple :
   {
    "user_id": 20
   "name": "nameExemple!",
   "email": "taah@ccc"
   }
   endpoint :http://localhost/IDAW/TP4/exo5/user.php
   exemple de réponse (sous format JSON) :
   {
   "message": "Utilisateur 20 mis à jour avec succès"
   }

5. requête DELETE pour supprimer un user :
   paramètres (sous format JSON): user_id
   exemple :
   {
   "user_id": 20
   }
   endpoint :http://localhost/IDAW/TP4/exo5/user.php
 réponse : 204 HHTP No content
   