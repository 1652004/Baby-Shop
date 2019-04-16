<?php

namespace App\Controller;

use App\Entity\Sanpham;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
/**
 * @Route("/search/",name="Search")
 */

public function Search()
{
    $key = $_GET['s'];
    $prod = $this->getDoctrine()
        ->getRepository(Sanpham::class)
        ->search($key);

    if(!$prod)
    {
        return $this->render('error.html.twig',['error'=>'Product not fount']);
    }
    return $this->render('search/search.html.twig',['products'=>$prod,'key'=> urldecode($key )]);
}
}