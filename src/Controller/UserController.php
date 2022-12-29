<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Service\MailService;
use App\Form\UserreservationType;
use App\Repository\UserRepository;
use App\Repository\ScheduleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/client')]
class UserController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('pages/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/creer', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    
    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('pages/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/editer', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès');
            

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
    #[IsGranted('ROLE_CLIENT')]
     #[Route('/{id}/reservation', name: 'app_userreservation_edit', methods: ['GET', 'POST'])]
    public function editreservation(Request $request, User $user, UserRepository $userRepository, ScheduleRepository $scheduleRepository, MailService $mailService): Response
    {
        $form = $this->createForm(UserreservationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);
            // Email J'ai injecté le MailService $mailService
            $mailService->sendEmail(
                $user->getEmail(),                
                'emails/reservation.html.twig',
                ['user'=>$user]
            );
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès');
            return $this->redirectToRoute('home.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/user/editreservation.html.twig', [
            'user' => $user,
            'form' => $form,
            'schedules'=>$scheduleRepository->findAll(),
        ]);
    }


    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}