<?php

namespace App\Controller\Admin;

use App\Entity\Question;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class QuestionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Question::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label', "intitulé de la question"),
            TextEditorField::new('content', "contenu de la question"),
            AssociationField::new('idTest', "Test"), 
            AssociationField::new('idQuestionType', "Type"),
            CollectionField::new('multiChoiceQuests', "QCM")
            ->useEntryCrudForm(MultiChoiceQuestCrudController::class)
            ->setEntryIsComplex(true)
            // ->displayIf('idQuestionType', 'eq', 2) // Affiche le champ si 'yourChoiceField' est égal à 1

    ];
    }

}
