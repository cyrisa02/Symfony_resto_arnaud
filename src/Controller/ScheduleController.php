<?php

namespace App\Controller;

use App\Entity\Schedule;
use App\Form\ScheduleType;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/horaire_midi')]
class ScheduleController extends AbstractController
{
    #[Route('/', name: 'app_schedule_index', methods: ['GET'])]
    public function index(ScheduleRepository $scheduleRepository): Response
    {
        return $this->render('pages/schedule/index.html.twig', [
            'schedules' => $scheduleRepository->findAll(),
        ]);
    }

    #[Route('/creer', name: 'app_schedule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ScheduleRepository $scheduleRepository): Response
    {
        $schedule = new Schedule();
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scheduleRepository->save($schedule, true);
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès');

            return $this->redirectToRoute('app_schedule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/schedule/new.html.twig', [
            'schedule' => $schedule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_schedule_show', methods: ['GET'])]
    public function show(Schedule $schedule): Response
    {
        return $this->render('pages/schedule/show.html.twig', [
            'schedule' => $schedule,
        ]);
    }

    #[Route('/{id}/editer', name: 'app_schedule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Schedule $schedule, ScheduleRepository $scheduleRepository): Response
    {
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scheduleRepository->save($schedule, true);
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès');

            return $this->redirectToRoute('app_schedule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/schedule/edit.html.twig', [
            'schedule' => $schedule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_schedule_delete', methods: ['POST'])]
    public function delete(Request $request, Schedule $schedule, ScheduleRepository $scheduleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schedule->getId(), $request->request->get('_token'))) {
            $scheduleRepository->remove($schedule, true);
        }

        return $this->redirectToRoute('app_schedule_index', [], Response::HTTP_SEE_OTHER);
    }
}