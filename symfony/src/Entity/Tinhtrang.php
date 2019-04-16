<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tinhtrang
 *
 * @ORM\Table(name="tinhtrang")
 * @ORM\Entity
 */
class Tinhtrang
{
    /**
     * @var int
     *@ORM\OneToMany(targetEntity="App\Entity\Dondathang",mappedBy="madondathang")
     * @ORM\Column(name="MaTinhTrang", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $matinhtrang;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TenTinhTrang", type="string", length=45, nullable=true)
     */
    private $tentinhtrang;


}
