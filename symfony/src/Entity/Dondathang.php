<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dondathang
 *
 * @ORM\Table(name="dondathang", indexes={@ORM\Index(name="fk_DonDatHang_TinhTrang1_idx", columns={"MaTinhTrang"}), @ORM\Index(name="fk_DonDatHang_TaiKhoan1_idx", columns={"MaTaiKhoan"})})
 * @ORM\Entity(repositoryClass="App\Repository\DonhangRepository")
 */
class Dondathang
{
    /**
     * @var ArrayCollection
     *
     */
    private $listItem;

    public function __construct(string $ma,\DateTime $ngay,int $tong,?Tinhtrang $status,?Taikhoan $user )
{
    $this->listItem = new ArrayCollection();
    $this->madondathang = $ma;
    $this->ngaylap = $ngay;
    $this->mataikhoan=$user;
    $this->tongthanhtien=$tong;
    $this->matinhtrang = $status;
}


    /**
     * @return Collection|Chitietdondathang[]
     */
    public function getListItem(): ArrayCollection
    {
        return $this->listItem;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="MaDonDatHang", type="string", length=9, nullable=false)
     * @ORM\Id
     *
     */
    private $madondathang ;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="NgayLap", type="datetime", nullable=true)
     */
    private $ngaylap;

    /**
     * @var int|null
     *
     * @ORM\Column(name="TongThanhTien", type="integer", nullable=true)
     */
    private $tongthanhtien;

    /**
     * @var \Taikhoan
     *
     * @ORM\ManyToOne(targetEntity="Taikhoan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MaTaiKhoan", referencedColumnName="MaTaiKhoan")
     * })
     */
    private $mataikhoan;

    /**
     * @var \Tinhtrang
     *
     * @ORM\ManyToOne(targetEntity="Tinhtrang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MaTinhTrang", referencedColumnName="MaTinhTrang")
     * })
     */
    private $matinhtrang;

    /**
     * @return \Taikhoan
     */
    public function getMataikhoan(): ?Taikhoan
    {
        return $this->mataikhoan;
    }

    /**
     * @return string
     */
    public function getMadondathang(): string
    {
        return $this->madondathang;
    }

    /**
     * @return \Tinhtrang
     */
    public function getMatinhtrang(): ?Tinhtrang
    {
        return $this->matinhtrang;
    }

    /**
     * @return \DateTime|null
     */
    public function getNgaylap(): ?DateTime
    {
        return $this->ngaylap;
    }

    /**
     * @return int|null
     */
    public function getTongthanhtien(): ?int
    {
        return $this->tongthanhtien;
    }

    /**
     * @param \Taikhoan $mataikhoan
     */
    public function setMataikhoan(?Taikhoan $mataikhoan): self
    {
        $this->mataikhoan = $mataikhoan;
        return $this;
    }

    /**
     * @param string $madondathang
     */
    public function setMadondathang(?string $madondathang): void
    {
        $this->madondathang = $madondathang;
    }

    /**
     * @param \Tinhtrang $matinhtrang
     */
    public function setMatinhtrang(?Tinhtrang $matinhtrang): self
    {
        $this->matinhtrang = $matinhtrang;
        return $this;
    }

    /**
     * @param \DateTime|null $ngaylap
     */
    public function setNgaylap(\DateTime $ngaylap): void
    {
        $this->ngaylap = $ngaylap;
    }

    /**
     * @param int|null $tongthanhtien
     */
    public function setTongthanhtien(?int $tongthanhtien): void
    {
        $this->tongthanhtien = $tongthanhtien;
    }

  /*  public function __construct(string $ma,\DateTime $ngay,int $tong,?Tinhtrang $status,?Taikhoan $user )
    {
        //$this->listItem = new ArrayCollection();
        $this->madondathang = $ma;
        $this->ngaylap = $ngay;
        $this->mataikhoan=$user;
        $this->tongthanhtien=$tong;
        $this->matinhtrang = $status;
    }*/
}
