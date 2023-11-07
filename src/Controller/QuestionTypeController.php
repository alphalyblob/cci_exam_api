<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionTypeController extends AbstractController
{
    #[Route('/question/type', name: 'app_question_type')]
    public function index(): Response
    {
        return $this->render('question_type/index.html.twig', [
            'controller_name' => 'QuestionTypeController',
        ]);
    }
}
