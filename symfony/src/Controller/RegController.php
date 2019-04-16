<?php

namespace App\Controller;

use App\Entity\Loaitaikhoan;
use App\Entity\Taikhoan;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\Translation\TranslatorInterface;

use Symfony\Component\Translation\Reader\TranslationReaderInterface;

class RegController extends AbstractController
{
    /**
     * @Route("/reg",name="reg")
     */
    public function Reg(Request $request)
    {
        $session = new Session();
        if (isset($_POST['register'])) {
            $usr = new Taikhoan();
            //$temp = new Loaitaikhoan();
            $entityManager = $this->getDoctrine()->getManager();
            $loai = $entityManager->getRepository(Loaitaikhoan::class)->find(1);
            $usr->setTenhienthi($_POST['nameu']);
            $check = $this->getDoctrine()
                ->getRepository(Taikhoan::class)
                ->findOneBy(['tendangnhap' => $_POST['nameu']]);
            if (!$check) {
                $usr->setTendangnhap($_POST['usr']);
            } else
                return $this->redirectToRoute('login', ['error' => 'Username has already exists']);
             if ($_POST['psw'] == $_POST['re-psw']) {
                 $pas = substr(md5($_POST['psw']), 0, 20);
                 $usr->setMatkhau($pas);
             }
             else
                 return $this->render('login.html.twig', ['code' => "Retype password is not correct"]);
             $usr->setMaloaitaikhoan($loai);
             $usr->setDienthoai($_POST['sdt']);
             $usr->setEmail($_POST['email']);
             $usr->setDiachi($_POST['diachi']);
            //$temp->user[] = $usr;
            $entityManager->persist($usr);
             $entityManager->flush();
             $session->set('tenhienthi',$usr->getTendangnhap());
            $session->set('id',$usr->getMataikhoan());
            $session->set('role',1);
            return $this->redirectToRoute('home');
        }
        return $this->redirectToRoute('home');
    }
}