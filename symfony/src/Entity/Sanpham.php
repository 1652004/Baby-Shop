<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sanpham
 *
 * @ORM\Table(name="sanpham", indexes={@ORM\Index(name="fk_SanPham_HangSanXuat1_idx", columns={"MaHangSanXuat"}), @ORM\Index(name="fk_SanPham_LoaiSanPham1_idx", columns={"MaLoaiSanPham"})})
 * @ORM\Entity(repositoryClass="App\Repository\SanphamRepository")
 */
class Sanpham
{
    /**
     * @var int
     *@ORM\OneToMany(targetEntity="Chitietdondathang")
     * @ORM\Column(name="MaSanPham", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $masanpham;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TenSanPham", type="string", length=45, nullable=true)
     */
    private $tensanpham;

    /**
     * @var string|null
     *
     * @ORM\Column(name="HinhURL", type="string", length=45, nullable=true)
     */
    private $hinhurl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="GiaSanPham", type="integer", nullable=true)
     */
    private $giasanpham;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="NgayNhap", type="datetime", nullable=true)
     */
    private $ngaynhap;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SoLuongTon", type="integer", nullable=true)
     */
    private $soluongton;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SoLuongBan", type="integer", nullable=true)
     */
    private $soluongban;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SoLuocXem", type="integer", nullable=true)
     */
    private $soluocxem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MoTa", type="text", length=65535, nullable=true)
     */
    private $mota;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="BiXoa", type="boolean", nullable=true)
     */
    private $bixoa = '0';

    /**
     * @var \Hangsanxuat
     *
     * @ORM\ManyToOne(targetEntity="Hangsanxuat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MaHangSanXuat", referencedColumnName="MaHangSanXuat")
     * })
     */
    private $mahangsanxuat;

    /**
     * @var \Loaisanpham
     *
     * @ORM\ManyToOne(targetEntity="Loaisanpham")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MaLoaiSanPham", referencedColumnName="MaLoaiSanPham")
     * })
     */
    private $maloaisanpham;

    var $quantity;

    /**
     * @return bool|null
     */
    public function getBixoa(): ?bool
    {
        return $this->bixoa;
    }

    /**
     * @return \DateTime|null
     */
    public function getNgaynhap(): ?\DateTime
    {
        return $this->ngaynhap;
    }

    /**
     * @return int|null
     */
    public function getSoluocxem(): ?int
    {
        return $this->soluocxem;
    }

    /**
     * @return null|string
     */
    public function getMota(): ?string
    {
        return $this->mota;
    }

    /**
     * @return \Loaisanpham
     */
    public function getMaloaisanpham(): \Loaisanpham
    {
        return $this->maloaisanpham;
    }

    /**
     * @return \Hangsanxuat
     */
    public function getMahangsanxuat(): \Hangsanxuat
    {
        return $this->mahangsanxuat;
    }

    /**
     * @return int
     */
    public function getMasanpham(): int
    {
        return $this->masanpham;
    }

    /**
     * @return int|null
     */
    public function getGiasanpham(): ?int
    {
        return $this->giasanpham;
    }

    /**
     * @return null|string
     */
    public function getTensanpham(): ?string
    {
        return $this->tensanpham;
    }

    /**
     * @return null|string
     */
    public function getHinhurl(): ?string
    {
        return $this->hinhurl;
    }

    /**
     * @return int|null
     */
    public function getSoluongban(): ?int
    {
        return $this->soluongban;
    }

    /**
     * @return int|null
     */
    public function getSoluongton(): ?int
    {
        return $this->soluongton;
    }

    /**
     * @param bool|null $bixoa
     */
    public function setBixoa(?bool $bixoa): void
    {
        $this->bixoa = $bixoa;
    }

    /**
     * @param int $masanpham
     */
    public function setMasanpham(int $masanpham): void
    {
        $this->masanpham = $masanpham;
    }

    /**
     * @param int|null $giasanpham
     */
    public function setGiasanpham(?int $giasanpham): void
    {
        $this->giasanpham = $giasanpham;
    }

    /**
     * @param null|string $hinhurl
     */
    public function setHinhurl(?string $hinhurl): void
    {
        $this->hinhurl = $hinhurl;
    }

    /**
     * @param \Hangsanxuat $mahangsanxuat
     */
    public function setMahangsanxuat(\Hangsanxuat $mahangsanxuat): void
    {
        $this->mahangsanxuat = $mahangsanxuat;
    }

    /**
     * @param \Loaisanpham $maloaisanpham
     */
    public function setMaloaisanpham(\Loaisanpham $maloaisanpham): void
    {
        $this->maloaisanpham = $maloaisanpham;
    }

    /**
     * @param null|string $mota
     */
    public function setMota(?string $mota): void
    {
        $this->mota = $mota;
    }

    /**
     * @param \DateTime|null $ngaynhap
     */
    public function setNgaynhap(?\DateTime $ngaynhap): void
    {
        $this->ngaynhap = $ngaynhap;
    }

    /**
     * @param int|null $soluocxem
     */
    public function setSoluocxem(?int $soluocxem): void
    {
        $this->soluocxem = $soluocxem;
    }

    /**
     * @param int|null $soluongban
     */
    public function setSoluongban(?int $soluongban): void
    {
        $this->soluongban = $soluongban;
    }

    /**
     * @param int|null $soluongton
     */
    public function setSoluongton(?int $soluongton): void
    {
        $this->soluongton = $soluongton;
    }

    /**
     * @param null|string $tensanpham
     */
    public function setTensanpham(?string $tensanpham): void
    {
        $this->tensanpham = $tensanpham;
    }

}
