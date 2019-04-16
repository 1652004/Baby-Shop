<?php

namespace App\Repository;
use App\Entity\Taikhoan;
use App\Entity\Loaitaikhoan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\DBAL\Driver\PDOStatement;
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Taikhoan::class);
    }

    public function RegRepo($name,$usr,$pass,$sdt,$email,$dc)
    {
        global $db;
        $conn = $this->getEntityManager()->getConnection();
        //$a = split("@",$email);
        $sql ='
        INSERT INTO Taikhoan(TenDangNhap, MatKhau, TenHienThi, DiaChi, DienThoai, Email, MaLoaiTaiKhoan)
					VALUES (:usr,:pass,:nameu,:dc,:sdt,:mail,1)
        ';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':usr',$usr);
        $stmt->bindValue(':pass',$pass);
        $stmt->bindValue(':nameu',$name);
        $stmt->bindValue(':dc',$dc);
        $stmt->bindValue(':sdt',$sdt);
        $stmt->bindValue(':mail',$email);
        $stmt->bindValue(':role',1);

        /*$stmt->bindValue(':sdt',$sdt);
        $stmt->bindValue(':mail',$email);*/
        $stmt->execute();
        //$stmt->closeCursor();

        // returns an array of arrays (i.e. a raw data set)
        $result = $stmt->fetchAll();
        return $result;
    }

}