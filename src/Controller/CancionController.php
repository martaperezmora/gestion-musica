<?php

namespace App\Controller;

use App\Entity\Cancion;
use App\Form\CancionType;
use App\Repository\CancionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/cancion/nuevo", name="cancion_nuevo")
     */
    public function nuevoCancion(Request $request, CancionRepository $cancionRepository) : Response
    {
        $this->denyAccessUnlessGranted('ROLE_COMPOSITOR');
        $cancion = $cancionRepository->new();

        return $this->modificarCancion($request, $cancion, $cancionRepository);
    }

    /**
     * @Route("/cancion/modificar/{id}", name="cancion_modificar")
     */
    public function modificarCancion(Request $request, Cancion $cancion, CancionRepository $cancionRepository) : Response
    {
        $this->denyAccessUnlessGranted('ROLE_COMPOSITOR');
        $formulario = $this->createForm(CancionType::class, $cancion);

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            try {
                $cancionRepository->save($cancion);
                $this->addFlash('exito', 'datos guardados');
            } catch (\Exception $e) {
                $this->addFlash('error', 'no se ha podido guardar');
            }
        }

        return $this->render('cancion/formulario.html.twig', [
            'cancion' => $cancion,
            'form' => $formulario->createView()
        ]);
    }

    /**
     * @Route("cancion/eliminar/{id}", name="cancion_eliminar")
     */
    public function eliminarCancion(Request $request, Cancion $cancion, CancionRepository $dancionRepository) : Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if($request->getMethod() == 'POST' ){
            try{
                $dancionRepository->remove($cancion);
                $this->addFlash('exito', 'cancion borrada');
                return $this->redirect('../../cancion/listar');
            } catch (\Exception $e){
                $this->addFlash('error', 'no se pudo borrar');
                return $this->redirect('../../cancion/listar');
            }
        }

        return $this->render('cancion/eliminar.html.twig', [
            'cancion' => $cancion
        ]);
    }
}
