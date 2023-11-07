<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingCenterController extends AbstractController
{
    #[Route('/training/center', name: 'app_training_center')]
    public function index(): Response
    {
        return $this->render('training_center/index.html.twig', [
            'controller_name' => 'TrainingCenterController',
        ]);
    }
}
