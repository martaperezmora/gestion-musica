<?php

namespace App\Controller;

use App\Entity\Banda;
use App\Form\BandaType;
use App\Repository\BandaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/banda/nuevo", name="banda_nuevo")
     */
    public function nuevaBanda(Request $request, BandaRepository $bandaRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_COMPOSITOR');
        $banda = $bandaRepository->new();

        return $this->modificarBanda($request, $banda, $bandaRepository);
    }

    /**
     * @Route("/banda/modificar/{id}", name="banda_modificar")
     */
    public function modificarBanda(Request $request, Banda $banda, BandaRepository $bandaRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $formulario = $this->createForm(BandaType::class, $banda);

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            try {
                $bandaRepository->save($banda);
                $this->addFlash('exito', 'datos guardados');
            } catch (\Exception $e) {
                $this->addFlash('error', 'no se ha podido guardar');
            }
        }
        return $this->render('banda/formulario.html.twig', [
            'banda' => $banda,
            'form' => $formulario->createView()
        ]);
    }

    /**
     * @Route("banda/eliminar/{id}", name="banda_eliminar")
     */
    public function eliminarBanda(Request $request, Banda $banda, BandaRepository $bandaRepository) : Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if($request->getMethod() == 'POST' ){
            try{
                $bandaRepository->remove($banda);
                $this->addFlash('exito', 'banda borrada');
                return $this->redirect('../../banda/listar');
            } catch (\Exception $e){
                $this->addFlash('error', 'no se pudo borrar');
                return $this->redirect('../../banda/listar');
            }
        }

        return $this->render('banda/eliminar.html.twig', [
            'banda' => $banda
        ]);
    }
}
