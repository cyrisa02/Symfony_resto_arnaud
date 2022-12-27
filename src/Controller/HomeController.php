<?php

namespace App\Controller;

use App\Repository\MealRepository;
use App\Repository\ScheduleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * This controller displays the HomepPage 
 */
class HomeController extends AbstractController
{
    #[Route('/', name: 'home.index')]
    public function index(MealRepository $mealRepository, ScheduleRepository $scheduleRepository): Response
    {
        return $this->render('pages/home.html.twig', [
            'controller_name' => 'HomeController',
            'meals' => $mealRepository->findAll(),
            'schedules'=>$scheduleRepository->findAll(),
        ]);
    }
}