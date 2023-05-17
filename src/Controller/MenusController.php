<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenusController extends AbstractController
{
    #[Route('/menus', name: 'app_menus')]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('menus/index.html.twig', [
            'products' => $productRepository ->findBy([]),
        ]);
    }
}
