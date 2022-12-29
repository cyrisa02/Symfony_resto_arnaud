https://www.youtube.com/watch?v=h2vAANknaKE&t=229s
voir projet planetbody
https://github.com/cyrisa02/asdec/blob/main/src/Controller/SitemapController.php
Création du sitemap.xml
1/ Créer la route /sitemap.xml
php bin/console make:controller SitemapController
On doit renvoyer du \_format xml, le content Type de la réponse
#[Route('/sitemap.xml', name: 'app_sitemap', defaults: ['_format'=>'xml'])]
On va vouloir insérer une collection d'URL dans le sitemap

Si il y a des sous-chemin il faut utiliser le repository de l'entité et foreach à 18min20s avec un slug
dans lastmod on peut stocké les dates des modifications

Formatage de ces données dans un fichier xml
on va Créer une réponse avec des paramètres : twig, url, hostname, statut code 200

Modification de l'ent-tête pour indiquer qu'on veut du xml.

Puis on retourne la réponse

---

On prépare le twig
exemple
https://github.com/cyrisa02/asdec/blob/main/templates/sitemap/index.html.twig

écraser le script proposé et reprendre le template du site
https://www.sitemaps.org/fr/protocol.html

on va boucler sur les balises URL
on va chercher les champs hostname et url et le "sous-tableau" loc

34min14 gestion de lastmod, date de création

## Vérification

http://127.0.0.1:8000/sitemap.xml

## Création du robots.txt
