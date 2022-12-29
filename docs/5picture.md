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

Dasn le formtype ne pas oublier 'required' => false,

use Symfony\Component\Validator\Constraints\File

->add('picture', FileType::class, [
'mapped' => false,
'required' => false,
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

---

## Suppression d'images

https://www.youtube.com/watch?v=jrca6I-sBNM

#[Route('/{id}', name: 'app_meal_delete', methods: ['POST'])]
public function delete(Request $request, Meal $meal, MealRepository $mealRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$meal->getId(), $request->request->get('_token'))) {
            $picture = $meal->getPicture();
            if($picture){
$nomImage= $this->getParameter("uploads_directory") . '/' .$picture;
//dd($nomImage);
                //we check if the picture exists
                if(file_exists($nomImage)){
unlink($nomImage);
                }
            }
            $mealRepository->remove($meal, true);
}

        return $this->redirectToRoute('app_meal_index', [], Response::HTTP_SEE_OTHER);
    }
