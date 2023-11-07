<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiplomaController extends AbstractController
{
    #[Route('/diploma', name: 'app_diploma')]
    public function index(): Response
    {
        return $this->render('diploma/index.html.twig', [
            'controller_name' => 'DiplomaController',
        ]);
    }
}
