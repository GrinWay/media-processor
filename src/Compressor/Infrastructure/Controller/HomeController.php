<?php

namespace App\Compressor\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/compressor', name: 'app_compressor_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'index', methods: [Request::METHOD_GET])]
    public function index(): Response
    {
        $parameters = [];

        return $this->render('@compressor/index.html.twig', $parameters);
    }
}
