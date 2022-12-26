créer un dossier uploads dans public

dans services.yaml

parameters:
uploads_directory: "%kernel.project_dir%/public/uploads"

-

en fin de script

App\Service\FileUploader:
arguments:
$targetDirectory: "%kernel.project_dir%/public/uploads"

## Création du service

créer dans src le répartoire : Service
créer le fichier FileUploader.php

dans le controller
use App\Service\FileUploader; dans le create et le show

- injection de la dépendance

voir user dans asdec et meal dans Symfony_resto_arnaud

---

Dans le twig show

{% if candidate.cvName is defined %}
<img src="{{ asset('uploads/') }}{{ candidate.cvName }}" alt="" style="max-width: 7rem; height: auto; border-radius: 50%;">

    				{% else %}
    					<p>Pas de Cv</p>
    				{% endif %}

---

Dasn le formtype

use Symfony\Component\Validator\Constraints\File

->add('picture', FileType::class, [
'mapped' => false,
'label' => 'Merci de mettre une photo en jpeg ou png',
'constraints' => [
new File([
'maxSize' => '1024k',
'mimeTypes' => [
'image/jpeg',
'image/png',
],
'mimeTypesMessage' => 'Merci de télécharger une image en jpeg ou png.',
])
],

            ])

---

; pour la taille

->add('my_file', FileType::class, [
'mapped' => false,
'required' => false,
'label' => 'Télécharger votre CV en format pdf uniquement.'
'constraints' => [
new File([
'maxSize' => '5M',
'mimeTypes' => [
'image/*',
'application/pdf',
'application/x-pdf',
],
'mimeTypesMessage' => 'Télécharger une image au bon format',
])
],

                OU!!!! pour un pdf

                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],

            ])
