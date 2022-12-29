Déployer un projet Symfony
1/ Regarder les version de PHP et de MariaDB
Moi je suis en PHP 8.0 mariadb-10.5.8

J'utilise le terminal et Fillezilla(FTP)

2/ Vérifier que vous ayez un .htaccess dans le repertoire public sinon
composer require symfony/apache-pack + YES

3/ Sur la plateforme IONOS voir robots.txt
Créer un sous-domaine, donner un nom
Espace Web /Gérer domaines/Portefeuille / Sous-domaines / Quick Links / Créer un nouveau sous-domaine

Faire les commits sur github

4/Créer une BD sur IONOS
PlanetBody/Ecoit/TRT/
Mot de passe: ojedkfnsdqs

Impossibilité d'être relié à votre BD, uniquement par phpmyadmin de Ionos

ce sera du style pour plus tard dans le .env
DATABASE_URL=mysql://dbu695541:ojedkfnsdqs@db50111564199.hosting-data.io:3306/dbs98794879?serverVersion=mariadb-10.5.8

5/Espace Web / créer un dossier avec le nom du projet (en général je mets le nom du sous-domaine)
je vais pouvoir aller en SSH sur ce dossier

5/ Créer puis récupérer le
FTP et SSH : nom d'utilisateur:
Nom d'utilisateur: u1255454858
code: BIJOJNN?BNBH
serveur/host: access9321545382.webspace-data.io
Port 22

La ligne de commande sur le terminal en SSH sera
ssh u1255454858@access9321545382.webspace-data.io

password: BIJOJNN?BNBH

dans le terminal faire un ls, puis aller dans votre dossier (voir étape 5)

6/ dans le dossier faire un git clone https://github.com/votreprojetsurgit . (Ne pas oublier lepoint en fin de commande)

7/ installer composer dans ce même dossier avec votre version de php (moi 8.0), attention regarder sur Ionos pour voir la version (8.0 en général)
mettre les commandes une à une

curl -sS https://getcomposer.org/installer | /usr/bin/php8.0-cli

/usr/bin/php8.0-cli composer.phar

/usr/bin/php8.0-cli composer.phar selfupdate

/usr/bin/php8.0-cli composer.phar install

Vérifier que vous avez votre dossier vendor bien palcé

8/ Faire un dump ou un export de votre BD local avec PHPmyAmdin pour avoir un fichier mabdlocal.sql

9/ Aller sur Ionos, aller dans le Phphmyadmin de votre BD à distance
Cliquer une fois sur la BD (en haut à gauche) pour l'activer
Importer / Récupérer votre fichier mabdlocal.sql / Executer
Vérifier que vous avez vos données et vos tables

10/Retour accueil de Ionos et Domaines et SSL
aller dans le sous-domaine
engrenages(actions) / afficher les détails / cible / utiliser le domaine / connecter à un espace Web
je dois pointer sur le fichier mondossierprojet/public de symfony

PS: il faut aussi la première fois activer votre certificat SSL pour l'ensemble du domaine et donc du coup de manière automatique sur vous sous-domaine.

11/Aller sur Filezilla (fermer le SSH)
Entrer les clés SSH/FTP (voir étape 5)
Aller sur votre dossier à distance, vérifier la présence du dossier vendor
Aller sur le .env à distance (cliquer droit / éditer)
Mettre à jour le .env avec vos variables d'environnement (mailer et c...)
Mettre la BD Ionos
DATABASE_URL=mysql://dbu695541:ojedkfnsdqs@db50111564199.hosting-data.io:3306/dbs98794879?serverVersion=mariadb-10.5.8
Enregistrer un message vous dira que le fichier a été transféré, vous pouvez aussi le faire en SSH

12/ Vous pouvez cliquer sur le line du site

Attention vous pouvez avoir un problème de cache -> https://ecoit.nomdedomaine.fr/default
Vider votre cache, ou changer de navigateur ou envoyer votre lien sur un portable ou un autre PC

Si vous avez des soucis, avec Fillezilla changer le .env-> rebasculer en dev et vous aurez la possibilité de voir d'où ça vient.
