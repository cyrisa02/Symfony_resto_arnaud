ATTENTION pour user => php bin/console make:user

User sans s + YES + email +Yes

puis php bin/console make:entity
et les champs en plus puis voir authenticator dans l'autre fichier
SINON

---

pour ajouter des propriété à Users symfony console make:entity =>>>> Users

## AUTHENTICATOR

https://www.youtube.com/watch?v=INfHFDIjgrw&list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM&index=5

CRUD ligne 151 // message ligne 186

symfony console make:auth
mettre 1
UserAuthenticator
Entrée
Yes pour générer une route pour la déconnexion

Déjà connecter c'est app.user!!!!!

---

security.yaml a été mis à jour avc le custom_authenticator +logout

SecurityController mis à jour ave AbstractController
avec une route login mettre connexion

Dans Security/UsersAuthenticator
il récupère un trait qui s'appelle TargetPath qui permet d'avoir des infos
LOGIN_ROUTE nom de la route
Génération d'URL
méthode authenticate retourne un Passport qui gère l'authentification des users (users email + mot de passe et le token)
UserBadge va chercher dans la BD le User par l'intermédiaire de l 'email
PasswordCredentials va récupérer le mot de passe
puis le badge CsrfTokenBadge (jeton de sécurité qui permet de vérifier que le formulaire vient bien de notre site)

si l'authentification fonctionne on peut entrer dans la méthode onAutentcationSuccess
le targetPath (=le chemin de retour qd le user est connecté)

## getLoginUrl redirige vers la bonne URL si on n'a pas les bons identifiants

10min20

1/ dans Security/UsersAuthenticator
commenter // throw new \Exception('TODO: provide a valid redirect inside '.**FILE**);

et mettre
return new RedirectResponse($this->urlGenerator->generate('home.index')); rappel home.index c'est mon accueil

1/ Dans le SecurityController.php
changer /login par /connexion

2/ aller dans le twig security/login et franciser

Récupérer le fichier de TRT Conseil

<section class="container my-3">
    <div class="row">
        <div class="col">
        Mettre tout le formulaire
        </div>
    </div>
</section>
