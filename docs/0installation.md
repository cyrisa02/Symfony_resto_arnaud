## Installation Trello

si je ne veux pas copier JBL créer/commencer à partir d'un modèle / kanban

Aller en haut à droite (les trois petits points), à gauche de A propos de ce tableau, cliquer sur < puis sur plus

Aller dans JBL
Afficher le menu / Plus /Copier le tableau / Donner un nom
Mettre en favori /
Pour récupérer le lien -> Afficher le menu / Plus lien vers ce tableau

en haut à gauche appuyer sur Trello / Membres + / Inviter / creer un lien et donner le lien c'est payant.

sinon aller dans modifier la visibilité et mettre en public

## Note de clarification

//Stabilo -> note de clarification + diagramme de fonctionnalité + diagramme de classe
// dans Symfony ouvrir diagrammes UML

## Mise en place d'une extension comme zip pour ckeditor

apt-cache search php8.0-zip pour voir si lepaquet est présent
sudo apt-get install php8.0-zip raccord avec mon php version 8.0 installé
php -m vérif des extensions installées sur mon php.ini

---

## Vérifications

Dans un terminal

symfony check:requirements
php -m permet de voir les extensions de php
php --ini permet de voir quel fichier ini est chargé et où

php bin/console doctrine:schema:update --dump-sql our savoir si la BD est bien calée

## Clonage

se mettre dans le bon dossier dans un terminal
https://github.com/cyrisa02/StandardBootstrapRGPDCVGRead

git clone https://github.com/cyrisa02/StandardBootstrapRGPDCVGRead.git .
supprimer le fichier .git dans le répertoire sinon problème
créer le .env.local

dans le gitignore
/.env.local\*

composer update
Pour un projet venant de git, composer install si vendor n'existe pas composer update

## Créer la BD

DATABASE_URL=mysql://vermessuser:toor@127.0.0.1:3306/vermessdb?serverVersion=mariadb-10.5.8

symfony serve

paramétrer DBeaver

mettre MkDOcs
créer un repertoire docs et le fichier mkdocs.yaml
mkdocs serve
port 8000 comme symfony!!

mettre MakeFile

## Création du App_secret

symfony new - -webapp nomduprojet Attention dévalider tout de suite .env

## changement de version php

sudo update-alternatives --config php
php -v :
sudo systemctl status mariadb :
sudo mysql -v  :
symfony -v  :
composer   :

## Création d'un logo

https://studio.tailorbrands.com/
Logo et marque Modifier / Nouveau Logo

Voir le fichier 10Bootsrtap

changer ligne 300 et le body et 401

## Création de la NavBar avec Fonctionnalités

## Git init

attention on est sur master

git rm -r --cached .
git add .
git commit -m ".gitignore est maintenant fonctionnel"

Evite que le gitignore ne fonctione pas!!!

Créer une branche sprint1

## Message Flash dans base.html

<body>
		{% for message in app.flashes('success') %}
			<span id="alert" class="alert alert-success d-inline">
				{{ message }}
			</span>
		{% endfor %}

puis dans le contorller et dans la bonne fonction edit ou new

$this->addFlash('success', 'Votre message a été envoyé');

ou voir mailing index + new dans planet body
