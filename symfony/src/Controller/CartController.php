<?php

namespace App\Controller;

use App\Entity\Sanpham;
use  App\Entity\Cart;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/cart/",name="Cart")
     */
    public function index()
    {

        $session = new Session();
        if (is_null($session->get('tenhienthi'))) {
            /*$name = unserialize($session->get('Cart'));

            foreach ($name as $item)
            {
                 $a = $item->showCart();
            }
            //
            return new Response("<h1>" . $a . "</h1>");*/
            return $this->redirectToRoute('login');
        }
        if (is_null($session->get('Cart')))
            return $this->render('cart/cart.html.twig', ['cart' => '']);
        //return new Response("<h1>unserialize($session->get('Cart'))</h1>");
        else {
            $prod = unserialize($session->get('Cart'));
            return $this->render('cart/cart.html.twig', ['cart' => $prod->showCart()]);

        }
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/cart/add/{id}",name="addCart")
     */
    public function add($id,Request $request)
    {
        $session = new Session();
        if (is_null($session->get('tenhienthi'))) {
            return $this->redirectToRoute('login');
        }

        $product = $this->getDoctrine()->getRepository(Sanpham::class)
            ->find($id);
        if (!$product) {
            return $this->render('error.html.twig', ['error' => 'ID product not found!']);
        } else {
            if (!is_null($session->get('Cart'))) {
                $cart = unserialize($session->get('Cart'));
            } else {
                $cart = new Cart();
            }
            $cart->Add($id);
            $count = 0;
            foreach ($cart->showCart() as $item) {
                $count = $count + $item->quantity;
            }
            $item->setTensanpham($product->getTensanpham());
            $item->setGiasanpham($product->getGiasanpham());
            $item->setHinhurl($product->getHinhurl());
            $session->set('quant', $count);
            $session->set('Cart', serialize($cart));
        }
        return $this->redirect($request->headers->get('referer')); //ĐỂ ĐÓ XÍU SỬA
    }

    /**
     * @Route("/cart/remove/{id}",name="removeProductFromCart")
     */
    public function rmProdFromList($id)
    {
        $session = new Session();
        if (is_null($session->get('tenhienthi'))) {
            return $this->redirectToRoute('login');
        }
        $product = $this->getDoctrine()->getRepository(Sanpham::class)
            ->find($id);
        if (!$product) {
            return $this->render('error.html.twig', ['error' => 'ID product not found!']);
        } else {
            if (!is_null($session->get('Cart'))) {
                $cart = unserialize($session->get('Cart'));
            } else {
                return $this->redirectToRoute('Cart',['cart'=>'']);
            }
            if(count($cart->showCart()) == 1)
            {
                unset($cart);
                $session->remove('Cart');
                $session->remove('quant');
                return $this->redirectToRoute('Cart',['cart'=>'']);
            }
            $cart->delete($id);
            $count = 0;
            foreach ($cart->showCart() as $item) {
                $count = $count + $item->quantity;
            }
           /* $item->setTensanpham($product->getTensanpham());
            $item->setGiasanpham($product->getGiasanpham());
            $item->setHinhurl($product->getHinhurl());*/
            $session->set('quant', $count);
            $session->set('Cart', serialize($cart));
        }
        return $this->redirectToRoute('Cart'); //ĐỂ ĐÓ XÍU SỬA


    }

    /**
     * @Route("/add/cart/",name="addQuantity")
     */
    public function updatePr(Request $request)
    {
        $session = new Session();
        if (is_null($session->get('tenhienthi'))) {
            return $this->redirectToRoute('login');
        }
        if (isset($_POST['addcart'])) {
            $sl = $_POST['quant'];
            if ($sl > 0) {
                $id = $_POST['pid'];
                $product = $this->getDoctrine()->getRepository(Sanpham::class)
                    ->find($id);
                if (!$product) {
                    return $this->redirectToRoute('home');//Sửa lại báo lỗi
                } else {
                    if (!is_null($session->get('Cart'))) {
                        $cart = unserialize($session->get('Cart'));
                    } else
                        $cart = new Cart();
                    $cart->addProdQuan($sl, $id);
                    $count = 0;
                    foreach ($cart->showCart() as $item) {
                        $count = $count + $item->quantity;
                    }
                    $item->setTensanpham($product->getTensanpham());
                    $item->setGiasanpham($product->getGiasanpham());
                    $item->setHinhurl($product->getHinhurl());
                    $session->set('quant', $count);
                    $session->set('Cart', serialize($cart));
                }
            } else
                return $this->render('error.html.twig', ['error' => "Value error"]);
        } else
            return $this->redirectToRoute('home');
     return   $this->redirect($request->headers->get('referer'));
    }


}