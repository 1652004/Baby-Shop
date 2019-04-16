<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/13/2019
 * Time: 7:41 AM
 */

namespace App\Repository;

use App\Entity\Dondathang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DonhangRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Dondathang::class);
    }

    public function getNewMDH()
    {
        $res = $this->createQueryBuilder('dh')
            ->orderBy('dh.ngaylap', 'DESC')
            ->getQuery();
        $code = $res->setMaxResults(1);
        return $code->execute();
    }


}