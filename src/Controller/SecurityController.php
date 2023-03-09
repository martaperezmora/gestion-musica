<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/entrar", name="entrar")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils) : Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('seguridad/login.html.twig', [
            'error' => $error,
            'ultimo_usuario' => $lastUsername
        ]);
    }
    /**
     * @Route("/salir", name="salir")
     */
    public function logout()
    {
    }

}