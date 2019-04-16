<?php

namespace App\Controller;

use App\Entity\Chitietdondathang;
use App\Entity\Dondathang;
use App\Entity\Sanpham;
use App\Entity\Taikhoan;
use App\Entity\Tinhtrang;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class BillController extends AbstractController
{
    /**
     * @Route("/payment",name="Payment")
     */
    public function Pay()
    {
        $session = new Session();
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $dateTemp = date('Y-m-d H:i:s');
        $dateCreate = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTemp);
        $ngayNhap = $dateCreate->format('Y-m-d H:i:s');
        $Temp = $dateCreate->format('ymd');

        if ($session->get('role') == 1 && !is_null($session->get('tenhienthi')))
            if (!is_null($session->get('Cart'))) {
                $entity = $this->getDoctrine()->getManager();

                $status = $entity->getRepository(Tinhtrang::class)->find(1);
                $user = $entity->getRepository(Taikhoan::class)->find($session->get('id'));
                $resultMadon = $entity->getRepository(Dondathang::class)->getNewMDH();
                $cart = unserialize($session->get('Cart'));
                $stt = 0;
                if ($resultMadon) {
                    foreach ($resultMadon as $item) {
                        $madonDB = substr($item->getMadondathang(), 0, 6);
                        if ($madonDB == $Temp) {
                            $stt = substr($item->getMadondathang(), 6, 3);
                            $stt += 1;
                            $newMaDon = $Temp . sprintf("%03s", $stt);
                        } else
                            $newMaDon = $Temp . "000";
                    }

                    //return new Response("<h1>".is_string($newMaDon)."</h1>");
                    $bill = new Dondathang($newMaDon, $dateCreate, $_POST['sumbill'], $status, $user);
                    /* $bill->setMadondathang($newMaDon);
                     $bill->setNgaylap($dateCreate);
                     $bill->setTongthanhtien($_POST['sumbill']);
                     $bill->setMataikhoan($user);
                     $bill->setMatinhtrang($status);*/
                    $entity->persist($bill);
                    //$entity->getRepository(Dondathang::class)->addDondathang("8889898989", $ngayNhap, $_POST['sumbill'], $session->get('id'), 1);
                    $count = 0;

                    foreach ($cart->showCart() as $item) {
                        $prod = $entity->getRepository(Sanpham::class)->find($item->getMasanpham());
                        $info = new Chitietdondathang($bill->getMadondathang() . sprintf("%02s", $count)
                            ,$item->quantity,$item->getGiasanpham(),$bill,$prod);
                        $entity->persist($info);
                        $count++;
                    }

                    $entity->flush();
                    $session->remove('Cart');
                    $session->remove('quant');
                } else {//Không trích được ds
                    return $this->render('error.html.twig', ['error' => "Cannot find product"]);
                }
            }
        return $this->redirectToRoute('Cart', ['cart' => '']);

    }
}