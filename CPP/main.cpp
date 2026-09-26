#include <iostream>
#include <vector>
#include <string>
#include <iomanip>
#include "Komik.cpp"
using namespace std;

void tampilkanData(vector<Komik>& data) {
    cout << "\n============================================== DATA KOMIK ==============================================\n";
    cout << left
         << setw(6) << "Kode" << " | "
         << setw(20) << "Nama Produk" << " | "
         << setw(8) << "Harga" << " | "
         << setw(20) << "Penulis" << " | "
         << setw(14) << "Penerbit" << " | "
         << setw(5) << "Tahun" << " | "
         << setw(12) << "Genre" << " | "
         << setw(8) << "Halaman" << " | "
         << setw(6) << "Volume" << "\n";
    cout << "---------------------------------------------------------------------------------------------------------------\n";
    for (Komik &x : data) {
        cout << left
             << setw(6) << x.getKodeProduk() << " | "
             << setw(20) << x.getNamaProduk() << " | "
             << setw(8) << x.getHarga() << " | "
             << setw(20) << x.getPenulis() << " | "
             << setw(14) << x.getPenerbit() << " | "
             << setw(5) << x.getTahunTerbit() << " | "
             << setw(12) << x.getGenre() << " | "
             << setw(8) << x.getJumlahHalaman() << " | "
             << setw(6) << x.getVolume() << " |\n";
    }
    cout << "---------------------------------------------------------------------------------------------------------------\n";
}

void tambahkanData(vector<Komik>& data) {
    string kode, nama, penulis, penerbit, genre;
    int harga, tahun, halaman, volume;

    cout << "\n============= TAMBAHKAN DATA KOMIK =============\n";
    cout << "Kode produk: "; cin >> kode;
    cout << "Nama komik: "; cin.ignore(); getline(cin, nama);
    cout << "Harga: "; cin >> harga;
    cout << "Penulis: "; cin.ignore(); getline(cin, penulis);
    cout << "Penerbit: "; getline(cin, penerbit);
    cout << "Tahun terbit: "; cin >> tahun;
    cout << "Genre: "; cin.ignore(); getline(cin, genre);
    cout << "Jumlah halaman: "; cin >> halaman;
    cout << "Volume: "; cin >> volume;

    data.push_back(Komik(kode, nama, harga, penulis, penerbit, tahun, genre, halaman, volume));
    cout << "Data komik berhasil ditambahkan.\n";
}

int main() {
    vector<Komik> data;

    data.push_back(Komik("K001", "One Piece", 45000, "Eiichiro Oda", "Elex Media", 1997, "Petualangan", 192, 1));
    data.push_back(Komik("K002", "Naruto", 40000, "Masashi Kishimoto", "Elex Media", 1999, "Aksi", 192, 1));
    data.push_back(Komik("K003", "Doraemon", 35000, "Fujiko F. Fujio", "Elex Media", 1970, "Komedi", 190, 1));
    data.push_back(Komik("K004", "Detective Conan", 42000, "Gosho Aoyama", "Elex Media", 1994, "Misteri", 192, 2));
    data.push_back(Komik("K005", "Dragon Ball", 38000, "Akira Toriyama", "Elex Media", 1984, "Aksi", 192, 3));

    int pilihan;

    do {
        cout << "\n==============================================\n";
        cout << "             TOKO BUKU - KOMIK\n";
        cout << "==============================================\n";
        cout << "1. Tambahkan Data Komik\n";
        cout << "2. Tampilkan Data Komik\n";
        cout << "3. Keluar\n";
        cout << "Pilih fitur: ";
        cin >> pilihan;

        if (pilihan == 1) {
            tambahkanData(data);
        } else if (pilihan == 2) {
            tampilkanData(data);
        } else if (pilihan == 3) {
            cout << "Program selesai.\n";
        } else {
            cout << "Pilihan tidak tersedia.\n";
        }
    } while (pilihan != 3);

    return 0;
}
