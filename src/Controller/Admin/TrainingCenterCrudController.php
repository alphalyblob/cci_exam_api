<?php

namespace App\Controller\Admin;

use App\Entity\TrainingCenter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TrainingCenterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TrainingCenter::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', "Nom du centre"),
            TextField::new('phone', "Numéro de téléphone"),
            TextField::new('city',"Ville"),
            TextField::new('postcode',"Code postal"),
            TextField::new('region',"Département"),
            TextField::new('address',"Adresse"),
            AssociationField::new('trainings', 'Formations')
             ->setFormTypeOptionIfNotSet('by_reference', false)
            ->autocomplete() // Affiche un champ d'autocomplétion pour sélectionner les tags
        ];
    }
}
