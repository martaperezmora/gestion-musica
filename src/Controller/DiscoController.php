<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiscoController extends AbstractController
{
    /**
     * @Route("/disco", name="app_disco")
     */
    public function index(): Response
    {
        return $this->render('disco/index.html.twig', [
            'controller_name' => 'DiscoController',
        ]);
    }
}
