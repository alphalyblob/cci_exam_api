<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProBackgroundController extends AbstractController
{
    #[Route('/pro/background', name: 'app_pro_background')]
    public function index(): Response
    {
        return $this->render('pro_background/index.html.twig', [
            'controller_name' => 'ProBackgroundController',
        ]);
    }
}
