<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hangsanxuat
 *
 * @ORM\Table(name="hangsanxuat")
 * @ORM\Entity
 */
class Hangsanxuat
{
    /**
     * @var int
     *
     * @ORM\Column(name="MaHangSanXuat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mahangsanxuat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TenHangSanXuat", type="string", length=64, nullable=true)
     */
    private $tenhangsanxuat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LogoURL", type="string", length=45, nullable=true)
     */
    private $logourl;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="BiXoa", type="boolean", nullable=true)
     */
    private $bixoa = '0';


}
