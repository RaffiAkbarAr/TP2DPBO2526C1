from Produk import Produk

class Buku(Produk):
    def __init__(self, kodeProduk, namaProduk, harga, penulis, penerbit, tahunTerbit):
        super().__init__(kodeProduk, namaProduk, harga)
        self.penulis = penulis
        self.penerbit = penerbit
        self.tahunTerbit = tahunTerbit

    def getPenulis(self):
        return self.penulis

    def getPenerbit(self):
        return self.penerbit

    def getTahunTerbit(self):
        return self.tahunTerbit

    def setPenulis(self, penulis):
        self.penulis = penulis

    def setPenerbit(self, penerbit):
        self.penerbit = penerbit

    def setTahunTerbit(self, tahunTerbit):
        self.tahunTerbit = tahunTerbit
