<?php

namespace App\Controller\Admin;

use App\Entity\Chef;
use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ChefCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Panzani');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        yield MenuItem::subMenu('Manage Chefs', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Chef', 'fas fa-plus', Chef::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Chefs', 'fas fa-eye', Chef::class)
        ]);

        yield MenuItem::subMenu('Manage Client', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Client', 'fas fa-plus', Client::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Client', 'fas fa-eye', Client::class)
        ]);


    }
}
