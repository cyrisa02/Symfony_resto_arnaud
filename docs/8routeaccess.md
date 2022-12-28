## Security.yaml

commande : make sf-dump-routes

dans le security.yaml mettre les routes avec les roles
{ path: ^/admin, roles: ROLE_ADMIN }

- { path: ^/utilisateurs/, roles: ROLE_ADMIN } Validation US1: Gérer les instructeurs

---

- { path: ^/formations/, roles: ROLE_INSTRUCTOR } Créer une formation US4
- { path: ^/sections/, roles: ROLE_INSTRUCTOR }
- { path: ^/lessons/, roles: ROLE_INSTRUCTOR }
- { path: ^/quizes/, roles: ROLE_INSTRUCTOR } Créer un Quiz US4
- { path: ^/questions/, roles: ROLE_INSTRUCTOR }
  { path: ^/apprenant_sections, roles: ROLE_STUDENT } il y a un if app.user Suivre une formation US5
- { path: ^/parcours, roles: ROLE_STUDENT }
- { path: ^/parcours_sections, roles: ROLE_STUDENT }

role_hierarchy:
ROLE_ADMIN: [ROLE_USER, ROLE_INSTRUCTOR, ROLE_STUDENT, ROLE_ALLOWED_TO_SWITCH]
ROLE_INSTRUCTOR: [ROLE_USER, ROLE_STUDENT]
ROLE_STUDENT: [ROLE_USER]

-

dans le twig

voir photo Aline2

---

Dans le controller

#[IsGranted('ROLE_ADMIN')]

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

- ***

-

Restreindre l’accès aux routes #15
voir le trello n° 5 gestion de l’accès des pages et commenter
restreindre c’est pour une question de sécurité et de logique

https://symfony.com/bundles/SensioFrameworkExtraBundle/current/annotations/security.html

restriction par rôle (granted)
ou par security + complete + ave de la logique

rien à faire pour la page d’accueil
dans IngredientController, on utilise le IsGranted avec le rôle du user #[IsGranted('ROLE_USER')]

Pour la méthode show
#[Security("is_granted('ROLE_USER') and (recipe.getIsPublic() === true || user === recipe.getUser() ")
il faut être connecté on peut voir la recette si elle est public, si elle n'est pas publique il n'y a que le créateur de la recette qui peut la voir

Pour la méthode edit dans le controller ingredient

- @Security("is_granted('ROLE_USER') and user === ingredient.getUsers()")
  on veut uniquement les personnes connectés (ROLE_USER) et l’utilisateur courant (user) corresponde (≡) à l’utilsateur responsable de cet ingrédient (ingredient.getUser)

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

comme le $user est private on passe par un getter (voir Ingredient.php) : le getUser

pour les recettes c’est identique

pour le UserController :
on met en place pour edit le sucrity, il y a un problème : on crée choosenUser parce qu’on ne peut pas utiliser $user qui est le « standard », donc on modifie tous les $user en $choosenUser
@Security("is_granted('ROLE_USER') and user === choosenUser")
