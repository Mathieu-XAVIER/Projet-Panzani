<?php

namespace App\Controller;

use App\Entity\Chef;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChefController extends AbstractController
{
    #[Route('/', name: 'app_chef')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo_chefs = $doctrine->getRepository(Chef::class);
        $chefs = $repo_chefs->findAll();
        return $this->render('chef/index.html.twig', [
            'chefs' => $chefs,
        ]);
    }
}
