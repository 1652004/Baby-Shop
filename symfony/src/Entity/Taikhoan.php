<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Taikhoan
 *
 * @ORM\Table(name="taikhoan", indexes={@ORM\Index(name="fk_TaiKhoan_LoaiTaiKhoan_idx", columns={"MaLoaiTaiKhoan"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class Taikhoan implements UserInterface
{


    /**
     * @var int
     *
     * @ORM\Column(name="MaTaiKhoan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mataikhoan;

    /**
     * @var string|null
     *@ORM\OneToMany(targetEntity="Dondathang")
     * @ORM\Column(name="TenDangNhap", type="string", length=20, nullable=true)
     */
    private $tendangnhap;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MatKhau", type="string", length=20, nullable=true)
     */
    private $matkhau;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TenHienThi", type="string", length=64, nullable=true)
     */
    private $tenhienthi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DiaChi", type="string", length=256, nullable=true)
     */
    private $diachi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DienThoai", type="string", length=11, nullable=true)
     */
    private $dienthoai;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=30, nullable=true)
     */
    private $email;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="BiXoa", type="boolean", nullable=true)
     */
    private $bixoa = '0';

    /**
     * @var \Loaitaikhoan
     *
     * @ORM\ManyToOne(targetEntity="Loaitaikhoan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MaLoaiTaiKhoan", referencedColumnName="MaLoaiTaiKhoan")
     * })
     */
    private $maloaitaikhoan;


    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
        return null;
    }

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        return $this->maloaitaikhoan;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }


    public function getPassword()
    {
        // TODO: Implement getPassword() method.
        return $this->getMatkhau();
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
        $this->getTendangnhap();
    }

    /**
     * @return bool|null
     */
    public function getBixoa(): ?bool
    {
        return $this->bixoa;
    }

    /**
     * @return null|string
     */
    public function getDiachi(): ?string
    {
        return $this->diachi;
    }

    /**
     * @return null|string
     */
    public function getDienthoai(): ?string
    {
        return $this->dienthoai;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getMataikhoan(): int
    {
        return $this->mataikhoan;
    }

    /**
     * @return null|string
     */
    public function getTenhienthi(): ?string
    {
        return $this->tenhienthi;
    }

    /**
     * @return \Loaitaikhoan
     */
    public function getMaloaitaikhoan(): ?Loaitaikhoan
    {
        return $this->maloaitaikhoan;
    }
    /**
     * @return null|string
     */
    public function getMatkhau(): ?string
    {
        return $this->matkhau;
    }
    /**
     * @return null|string
     */
    public function getTendangnhap(): ?string
    {
        return $this->tendangnhap;
    }

    /*public function unserialize($string)
    {
        // TODO: Implement unserialize() method.
        list(
            $this->maloaitaikhoan,
            $this->mataikhoan,
            $this->tendangnhap,
            $this->matkhau,
            $this->tenhienthi,
            $this->diachi,
            $this->dienthoai,
            $this->bixoa,
            $this->email
            ) = $this->unserialize($string,['allowed_classes'=>false]);
    }
    public function serialize()
    {
        // TODO: Implement serialize() method.
        return serialize([
            $this->maloaitaikhoan,
            $this->mataikhoan,
            $this->tendangnhap,
            $this->matkhau,
            $this->tenhienthi,
            $this->diachi,
            $this->dienthoai,
            $this->bixoa,
            $this->email
        ]);
    }*/

    /**
     * @param bool|null $bixoa
     */
    public function setBixoa(?bool $bixoa): void
    {
        $this->bixoa = $bixoa;
    }

    /**
     * @param null|string $diachi
     */
    public function setDiachi(?string $diachi): void
    {
        $this->diachi = $diachi;
    }

    /**
     * @param null|string $dienthoai
     */
    public function setDienthoai(?string $dienthoai): void
    {
        $this->dienthoai = $dienthoai;
    }

    /**
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param \Loaitaikhoan $maloaitaikhoan
     */
    public function setMaloaitaikhoan(?Loaitaikhoan $maloaitaikhoan): self
    {
        $this->maloaitaikhoan = $maloaitaikhoan;
        return $this;
    }

    /**
     * @param int $mataikhoan
     */
    public function setMataikhoan(int $mataikhoan): void
    {
        $this->mataikhoan = $mataikhoan;
    }

    /**
     * @param null|string $matkhau
     */
    public function setMatkhau(?string $matkhau): void
    {
        $this->matkhau = $matkhau;
    }

    /**
     * @param null|string $tendangnhap
     */
    public function setTendangnhap(?string $tendangnhap): void
    {
        $this->tendangnhap = $tendangnhap;
    }

    /**
     * @param null|string $tenhienthi
     */
    public function setTenhienthi(?string $tenhienthi): void
    {
        $this->tenhienthi = $tenhienthi;
    }

}
