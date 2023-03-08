<?php

namespace App\Controller;

use App\Entity\Disco;
use App\Form\DiscoType;
use App\Repository\DiscoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/disco/nuevo", name="disco_nuevo")
     */
    public function nuevoDisco(Request $request, DiscoRepository $discoRepository) : Response
    {
        $disco = $discoRepository->new();

        return $this->modificarDisco($request, $disco, $discoRepository);
    }

    /**
     * @Route("/disco/modificar/{id}", name="disco_modificar")
     */
    public function modificarDisco(Request $request, Disco $disco, DiscoRepository $discoRepository) : Response
    {
        $formulario = $this->createForm(DiscoType::class, $disco);

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            try {
                $discoRepository->save($disco);
                $this->addFlash('exito', 'datos guardados');
            } catch (\Exception $e) {
                $this->addFlash('error', 'no se ha podido guardar');
            }
        }

        return $this->render('disco/formulario.html.twig', [
            'disco' => $disco,
            'form' => $formulario->createView()
        ]);
    }

    /**
     * @Route("disco/eliminar/{id}", name="disco_eliminar")
     */
    public function eliminarDisco(Request $request, Disco $disco, DiscoRepository $discoRepository) : Response
    {
        if($request->getMethod() == 'POST' ){
            try{
                $discoRepository->remove($disco);
                $this->addFlash('exito', 'disco borrado');
                return $this->redirect('../../disco/listar');
            } catch (\Exception $e){
                $this->addFlash('error', 'no se pudo borrar');
                return $this->redirect('../../disco/listar');
            }
        }

        return $this->render('disco/eliminar.html.twig', [
            'disco' => $disco
        ]);
    }
}
