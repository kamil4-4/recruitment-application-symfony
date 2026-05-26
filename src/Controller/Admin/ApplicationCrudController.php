<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Application;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ApplicationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Application::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Application')
            ->setEntityLabelInPlural('Applications')
            ->setDefaultSort(['createdAt' => 'DESC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('firstName');
        yield TextField::new('lastName');
        yield EmailField::new('email');
        yield TextField::new('position');
        yield ChoiceField::new('experienceLevel')->setChoices([
            'Junior' => 'junior',
            'Mid' => 'mid',
            'Senior' => 'senior',
        ]);
        yield IntegerField::new('yearsOfExperience');
        yield TextareaField::new('technologies')->hideOnIndex();
        yield TextareaField::new('motivation')->hideOnIndex();
        yield DateField::new('availabilityDate')->hideOnIndex();
        yield DateTimeField::new('createdAt')->hideOnForm();
        yield DateTimeField::new('updatedAt')->hideOnForm();
    }
}
