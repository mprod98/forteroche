# forteroche
Projet de blog destinée à une écrivain du nom de Jean Forteroche.
Celui-ci répond aux exigences demandées pour le projet 4 de la formation Web devellopeur Junior.
L'auteur doit pouvoir éditer son livre par chapitre, et faire partager cela à ses lecteurs.
Il doit pouvoir se connecter à une interface Backend via un login, afin de gérer l'acriture, les modifications, et l'administration du blog.
Les lecteurs doivent pouvoir laisser des commentaires en dessous de chaque chapitre, et peuevnt aussi signaler les commenatires "deviants" à l'admin du site via un bouton signaler.
L'admin doit pouvoir supprimer ou accepter les commentaires via sa console d'adminsitration et ainsi modérer sa communauté.

## Initialisation
1. Une fois le depot cloné renommez le fichier config.php.exemple en config.php et complétez le avec vos infos d'accés bdd.
2. Récuperez le fichier Forteroche script init.sql et importer le dans la table de votre bdd que vous créerez pour l'occasion. Le script sql est opérationnel mais vierge ;-)

### Liste des fichiers et roles.
Les fichiers se décomposent en Modeles Vues Controleur avec un Routeur pour diriger le tout. les fichiers sont rangés dans les dossiers correpondants.
1. Routeur:
Index.php
2. Model:
⋅⋅1. AdminManager.php
⋅⋅2. CommentManager.php
⋅⋅3. Manager.php  *contient la function protégée dbConnect*
⋅⋅4. PostManager.php
3. View (contient deux dossiers, le premier pour le Frontend, le second pour le Backend):
⋅⋅* Backend:
  1. AdminAllPosts.php
  2. AdminchangesPosts.php
  3. AdminIndex.php
  4. AdminNewPost.php
  5. ErrorView.php
  6. template.php
  * Frontend:
  1. Errorview.php
  2. ListPostView.php
  3. PostView.php
  4. template.php 
4. Controller:
  1. backend.php
  2. frontend.php
**Attention toutefois. Le dépot contient aussi un fichier 'vendor/bootsrap' qui n'est là qu'à titre de comprehension pour mon projet. Il vous suffit de placer les liens CDN Bootstrap dans le projet afin de supprimer ce dossier si vous ne souhaitez pas l'héberger sur votre serveur de projet**
