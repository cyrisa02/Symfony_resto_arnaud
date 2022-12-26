## Création d'entités

Ne pas faire les relations, faire les fixtures

php bin/console make:entity

9/ php bin/console make:migration //// Mettre un texte

make sf-mm

10/ php bin/console d:m:m + YES

make sf-dmm

FIXTURE + TESTS!

## Création des fixtures

symfony console make:fixtures NomdelafixtureFixtures ex: CategoriesFixtures
php bin/console d:f:l +YES ou

make sf-fixtures

pour une date: $reservation->setDate(new \DateTime('04/06/2022'));

Pour une ManyToOne se mettre sur l'entité où il y a le id , sur recette pas sur ingrédient attetnio c'est ManyTOMany!!!!!:
marquer l'attribut au pluriel: ingredients (il est bien sur la table)
relation
Ingredient (classe)
ManyToONe

ManyToOne Each Mailing relates to (has) one Category.  
 Each Category can relate to (can have) many Mailing objects

OneToMany Each Mailing can relate to (can have) many Category objects.  
 Each Category relates to (has) one Mailing

ManyToMany Each Mailing can relate to (can have) many Category objects.  
 Each Category can also relate to (can also have) many Mailing objects

OneToOne Each Mailing relates to (has) exactly one Category.  
 Each Category also relates to (has) exactly one Mailing.

Dasn le formtype de recipe  
->add('ingredients', EntityType::class, [
'class' => Ingredient::class,  
 'label' => 'Les ingrédients',
'label_attr' => [
'class' => 'form-label mt-4'
],
'choice_label' => 'name',
'multiple' => true,
'expanded' => true,
])

PROBLEME sur ASDEC
Expected argument of type "?App\Entity\Childsport", "Doctrine\Common\Collections\ArrayCollection" given at property path "sports".

1/Récupérer le diagramme UML- chercher toutes les contraintes (positif, longueur)
les noter sur le diagramme, en général au moins deux asserts par attributs
BIEN ORDONNER, c'est plus facile après!!!

Ne pas faire les relations, faire des fixtures avant!!!
NOTER Les RELATIONS, à paramétrer en dernier lors de la création de l'entité

---

2/ php bin/console make:entity
Majuscule+ANglais+SINGULIER
propriéte: ex nbPeople minuscule
type: texte, string
relation : Recipe>Ingredient MtM mettre au PLURIEL ingredientS
longueur:
null?
RELATION: Recipe>Ingredient MtM (création d'une table spéciale)
Penser à createdAt updatedAt isFavorite isPublic

POUR LES RELATIONS(Clés étrangères):

ATTENTION: faire la migration
9/ php bin/console make:migration
10/ php bin/console d:m:m + YES
FAIRE LA FIXTURE
et ensuite
faire les relations en dernier

Do you want to add a new property to Lessons so that you can access/update Sections objects from it - e.g. $lessons->getSections()? (yes/no) [yes]: si je veux que ça crée une colonne dans la table qui est relié

ASSERTS

Modifier le created_at -> option default
#[ORM\Column(type: 'datetime_immutable', options: ['default' =>'CURRENT_TIMESTAMP'])]

Pour isVerifed pour que les champs dans la BD soient d'office à 0, si il y a rien ça bloque au niveau de l'admin suis obligé de mttre 0 dans la BD manuellement, pas cool
#[ORM\Column(type: 'boolean', options: ['default' =>'0'])]
private bool $is_verified = false;

Unique pour le champ concerné
,unique: true

    5/ ASSERT

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; se met automatiquement lors de la registration
use Symfony\Component\Validator\Constraints as Assert;

@UniqueEntity("name")

@Assert\NotBlank : fort pour le name
@Assert\Length(min= 2, max= 50)
@Assert\NotNull : pour les DATES createdAt + updatedAt
@Assert\Email :

Attention pour les clés étrangère - RELATION-> mettre au pluriel ingredients dans recipe
recette-ingrédient: ManytoMany
@ORM\ManyToMany(targetEntity=Ingredient::class)

time, nbPeople, difficulty, price:
@Assert\Positive
@Assert\LessThan(1441)

Pour les choix multiples comme Directories (relation entre 2 tables) et on veut que l'utilisateur mette un directories, dans l'autre
entité (user) mettre au niveau de Directories #[Assert\NotNull()] + ne pas oublier d'importer la classe use Symfony\Component\Validator\Constraints as Assert;

---

6/ Metttre les types ?int string bool ?float ?DateTimeImmutable

7/ Pour les dates \DateTimeImmutable (+Appel) + constructor
+commenter le constructor
/\*\*
_This constructor is for the date
_/
public function \_\_construct()
{
$this->created_at = new \DateTimeImmutable();

    }

pour updatedAt on a besoin d'une fonction suplémentaire attention PrePersist et pas Prepersit il perd la majsucule....
/\*\* @ORM\PrePersist
public function setUpdatedAtValue()
{
$this->updatedAt = new \DateTimeImmutable();
}

    +cycle de vie pour le UpdatedAt

    #[ORM\HasLifecycleCallbacks]  dans le genéral

EXEMPLE

#[UniqueEntity('name')] #[ORM\HasLifecycleCallbacks] #[ORM\Entity(repositoryClass: RecipeRepository::class)] #[Vich\Uploadable]

8/ Pour les string

si on a l'erreur "cannot be converted to string pour une entité"

public function \_\_toString()
{
return $this->prenom . ' ' . $this->nom;
}

9/php bin/console make:migration
10/ php bin/console d:m:m + YES

11/ Verif DBbeaver

12/ git add -> git commit -> git checkout -b home

---

Bug Many TO Many
Object of class Doctrine\ORM\PersistentCollection could not be converted to string
Object of class Doctrine\ORM\PersistentCollection could not be converted to string
sur section
En fait: je venais de changer les relations de ManyToOne à ManyToMany, du coup Twig n'était plus en phase avec la BD, il y avait des champs en trop sur TWIG du coup l'erreur!

---

Transformation de One TO Many en Many TO Many
ex: la Mère Formation

enlever dans l'entity
// #[ORM\OneToMany(mappedBy: 'formations', targetEntity: Sections::class)]
// private $sections;

// /\*_
// _ @return Collection<int, Sections>
// \*/
// public function getSections(): Collection
// {
// return $this->sections;
// }
// public function addSection(Sections $section): self
// {
// if (!$this->sections->contains($section)) {
// $this->sections[] = $section;
// $section->setFormations($this);
// }

// return $this;
// }

// public function removeSection(Sections $section): self
// {
// if ($this->sections->removeElement($section)) {
// // set the owning side to null (unless already changed)
// if ($section->getFormations() === $this) {
// $section->setFormations(null);
// }
// }

// return $this;
// }

Faire la même chose sur la fille "section"

// #[ORM\ManyToOne(targetEntity: Formations::class, inversedBy: 'sections')]
// #[ORM\JoinColumn(nullable: false)]
// private $formations;

    // public function getFormations(): ?Formations
    // {
    //     return $this->formations;
    // }

    // public function setFormations(?Formations $formations): self
    // {
    //     $this->formations = $formations;

    //     return $this;
    // }


    migration + migrate

     php bin/console make:entity

    ENtrer le nouveau champ dans une entité, relation ManyToMany

    Nouvelles créations dans les entités


    #[ORM\ManyToMany(targetEntity: Formations::class, mappedBy: 'sections')]
    private $formations;

/\*\*
_ @return Collection<int, Formations>
_/
public function getFormations(): Collection
{
return $this->formations;
}

    public function addFormation(Formations $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->addSection($this);
        }

        return $this;
    }

    public function removeFormation(Formations $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            $formation->removeSection($this);
        }

        return $this;
    }


    migration + migrate




    Changer les twig

    {# <td>{{ section.formations }}</td>
    <td>{{ section.lessons }}</td> #}

Modifier le twig sinon PersistentCollection could not be converted to string

---

Ecraser une table Directories avec 2 relations (User +Formation)
J’avais une erreur Warning: include(/home/cyril/Bureau/Symphony/ECOIT/ecoapp/vendor/composer/../../src/Repos  
 itory/DirectoriesRepository.php): Failed to open stream: No such file or directory donc j’ai fait
php artisan clear-compiled
composer dumpautoload

---

App\Entity\EndedLessons object not found by the @ParamConverter annotation
