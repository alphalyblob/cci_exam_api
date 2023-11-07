<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LastExperienceController extends AbstractController
{
    #[Route('/last/experience', name: 'app_last_experience')]
    public function index(): Response
    {
        return $this->render('last_experience/index.html.twig', [
            'controller_name' => 'LastExperienceController',
        ]);
    }
}
