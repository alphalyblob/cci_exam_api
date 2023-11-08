<?php

namespace App\Controller\Admin;

use App\Entity\MultiChoiceQuest;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;

class MultiChoiceQuestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MultiChoiceQuest::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('optionValue'),
            BooleanField::new('isCorrect'),
        ];
    }
}
