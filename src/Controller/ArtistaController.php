<?php

namespace App\Controller;

use App\Repository\ArtistaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistaController extends AbstractController
{
    /**
     * @Route("/artista/listar", name="artista_listar")
     */
    public function index(ArtistaRepository $artistaRepository): Response
    {
        $artistas = $artistaRepository->listarArtistas();
        return $this->render('artista/lista.html.twig', [
            'artistas' => $artistas,
        ]);
    }
}
