#include <string>
using namespace std;

class Produk {
protected:
    string kodeProduk, namaProduk;
    int harga;

public:
    Produk(string kodeProduk, string namaProduk, int harga) {
        this->kodeProduk = kodeProduk;
        this->namaProduk = namaProduk;
        this->harga = harga;
    }

    string getKodeProduk() { return kodeProduk; }
    string getNamaProduk() { return namaProduk; }
    int getHarga() { return harga; }

    void setKodeProduk(string kodeProduk) { this->kodeProduk = kodeProduk; }
    void setNamaProduk(string namaProduk) { this->namaProduk = namaProduk; }
    void setHarga(int harga) { this->harga = harga; }
};
