<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/11/2019
 * Time: 11:04 AM
 */

namespace App\Entity;

use App\Entity\Sanpham;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\Session\Session;

class Cart
{
    private $listProd;

    public function __construct()
    {
        $this->listProd = new ArrayCollection();
    }

    public function showCart(): Collection
    {
        return $this->listProd;
    }

    public function delete($id){
        for($i = 0; $i < count($this->listProd); $i++){
            if($this->listProd[$i]->getMasanpham() == $id)
                unset($this->listProd[$i]);
                //array_splice($this->listProd,$i, 1)
        }
        return $this->listProd;
    }

    public function addProdQuan($sl,$id)
    {
        if(count($this->listProd)==0)
        {
            $product = new Sanpham();
            $product->setMasanpham($id);
            $product->quantity = $sl;
            $this->listProd[] = $product;
        }
        else {
            for ($i = 0; $i < count($this->listProd); $i++) {
                if ($this->listProd[$i]->getMasanpham() == $id)
                    break;
            }
            if ($i < count($this->listProd)) {
                $this->listProd[$i]->quantity = $this->listProd[$i]->quantity+$sl;
            }
            else
            {
                $product = new  Sanpham();
                $product->setMasanpham($id);
                $product->quantity = $sl;
                $this->listProd[] = $product;
            }
        }
    }
    public function Add($id)
    {
        if (count($this->listProd) == 0) {
            $product = new Sanpham();
            $product->setMasanpham($id);
            $product->quantity = 1;
            $this->listProd[] = $product;
        } else {
            for ($i = 0; $i < count($this->listProd); $i++) {
                if ($this->listProd[$i]->getMasanpham() == $id)
                    break;
            }
            if ($i < count($this->listProd)) {
                $this->listProd[$i]->quantity++;
            }
            else
            {
                $product = new  Sanpham();
                $product->setMasanpham($id);
                $product->quantity = 1;
                $this->listProd[] = $product;
            }
        }
    }
}
