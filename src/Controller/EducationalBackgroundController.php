<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EducationalBackgroundController extends AbstractController
{
    #[Route('/educational/background', name: 'app_educational_background')]
    public function index(): Response
    {
        return $this->render('educational_background/index.html.twig', [
            'controller_name' => 'EducationalBackgroundController',
        ]);
    }
}
