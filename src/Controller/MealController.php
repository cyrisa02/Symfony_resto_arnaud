<?php

namespace App\Controller;

use App\Entity\Meal;
use App\Form\MealType;
use App\Service\FileUploader;
use App\Repository\MealRepository;
use App\Repository\CategoryRepository;
use App\Repository\ScheduleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/plat')]
class MealController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'app_meal_index', methods: ['GET'])]
    public function index(MealRepository $mealRepository): Response
    {
        return $this->render('pages/meal/index.html.twig', [
            'meals' => $mealRepository->findAll(),
        ]);
    }

    #[Route('/public', name: 'app_mealpublic_index', methods: ['GET'])]
    public function indexpublic(MealRepository $mealRepository, CategoryRepository $categoryRepository, ScheduleRepository $scheduleRepository): Response
    {
        return $this->render('pages/meal/indexpublic.html.twig', [
            'meals' => $mealRepository->sortByCategory(),
            'categories' => $categoryRepository->findAll(),
            'schedules'=>$scheduleRepository->findAll(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/creation', name: 'app_meal_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MealRepository $mealRepository, FileUploader $fileUploader): Response
    {
        $meal = new Meal();
        $form = $this->createForm(MealType::class, $meal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('picture')->getData();
            if ($imageFile) {
            $imageFileName = $fileUploader->upload($imageFile);
            $meal->setPicture($imageFileName);
        }
            $mealRepository->save($meal, true);
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès');

            return $this->redirectToRoute('app_meal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/meal/new.html.twig', [
            'meal' => $meal,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}', name: 'app_meal_show', methods: ['GET'])]
    public function show(Meal $meal): Response
    {
        return $this->render('pages/meal/show.html.twig', [
            'meal' => $meal,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/editer', name: 'app_meal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Meal $meal, MealRepository $mealRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(MealType::class, $meal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('picture')->getData();
            if ($imageFile) {
            $imageFileName = $fileUploader->upload($imageFile);
            $meal->setPicture($imageFileName);
        }
            
            $mealRepository->save($meal, true);
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès');

            return $this->redirectToRoute('app_meal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/meal/edit.html.twig', [
            'meal' => $meal,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
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
}