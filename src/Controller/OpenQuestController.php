<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpenQuestController extends AbstractController
{
    #[Route('/open/quest', name: 'app_open_quest')]
    public function index(): Response
    {
        return $this->render('open_quest/index.html.twig', [
            'controller_name' => 'OpenQuestController',
        ]);
    }
}
