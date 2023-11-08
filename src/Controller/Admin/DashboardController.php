<?php

namespace App\Controller\Admin;

use App\Entity\Exam;
use App\Entity\Test;
use App\Entity\User;
use App\Entity\Theme;
use App\Entity\Diploma;
use App\Entity\Session;
use App\Entity\Question;
use App\Entity\Training;
use App\Entity\OpenQuest;
use App\Entity\QuestionType;
use App\Entity\ProExperience;
use App\Entity\FillBlankQuest;
use App\Entity\TrainingCenter;
use App\Entity\MultiChoiceQuest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(QuestionCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Cci Exam Api');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Centre de formation', 'fas fa-list', TrainingCenter::class);
        yield MenuItem::linkToCrud('Formation', 'fas fa-list', Training::class);
        yield MenuItem::linkToCrud('Session', 'fas fa-list', Session::class);
        yield MenuItem::linkToCrud('Examen', 'fas fa-list', Exam::class);
        yield MenuItem::linkToCrud('Theme du test', 'fas fa-list', Theme::class);
        yield MenuItem::linkToCrud('Test', 'fas fa-list', Test::class);
        yield MenuItem::linkToCrud('Type de Question', 'fas fa-list', QuestionType::class);
        yield MenuItem::linkToCrud('Question', 'fas fa-list', Question::class);
        yield MenuItem::linkToCrud('Question libre', 'fas fa-list', OpenQuest::class);
        yield MenuItem::linkToCrud('QCM/QCU', 'fas fa-list', MultiChoiceQuest::class);
        yield MenuItem::linkToCrud('Texte à trou', 'fas fa-list', FillBlankQuest::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Niveau d\'étude', 'fas fa-list', Diploma::class);
        yield MenuItem::linkToCrud('Durée Expérience Pro', 'fas fa-list', ProExperience::class);
    }
}
