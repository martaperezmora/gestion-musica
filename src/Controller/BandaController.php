<?php

namespace App\Controller;

use App\Repository\BandaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BandaController extends AbstractController
{
    /**
     * @Route("/banda/listar", name="banda_listar")
     */
    public function index(BandaRepository $bandaRepository): Response
    {
        $bandas = $bandaRepository->listarBandas();
        return $this->render('banda/lista.html.twig', [
            'bandas' => $bandas,
        ]);
    }
}
