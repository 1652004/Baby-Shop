<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loaisanpham
 *
 * @ORM\Table(name="loaisanpham")
 * @ORM\Entity
 */
class Loaisanpham
{
    /**
     * @var int
     *
     * @ORM\Column(name="MaLoaiSanPham", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $maloaisanpham;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TenLoaiSanPham", type="string", length=64, nullable=true)
     */
    private $tenloaisanpham;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="BiXoa", type="boolean", nullable=true)
     */
    private $bixoa = '0';

    /**
     * @return int
     */
    public function getMaloaisanpham(): int
    {
        return $this->maloaisanpham;
    }

    /**
     * @return bool|null
     */
    public function getBixoa(): ?bool
    {
        return $this->bixoa;
    }

}
