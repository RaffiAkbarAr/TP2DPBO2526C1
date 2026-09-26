from Buku import Buku

class Komik(Buku):
    def __init__(self, kodeProduk, namaProduk, harga, penulis, penerbit, tahunTerbit,
                 genre, jumlahHalaman, volume):
        super().__init__(kodeProduk, namaProduk, harga, penulis, penerbit, tahunTerbit)
        self.genre = genre
        self.jumlahHalaman = jumlahHalaman
        self.volume = volume

    def getGenre(self):
        return self.genre

    def getJumlahHalaman(self):
        return self.jumlahHalaman

    def getVolume(self):
        return self.volume

    def setGenre(self, genre):
        self.genre = genre

    def setJumlahHalaman(self, jumlahHalaman):
        self.jumlahHalaman = jumlahHalaman

    def setVolume(self, volume):
        self.volume = volume
