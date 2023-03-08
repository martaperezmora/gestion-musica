<?php

namespace App\Controller;

use App\Entity\Artista;
use App\Form\ArtistaType;
use App\Repository\ArtistaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/artista/nuevo", name="artista_nuevo")
     */
    public function nuevoArtista(Request $request, ArtistaRepository $artistaRepository) : Response
    {
        $artista = $artistaRepository->new();

        return $this->modificarArtista($request, $artista, $artistaRepository);
    }

    /**
     * @Route("/artista/modificar/{id}", name="artista_modificar")
     */
    public function modificarArtista(Request $request, Artista $artista, ArtistaRepository $artistaRepository) : Response
    {
        $formulario = $this->createForm(ArtistaType::class, $artista);

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            try {
                $artistaRepository->save($artista);
                $this->addFlash('exito', 'datos guardados');
            } catch (\Exception $e) {
                $this->addFlash('error', 'no se ha podido guardar');
            }
        }

        return $this->render('artista/formulario.html.twig', [
            'artista' => $artista,
            'form' => $formulario->createView()
        ]);
    }
}
