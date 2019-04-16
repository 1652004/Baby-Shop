<?php

namespace App\Controller;


use App\Entity\Taikhoan;
use App\Entity\Loaitaikhoan;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{

    /**
     * @Route("/login",name="login")
     *
     */
    public function loginAction(Request $request)
    {
        $session = new Session();
        /*$error = $utils->getLastAuthenticationError();
        $lastUser = $utils->getLastUsername();*/
        if (!is_null($session->get('tenhienthi')) && !is_null($session->get('id')) && $session->get('role')==1 ) {
            return $this->redirectToRoute('home');
        }

        if (isset($_POST['login'])) {
            $pas = md5($_POST['password']);
            $pas1 = substr($pas, 0, 20);
                //Này là user
                $check = $this->getDoctrine()
                    ->getRepository(Taikhoan::class)
                    ->findBy(['tendangnhap' => $_POST['username'], 'matkhau' => $pas1,'bixoa'=>0]);
                        //return new Response("<h1>$pas1</h1>");
            if (!$check) {
                return $this->render('login.html.twig', ['error' => "Your username or password is incorrect"]);
            }

            foreach ($check as $item) {
                $session->set('role', $item->getMaloaitaikhoan()->getMaloaitaikhoan());
            }
            $id = $item->getMaloaitaikhoan()->getMaloaitaikhoan();
            if($id == 2){
                $session->set('tenhienthi', $item->getTenhienthi());
                $session->set('id', $item->getMataikhoan());
                return $this->redirect("https://031d7c31.ngrok.io/admin/home");
            }
            else if($id == 1) {
                $session->set('tenhienthi', $item->getTenhienthi());
                $session->set('id', $item->getMataikhoan());
                return $this->redirectToRoute('home');
            }
            else
            {
                return $this->render('login.html.twig', ['error' => 'Somethings went wrong']);

            }

        }

        return $this->render('login.html.twig', ['error' => '']);
    }
}