<?php

namespace App\Controller\Admin;

use App\Entity\Exam;
use App\Entity\Test;
use App\Entity\User;
use App\Entity\Theme;
use App\Entity\Result;
use App\Entity\Session;
use App\Entity\Question;
use App\Entity\Training;
use App\Entity\OpenQuest;
use App\Entity\QuestionType;
use App\Entity\FillBlankQuest;
use App\Entity\TrainingCenter;
use App\Entity\MultiChoiceQuest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\QuestionCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(QuestionCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Cci Exam Api');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoCrud('Centres' , 'fa fa-list', TrainingCenter::class);
        yield MenuItem::linkToCrud('Candidats', 'fa fa-list', User::class);
        yield MenuItem::linkToCrud('Formations', 'fa fa-list', Training::class);
        yield MenuItem::linkToCrud('Examens', 'fa fa-list', Exam::class);
        yield MenuItem::linkToCrud('Tests', 'fa fa-list', Test::class);
        yield MenuItem::linkToCrud('Sessions', 'fa fa-list', Session::class);
        yield MenuItem::linkToCrud('Themes', 'fa fa-list', Theme::class);
        yield MenuItem::linkToCrud('Resultats', 'fa fa-list', Result::class);
        yield MenuItem::linkToCrud('Types de questions', 'fa fa-list', QuestionType::class);
        yield MenuItem::linkToCrud('Questions', 'fa fa-list', Question::class);
        yield MenuItem::linkToCrud('Questions ouvertes', 'fa fa-list', OpenQuest::class);
        yield MenuItem::linkToCrud('Questions Choix Multiple', 'fa fa-list', MultiChoiceQuest::class);
        yield MenuItem::linkToCrud('Questions à trous', 'fa fa-list', FillBlankQuest::class);
        
    }
}
