<?php
require_once "Produk.php";

class Buku extends Produk {
    protected $penulis;
    protected $penerbit;
    protected $tahunTerbit;

    public function __construct($kodeProduk, $namaProduk, $harga, $penulis, $penerbit, $tahunTerbit) {
        parent::__construct($kodeProduk, $namaProduk, $harga);
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->tahunTerbit = $tahunTerbit;
    }

    public function getPenulis() { return $this->penulis; }
    public function getPenerbit() { return $this->penerbit; }
    public function getTahunTerbit() { return $this->tahunTerbit; }
}
?>