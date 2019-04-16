<?php
//
namespace App\Controller;

use App\Entity\Sanpham;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */
    public function loadPro(Request $request)
    {
        $session = new Session();
        $new_product = $this->getDoctrine()
            ->getRepository(Sanpham::class)
            //->findAll()
            ->loadNewProduct();
        $hot_views = $this->getDoctrine()
            ->getRepository(Sanpham::class)
            //->findAll()
            ->loadHotViews();
        if (!$new_product || !$hot_views) {
            return $this->render('error.html.twig', ['error' => 'ERROR LOAD OBJECT']);

        }


        return $this->render('home/prod-home.html.twig', ['new_products' => $new_product, 'hot_views' => $hot_views]);
    }

    /**
     * @Route("/product/{id}",name="pro_id")
     */
    public function info($id)
    {
        $prod = $this->getDoctrine()
            ->getRepository(Sanpham::class)
            ->find($id);
        if (!$prod) {
            return $this->render('error.html.twig', ['error' => 'Sorry, this product does not exist or removed']);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Sanpham::class)->find($id);
        $product->setSoluocxem($product->getSoluocxem()+1);
        $entityManager->flush();
        return $this->render('product/info.html.twig', ['product' => $prod]);
    }

}