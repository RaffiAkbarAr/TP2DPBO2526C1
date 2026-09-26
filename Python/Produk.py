class Produk:
    def __init__(self, kodeProduk, namaProduk, harga):
        self.kodeProduk = kodeProduk
        self.namaProduk = namaProduk
        self.harga = harga

    def getKodeProduk(self):
        return self.kodeProduk

    def getNamaProduk(self):
        return self.namaProduk

    def getHarga(self):
        return self.harga

    def setKodeProduk(self, kodeProduk):
        self.kodeProduk = kodeProduk

    def setNamaProduk(self, namaProduk):
        self.namaProduk = namaProduk

    def setHarga(self, harga):
        self.harga = harga
