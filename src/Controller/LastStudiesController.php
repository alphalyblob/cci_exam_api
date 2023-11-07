<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LastStudiesController extends AbstractController
{
    #[Route('/last/studies', name: 'app_last_studies')]
    public function index(): Response
    {
        return $this->render('last_studies/index.html.twig', [
            'controller_name' => 'LastStudiesController',
        ]);
    }
}
