<?php

namespace App\Controller;

use App\Entity\Scheduleevening;
use App\Form\ScheduleeveningType;
use App\Repository\ScheduleeveningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/horaire_soir')]
class ScheduleeveningController extends AbstractController
{
    #[Route('/', name: 'app_scheduleevening_index', methods: ['GET'])]
    public function index(ScheduleeveningRepository $scheduleeveningRepository): Response
    {
        return $this->render('pages/scheduleevening/index.html.twig', [
            'scheduleevenings' => $scheduleeveningRepository->findAll(),
        ]);
    }

    #[Route('/creer', name: 'app_scheduleevening_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ScheduleeveningRepository $scheduleeveningRepository): Response
    {
        $scheduleevening = new Scheduleevening();
        $form = $this->createForm(ScheduleeveningType::class, $scheduleevening);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scheduleeveningRepository->save($scheduleevening, true);
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès');

            return $this->redirectToRoute('app_scheduleevening_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/scheduleevening/new.html.twig', [
            'scheduleevening' => $scheduleevening,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_scheduleevening_show', methods: ['GET'])]
    public function show(Scheduleevening $scheduleevening): Response
    {
        return $this->render('pages/scheduleevening/show.html.twig', [
            'scheduleevening' => $scheduleevening,
        ]);
    }

    #[Route('/{id}/editer', name: 'app_scheduleevening_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Scheduleevening $scheduleevening, ScheduleeveningRepository $scheduleeveningRepository): Response
    {
        $form = $this->createForm(ScheduleeveningType::class, $scheduleevening);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scheduleeveningRepository->save($scheduleevening, true);
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès');

            return $this->redirectToRoute('app_scheduleevening_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/scheduleevening/edit.html.twig', [
            'scheduleevening' => $scheduleevening,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_scheduleevening_delete', methods: ['POST'])]
    public function delete(Request $request, Scheduleevening $scheduleevening, ScheduleeveningRepository $scheduleeveningRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scheduleevening->getId(), $request->request->get('_token'))) {
            $scheduleeveningRepository->remove($scheduleevening, true);
        }

        return $this->redirectToRoute('app_scheduleevening_index', [], Response::HTTP_SEE_OTHER);
    }
}