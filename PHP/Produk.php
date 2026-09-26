<?php
class Produk {
    protected $kodeProduk;
    protected $namaProduk;
    protected $harga;

    public function __construct($kodeProduk, $namaProduk, $harga) {
        $this->kodeProduk = $kodeProduk;
        $this->namaProduk = $namaProduk;
        $this->harga = $harga;
    }

    public function getKodeProduk() { return $this->kodeProduk; }
    public function getNamaProduk() { return $this->namaProduk; }
    public function getHarga() { return $this->harga; }
}
?>