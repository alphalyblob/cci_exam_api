<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProExperienceController extends AbstractController
{
    #[Route('/pro/experience', name: 'app_pro_experience')]
    public function index(): Response
    {
        return $this->render('pro_experience/index.html.twig', [
            'controller_name' => 'ProExperienceController',
        ]);
    }
}
