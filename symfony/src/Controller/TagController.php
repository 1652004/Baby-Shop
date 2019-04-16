<?php

namespace App\Controller;

use App\Entity\Sanpham;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TagController extends AbstractController
{
    /**
     * @Route("/tag/{key}",name="tag")
     */
    public function Tag($key)
    {
        $prod = $this->getDoctrine()
            ->getRepository(Sanpham::class)
            ->search(urldecode($key));

        if(!$prod)
        {
            return $this->render('error.html.twig',['error'=>'Product not fount']);
        }
        return $this->render('tags/tag.html.twig',['products'=>$prod,'key'=> urldecode($key )]);
    }
}