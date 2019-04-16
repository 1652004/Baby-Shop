<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;

class LogoutContreller extends AbstractController
{
    /**
     * @Route("/logout",name="logout")
     */
    public function logout()
    {
        $session = new Session();

        $session->clear();
        return $this->redirectToRoute('home');
    }
}