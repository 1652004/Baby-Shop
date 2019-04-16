<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190111123621 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE chitietdondathang CHANGE MaChiTietDonDatHang MaChiTietDonDatHang VARCHAR(11) NOT NULL, CHANGE MaDonDatHang MaDonDatHang VARCHAR(9) DEFAULT NULL, CHANGE MaSanPham MaSanPham INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dondathang CHANGE MaDonDatHang MaDonDatHang VARCHAR(9) NOT NULL, CHANGE MaTaiKhoan MaTaiKhoan INT DEFAULT NULL, CHANGE MaTinhTrang MaTinhTrang INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hangsanxuat CHANGE BiXoa BiXoa TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE loaisanpham CHANGE BiXoa BiXoa TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE loaitaikhoan CHANGE MaLoaiTaiKhoan MaLoaiTaiKhoan INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE sanpham CHANGE BiXoa BiXoa TINYINT(1) DEFAULT NULL, CHANGE MaLoaiSanPham MaLoaiSanPham INT DEFAULT NULL, CHANGE MaHangSanXuat MaHangSanXuat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE taikhoan CHANGE BiXoa BiXoa TINYINT(1) DEFAULT NULL, CHANGE MaLoaiTaiKhoan MaLoaiTaiKhoan INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE chitietdondathang CHANGE MaChiTietDonDatHang MaChiTietDonDatHang VARCHAR(11) NOT NULL COLLATE utf8_unicode_ci, CHANGE MaDonDatHang MaDonDatHang VARCHAR(9) NOT NULL COLLATE utf8_unicode_ci, CHANGE MaSanPham MaSanPham INT NOT NULL');
        $this->addSql('ALTER TABLE dondathang CHANGE MaDonDatHang MaDonDatHang VARCHAR(9) NOT NULL COLLATE utf8_unicode_ci, CHANGE MaTaiKhoan MaTaiKhoan INT NOT NULL, CHANGE MaTinhTrang MaTinhTrang INT NOT NULL');
        $this->addSql('ALTER TABLE hangsanxuat CHANGE BiXoa BiXoa TINYINT(1) DEFAULT \'0\'');
        $this->addSql('ALTER TABLE loaisanpham CHANGE BiXoa BiXoa TINYINT(1) DEFAULT \'0\'');
        $this->addSql('ALTER TABLE loaitaikhoan CHANGE MaLoaiTaiKhoan MaLoaiTaiKhoan INT NOT NULL');
        $this->addSql('ALTER TABLE sanpham CHANGE BiXoa BiXoa TINYINT(1) DEFAULT \'0\', CHANGE MaHangSanXuat MaHangSanXuat INT NOT NULL, CHANGE MaLoaiSanPham MaLoaiSanPham INT NOT NULL');
        $this->addSql('ALTER TABLE taikhoan CHANGE BiXoa BiXoa TINYINT(1) DEFAULT \'0\', CHANGE MaLoaiTaiKhoan MaLoaiTaiKhoan INT NOT NULL');
    }
}
