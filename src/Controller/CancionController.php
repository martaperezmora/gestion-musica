<?php

namespace App\Controller;

use App\Repository\CancionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CancionController extends AbstractController
{
    /**
     * @Route("/cancion/listar", name="cancion_listar")
     */
    public function index(CancionRepository $cancionRepository): Response
    {
        $canciones = $cancionRepository->listarCanciones();
        return $this->render('cancion/lista.html.twig', [
            'canciones' => $canciones,
        ]);
    }
}
