<?php

namespace App\Controller;

use App\Entity\Chef;
use App\Entity\Client;
use App\Form\Client1Type;
use App\Repository\ClientRepository;
use Doctrine\Persistence\ManagerRegistry;

use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChefController extends AbstractController
{
    #[Route('/', name: 'app_chef')]
    public function index(ManagerRegistry $doctrine, Request $request, ClientRepository $clientRepository): Response
    {
        $repo_chefs = $doctrine->getRepository(Chef::class);
        $chefs = $repo_chefs->findAll();

        $client = new Client();
        $form = $this->createForm(Client1Type::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientRepository->save($client, true);

            return $this->redirectToRoute('app_chef', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('chef/index.html.twig', [
            'chefs' => $chefs,
            'form' => $form->createView(),
        ]);



    }
}
