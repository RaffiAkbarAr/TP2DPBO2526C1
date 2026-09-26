<?php
require_once "Buku.php";

class Komik extends Buku {
    private $genre;
    private $jumlahHalaman;
    private $volume;
    private $foto_produk;

    public function __construct($kodeProduk, $namaProduk, $harga, $penulis, $penerbit, $tahunTerbit,
                                $genre, $jumlahHalaman, $volume, $foto_produk) {
        parent::__construct($kodeProduk, $namaProduk, $harga, $penulis, $penerbit, $tahunTerbit);
        $this->genre = $genre;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->volume = $volume;
        $this->foto_produk = $foto_produk;
    }

    public function getGenre() { return $this->genre; }
    public function getJumlahHalaman() { return $this->jumlahHalaman; }
    public function getVolume() { return $this->volume; }
    public function getFotoProduk() { return $this->foto_produk; }
}
?>