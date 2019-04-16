<?php

namespace App\Entity;
use App\Entity\Taikhoan;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Loaitaikhoan
 *
 * @ORM\Table(name="loaitaikhoan")
 * @ORM\Entity
 */
class Loaitaikhoan
{

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Taikhoan",mappedBy="maloaitaikhoan")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }
    /**
     * @return Collection|Taikhoan[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }
    /**
     * @var int
     *

     * @ORM\Column(name="MaLoaiTaiKhoan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $maloaitaikhoan ;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TenLoaiTaiKhoan", type="string", length=45, nullable=true)
     */
    private $tenloaitaikhoan;

    /**
     * @return null|string
     */
    public function getTenloaitaikhoan(): string
    {
        return $this->tenloaitaikhoan;
    }

    /**
     * @return Collection|Taikhoan[]
     */
    public function getMaloaitaikhoan(): int
    {
        return $this->maloaitaikhoan;
    }

    /**
     * @param int $maloaitaikhoan
     */
    public function setMaloaitaikhoan(?int $maloaitaikhoan): void
    {
        $this->maloaitaikhoan = $maloaitaikhoan;
    }

    /**
     * @param null|string $tenloaitaikhoan
     */
    public function setTenloaitaikhoan(?string $tenloaitaikhoan): void
    {
        $this->tenloaitaikhoan = $tenloaitaikhoan;

    }



}
