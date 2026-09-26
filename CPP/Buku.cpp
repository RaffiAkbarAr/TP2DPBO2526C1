#include "Produk.cpp"
using namespace std;

class Buku : public Produk {
protected:
    string penulis, penerbit;
    int tahunTerbit;

public:
    Buku(string kodeProduk, string namaProduk, int harga,
         string penulis, string penerbit, int tahunTerbit)
        : Produk(kodeProduk, namaProduk, harga) {
        this->penulis = penulis;
        this->penerbit = penerbit;
        this->tahunTerbit = tahunTerbit;
    }

    string getPenulis() { return penulis; }
    string getPenerbit() { return penerbit; }
    int getTahunTerbit() { return tahunTerbit; }

    void setPenulis(string penulis) { this->penulis = penulis; }
    void setPenerbit(string penerbit) { this->penerbit = penerbit; }
    void setTahunTerbit(int tahunTerbit) { this->tahunTerbit = tahunTerbit; }
};
