<?php

namespace App\Controller\Admin;

use App\Entity\Chef;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChefCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chef::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
