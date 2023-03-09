<?php

namespace App\Controller;

use App\Entity\Artista;
use App\Form\ArtistaType;
use App\Form\CambiarClaveType;
use App\Repository\ArtistaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
        $this->denyAccessUnlessGranted('ROLE_ARTISTA');
        $artista = $artistaRepository->new();

        return $this->modificarArtista($request, $artista, $artistaRepository);
    }

    /**
     * @Route("/artista/modificar/{id}", name="artista_modificar")
     */
    public function modificarArtista(Request $request, Artista $artista, ArtistaRepository $artistaRepository) : Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
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

    /**
     * @Route("artista/eliminar/{id}", name="artista_eliminar")
     */
    public function eliminarArtista(Request $request, Artista $artista, ArtistaRepository $artistaRepository) : Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if($request->getMethod() == 'POST' ){
            try{
                $artistaRepository->remove($artista);
                $this->addFlash('exito', 'artista borrado');
                return $this->redirect('../../artista/listar');
            } catch (\Exception $e){
                $this->addFlash('error', 'no se pudo borrar');
                return $this->redirect('../../artista/listar');
            }
        }

        return $this->render('artista/eliminar.html.twig', [
            'artista' => $artista
        ]);
    }

    /**
     * @Route("/artista/clave", name="artista_cambiar_clave")
     */
    public function cambiarClave(Request $request, UserPasswordEncoderInterface $passwordEncoder, ArtistaRepository $artistaRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ARTISTA');
        $form = $this->createForm(CambiarClaveType::class, $this->getUser(), [
            'admin' => $this->isGranted('ROLE_ADMIN')
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->getUser()->setClave(
                    $passwordEncoder->encodePassword(
                        $this->getUser(), $form->get('nuevaClave')->get('first')->getData()
                    )
                );
                $artistaRepository->guardar();
                $this->addFlash('exito', 'Cambios guardados con éxito');
                return $this->redirectToRoute('inicio');
            } catch (\Exception $e) {
                $this->addFlash('error', 'No se ha podido guardar');
            }
        }
        return $this->render('artista/clave.html.twig', [
            'artista' => $this->getUser(),
            'form' => $form->createView()
        ]);
    }
}
