#include "Buku.cpp"
using namespace std;

class Komik : public Buku {
private:
    string genre;
    int jumlahHalaman;
    int volume;

public:
    Komik(string kodeProduk, string namaProduk, int harga,
          string penulis, string penerbit, int tahunTerbit,
          string genre, int jumlahHalaman, int volume)
        : Buku(kodeProduk, namaProduk, harga, penulis, penerbit, tahunTerbit) {
        this->genre = genre;
        this->jumlahHalaman = jumlahHalaman;
        this->volume = volume;
    }

    string getGenre() { return genre; }
    int getJumlahHalaman() { return jumlahHalaman; }
    int getVolume() { return volume; }

    void setGenre(string genre) { this->genre = genre; }
    void setJumlahHalaman(int jumlahHalaman) { this->jumlahHalaman = jumlahHalaman; }
    void setVolume(int volume) { this->volume = volume; }
};
