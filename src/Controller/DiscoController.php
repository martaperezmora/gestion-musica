<?php

namespace App\Controller;

use App\Repository\DiscoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiscoController extends AbstractController
{
    /**
     * @Route("/disco/listar", name="disco_listar")
     */
    public function index(DiscoRepository $discoRepository): Response
    {
        $disco = $discoRepository->listarDiscos();
        return $this->render('disco/lista.html.twig', [
            'discos' => $disco,
        ]);
    }
}
