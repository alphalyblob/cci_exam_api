<?php

namespace App\Controller\Admin;

use App\Entity\OpenQuest;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OpenQuestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpenQuest::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('correctionHint', "Aide à la correction"),
            AssociationField::new('idQuestion')
        ];
    }
}
