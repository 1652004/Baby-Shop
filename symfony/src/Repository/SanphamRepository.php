<?php


namespace App\Repository;

use App\Entity\Sanpham;
use App\Entity\Loaisanpham;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SanphamRepository extends ServiceEntityRepository
{


    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sanpham::class);
    }

    /**
     * @return Sanpham[]
     */
    public function loadNewProduct()
    {

        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.bixoa=0')
            ->orderBy('p.ngaynhap', 'DESC')
            ->getQuery();


        // to get just one result:
        $product = $qb->setMaxResults(4);
        return $product->execute();

    }

    /**
     * @return Sanpham[]
     */
    public function loadHotViews()
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.bixoa=0')
            ->orderBy('p.soluocxem', 'DESC')
            ->getQuery();


        // to get just one result:
        $product = $qb->setMaxResults(4);
        return $product->execute();
    }

    public function updateView($id,$SoLuocXem)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "UPDATE SanPham SET SoLuocXem = $SoLuocXem 
			WHERE MaSanPham = $id";;
        $stmt = $conn->prepare($sql);
        //$stmt->execute(['key' => $key]);
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function search($key)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT * FROM sanpham p, loaisanpham l
        WHERE p.bixoa=0 and p.maloaisanpham = l.maloaisanpham and (p.tensanpham like :key or p.masanpham like :key or p.mota like :key or l.tenloaisanpham like :key or p.giasanpham <= :key)
        ORDER BY p.ngaynhap DESC 
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['key' => $key]);
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
}