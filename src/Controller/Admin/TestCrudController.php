<?php

namespace App\Controller\Admin;

use App\Entity\Test;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Test::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('label','NOM DU TEST'),
            ChoiceField::new('coefficient', 'COEFFICIENT')
                ->setChoices([
                    '1' => 'option1',
                    '2' => 'option2',
                    '3' => 'option3',
                    '4' => 'option4',
                    '5' => 'option5',
                ]),
            ChoiceField::new('author', 'AUTEUR.ICE')
                ->setChoices([
                    'Auteur Admin' => 'option1',
                    'Auteur Droit de regard' => 'option2',
                ]),
            ChoiceField::new('time', 'TEMPS IMPARTI')
                ->setChoices([
                    '5' => 'option1',
                    '10' => 'option2',
                    '15' => 'option3',
                    '20' => 'option4',
                    '25' => 'option5',
                ]),
            AssociationField::new('idExam', 'EXAMEN ASSOCIE'),
            AssociationField::new('idTheme', 'THEME'),
            
           
        ];
    }
    
}
