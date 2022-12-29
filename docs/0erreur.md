object not found by the @ParamConverter annotation.

pbm avec un id, problème de relation ManyToOne, mettre en OneToOne, héritage-> PlanetBody

Alors, dans mon controller j'avais oublié /{id} dans #[Route('/fiche/{id}', name: 'app_timecarddo_index', methods: ['GET'])] et dans le twig au niveau du bouton qui appelle cette j'avais oublié {'id': timecard.id}) dans <a href="{{ path('app_timecarddo_index', {'id': timecard.id}) }}">Faire l'appel</a>

Récupérer depuis discord---
resolution probleme page 5 8 9 qui ne s affichait pas: dans le public function index($id, ManagerRegistry $managerRegistry): Response il ne faut pas appeler la classe User dedans
// et dans le code j ai remplacé $options =$user->getoptions() par $options =(new \App\Entity\User)->getOption();

Bonjour à tous. Ca date un peu mais si jamais certains ont encore une erreur de ParamConverter, lisez ceci. J'ai eu la même erreur après avoir essayé de faire le même système que toi, et après avoir épluché la doc Symfony sur ParamConverter, il se trouve que quand on rentre dans les paramètres de la fonction une classe (dans notre cas User $user), ParamConverter fait une requête automatiquement dans la base de données pour trouver un objet en utilisant l'id. Or je pense que id étant une clé primaire auto incrémentale non modifiable, cela cause des soucis sur la route, car si je tente avec n'importe quelle autre colonne de ma base de données ça fonctionne. La solution que j'ai trouvée est pourtant très simple, il suffit de supprimer l'appel à User $user dans les paramètres, et l'appeler dans le code si besoin comme dans l'image ci-jointe. J'espère que ça en aidera certains.

- Essaie d’utiliser la php doc pour ton $user au dessus de ta variable. comme Nath

J'avais créé un controller avec index, mais comme il y avait pas le show, ça bloquait avec un paramconverter.
En fait je m'en suis compte parce que dans le profiler le name était à show alors que moi je voulais un index

Aline : En changeant les relations ça n'avais rien changé. En fait c'était dans le contrôleur show il y avait salle et structure du coup il savait pas le quel prendre 😅 il a suffit d'enlever salle

---

Unable to guess how to get a Doctrine instance from the request information for parameter

manque une realtion avec un id comme pour edit ou show ou delete. Moi je l'avais utilisé dans un new, c'est trop tôt, pas d'ID existant.

#[Route('/send/{id}', name: 'send', methods: ['GET', 'POST'])]
public function send($id, Mailing $mailing, MailerInterface $mailer, MailingRepository $mailingRepository): Response
     {
        $mail= $mailingRepository->find($id);

         $user = $mail->getPartners()[0]->getUsers()[0]->getEmail();

        $email = (new TemplatedEmail())
        //->from($mailing->getPartners())
        ->from('cyrisa02.test@gmail.com')
        //->to('cyrisa02.test@gmail.com')
        ->to($user)
        ->subject($mailing->getTitle())

        ->text('Recherche de mail!');
        //->text($mailing->getPartners());
        //->htmlTemplate('emails/contact.html.twig');
        // ->context([
        //     'contact'=>$contact
        // ]);
        $mailer->send($email);

---

Impossible to access an attribute ("contact") on a null variable.

En fait j'ai fait des fixtures mais je n'ai pas mis de id sur Partner dans la table User , elle est vide.

Impossible to access an attribute ("name") on a null variable.  
Il y a un décallage entre la clé étrangère , il faut vérifier les clés étrangères et la clé primaire.

Avec Julian, je lui avais dit de se mettre sur new structures et c'est pas bon parceq ue on le crée avec Registration daonc pas de new mais un edit avec son id!!

---

Tuto Newsletter Nouvelle Techno à 40 min
On a une ManyToMany sur User et Category, rien ne se met en BD.
En fait il y avait inversion dans le mappedBy et le inversedBy

dans Categorie #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'categories')]
private Collection $users;

dans User #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'users')]
private Collection $categories;

mappedBy signifie que je suis mapped par le owner etc..
ceci intervient lors d'une relation manyTomany bidirectionnelle, afin de définir qui est le owner de la relation et qui est le côté inverse.
Je vous join le lien de la documentation doctrine pour plus d'information :
https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/unitofwork-associations.html

---

erreur 404 après deploiement heroku, pas de message d'erreur.
pbm pointage du home /, julian a pointé sur login

---

Object of class Doctrine\ORM\PersistentCollection could not be converted to string
A chaque migration, à chaque fixture, je vérifie soit dans mon terminal ou bien avec DBeaver. Il m’est arrivé au cours de ce projet de changer des relations, il faut donc modifier les entités concernées, modifier/supprimer les « getter », les « setter », les collections si nécessaires. Puis réaliser une migration. Puisqu’on travaille sur un MVC, il ne faut pas oublier de modifier les templates TWIG concernés sinon on reçoit l’erreur : Object of class Doctrine\ORM\PersistentCollection could not be converted to string OU pour ALine le 5/10/22 Elle a confondu héritage OneToOne avec une ManyToOne entre salle de sprot et User

---

Can't get a way to read the property "lastname" in class "App\Entity\User". pas trouvé
Ai changé complétement la BD voir TRT Conseil. En fait j'ai un problème avec lastname. Au début je l'avais mis sur toutes les tables (consultant, recruteur et candidat). Donc c'est un champ redondant. Du coup je l'ai basculé sur user. Mais donc qd je suis sur l'index de consultant, je ne le vois plus à cause de <a class="btn btn-secondary btn-lg mt-4" href="{{ path('app_consultant_edit', {'id': consultant.id}) }}">Modifier</a>

j'ai modifié en <a class="btn btn-secondary btn-lg mt-4" href="{{ path('app_user_edit', {'id': consultant.user.id}) }}">Modifier</a>
Attention faire pluser user.edit et plusieurs formtype pour chacune des tables (consultant, recruteur, candidat)

- il attend dasn le formtype (Registration adequat ) un mapped à false pour les tables "étrangère" à true pour la table user+ la mise à jour TextType

---

An exception occurred while executing a query: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'lastname' cannot be null

après une grosse modif de la BD lastname n'est plus dans candidat mais dans user
résolu: dans le formtype mettre le mapped à false!!

---

Key "option1s" for array with keys "0, 1, 2, 3" does not exist

dans le projet Resto_Arnaud, j'ai repris le code de l'asdec entre sport et user (MtM)
https://github.com/cyrisa02/asdec/blob/main/src/Controller/UserController.php
app_user_index: pas de repo et de findall sur sport
https://github.com/cyrisa02/asdec/blob/main/templates/pages/user/index.html.twig

Le problème c'est que je n'avais pas mis de s à option1 lors de la création de la relation ManyToMany sur Menu.
Option avait bien un "menus", mais Menu avait un option1. J'ai cassé la BD et mis un options dans Menu. Le twig fonctionne!
https://github.com/cyrisa02/Symfony_resto_arnaud/blob/main/src/Controller/MenuController.php
https://github.com/cyrisa02/Symfony_resto_arnaud/blob/main/templates/pages/menu/indexformule.html.twig

---

Expected to find class X in file while importing services from resource "../src/", but it was not found after structural changes

Ai changé MailService2.php en Mail2Service.php c'était pas ça

vider le cash
composer dump-autoload

c'était le nom du fichier qui n'était pas en phase avec le nom
Userrerastion.php alors que j'ai Userreservation!!!!
