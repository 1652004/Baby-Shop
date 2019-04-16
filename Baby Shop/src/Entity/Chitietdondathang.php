<?php

namespace App\Entity;
use App\Entity\Dondathang;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Chitietdondathang
 *
 * @ORM\Table(name="chitietdondathang", indexes={@ORM\Index(name="fk_ChiTietDonDatHang_SanPham1_idx", columns={"MaSanPham"}), @ORM\Index(name="fk_ChiTietDonDatHang_DonDatHang1_idx", columns={"MaDonDatHang"})})
 * @ORM\Entity(repositoryClass="App\Repository\DonhangRepository")
 */
class Chitietdondathang
{

    /**
     * @var string
     *
     * @ORM\Column(name="MaChiTietDonDatHang", type="string", length=11, nullable=false)
     * @ORM\Id
     *
     */
    private $machitietdondathang;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SoLuong", type="integer", nullable=true)
     */
    private $soluong;

    /**
     * @var int|null
     *
     * @ORM\Column(name="GiaBan", type="integer", nullable=true)
     */
    private $giaban;

    /**
     * @var \Dondathang
     *
     * @ORM\ManyToOne(targetEntity="Dondathang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MaDonDatHang", referencedColumnName="MaDonDatHang")
     * })
     */
    private $madondathang;

    /**
     * @var \Sanpham
     *
     * @ORM\ManyToOne(targetEntity="Sanpham")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MaSanPham", referencedColumnName="MaSanPham")
     * })
     */
    private $masanpham;

    /**
     * @return \Dondathang
     */
    public function getMadondathang(): ?Dondathang
    {
        return $this->madondathang;
    }

    /**
     * @return \Sanpham
     */
    public function getMasanpham(): ?Sanpham
    {
        return $this->masanpham;
    }

    /**
     * @return int|null
     */
    public function getGiaban(): ?int
    {
        return $this->giaban;
    }

    /**
     * @return string
     */
    public function getMachitietdondathang(): string
    {
        return $this->machitietdondathang;
    }

    /**
     * @return int|null
     */
    public function getSoluong(): ?int
    {
        return $this->soluong;
    }

    /**
     * @param \Dondathang $madondathang
     */
    public function setMadondathang(?Dondathang $madondathang): void
    {
        $this->madondathang = $madondathang;
    }

    /**
     * @param \Sanpham $masanpham
     */
    public function setMasanpham(?Sanpham $masanpham): void
    {
        $this->masanpham = $masanpham;
    }

    /**
     * @param int|null $giaban
     */
    public function setGiaban(?int $giaban): void
    {
        $this->giaban = $giaban;
    }


    /**
     * @param string $machitietdondathang
     */
    public function setMachitietdondathang(string $machitietdondathang): void
    {
        $this->machitietdondathang = $machitietdondathang;
    }

    /**
     * @param int|null $soluong
     */
    public function setSoluong(?int $soluong): void
    {
        $this->soluong = $soluong;
    }

    public function __construct(string $machitiet,int $sl,int $gia,?Dondathang $madon,?Sanpham $sanpham)
    {
        $this->machitietdondathang = $machitiet;
        $this->soluong = $sl;
        $this->giaban = $gia;
        $this->madondathang = $madon;
        $this->masanpham = $sanpham;
    }
}
