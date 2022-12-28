## Installation

https://symfony.com/doc/current/mailer.html?fbclid=IwAR1GqVfR_VUdslKq3ZJ--8dYlMALI5bP6qmoUxadacSgV4n4WMWe6TzWYRE

NE PAS OUBLIER DE COMMENTER LE messenger.yaml !!!!!!! voir un modèle asdec par exemple

Simulation d'email: https://ethereal.email/

composer require symfony/mailer puis

composer require symfony/google-mailer

NE PAS OUBLIER DE COMMENTER LE messenger.yaml !!!!!!! voir un modèle asdec par exemple

https://github.com/cyrisa02/asdec/blob/main/config/packages/messenger.yaml

Vidéo Dév musclé
https://www.youtube.com/watch?v=JORoegP0OqU&t=98s
la fin est intéressante car il utilise un template
Mailtrap + commenter dans messanger.yaml # Symfony\Component\Mailer\Messenger\SendEmailMessage: async
Mailjet

---

1/ Répertoire Service

créer un MailService.php

https://github.com/cyrisa02/asdec/blob/main/src/Service/MailService.php

## Template

Créer un répertoire emails dans templates

https://github.com/cyrisa02/asdec/blob/main/templates/emails/memberregistration.html.twig

## .env

Récupérer depuis le .env et mettre dans le local.

###> symfony/google-mailer ###

# Gmail SHOULD NOT be used on production, use it in development only.

# MAILER_DSN=gmail://USERNAME:PASSWORD@default

###< symfony/google-mailer ###

le mettre dans le local. Récupérer le password grâce à gmail,

## Gmail

Aller dans l'adresse mail de GMAIL

voir article de Nath
https://support.google.com/accounts/answer/185833?fbclid=IwAR1GLlPJAVdAJALEnKMBqGLyVpNRhnEzO6qvgTi3Hnv8ebfeqobfl1IVCOM

A gauche dans le menu
Aller dans gérer votre compte google / sécurité / connexion à google activité
Mettre dans la barre de recherche "Mots de passe des applications" il demande mon mot de passe général
https://myaccount.google.com/u/4/apppasswords?rapt=AEjHL4O02dujDV2aXP0HVw_bhQgiuL2BvXEoqe1Pu2E8rIOoNftVqgW3wlGilYTTdddp8OaYhdGCRVcEKFGqZhBOi8iy6JXGtA

Mots de pass des applications
Sélectionner une application => Autre
Donner un nom (le nom du site)
Générer
Copier le mot de passe généré =>
aller dans le fichier .env.local

###> symfony/google-mailer ###

# Gmail SHOULD NOT be used on production, use it in development only.

MAILER_DSN=gmail+smtp://cyrisa0:itacex@default
###< symfony/google-mailer ###

## dans le controller

https://github.com/cyrisa02/asdec/blob/main/src/Controller/RegistrationController.php
