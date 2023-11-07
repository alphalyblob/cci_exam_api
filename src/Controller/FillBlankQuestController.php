<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FillBlankQuestController extends AbstractController
{
    #[Route('/fill/blank/quest', name: 'app_fill_blank_quest')]
    public function index(): Response
    {
        return $this->render('fill_blank_quest/index.html.twig', [
            'controller_name' => 'FillBlankQuestController',
        ]);
    }
}
