<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MultiChoiceQuestController extends AbstractController
{
    #[Route('/multi/choice/quest', name: 'app_multi_choice_quest')]
    public function index(): Response
    {
        return $this->render('multi_choice_quest/index.html.twig', [
            'controller_name' => 'MultiChoiceQuestController',
        ]);
    }
}
