from Komik import Komik

data = [
    Komik("K001", "One Piece", 45000, "Eiichiro Oda", "Elex Media", 1997, "Petualangan", 192, 1),
    Komik("K002", "Naruto", 40000, "Masashi Kishimoto", "Elex Media", 1999, "Aksi", 192, 1),
    Komik("K003", "Doraemon", 35000, "Fujiko F. Fujio", "Elex Media", 1970, "Komedi", 190, 1),
    Komik("K004", "Detective Conan", 42000, "Gosho Aoyama", "Elex Media", 1994, "Misteri", 192, 2),
    Komik("K005", "Dragon Ball", 38000, "Akira Toriyama", "Elex Media", 1984, "Aksi", 192, 3)
]

def tampilkan_data():
    print("\n============================================== DATA KOMIK ==============================================")
    print("+------+----------------------+----------+----------------------+----------------+-------+--------------+----------+--------+")
    print("| Kode | Nama Produk          | Harga    | Penulis              | Penerbit       | Tahun | Genre        | Halaman  | Volume |")
    print("+------+----------------------+----------+----------------------+----------------+-------+--------------+----------+--------+")
    for x in data:
        print(f"| {x.getKodeProduk():<4} | {x.getNamaProduk():<20} | {x.getHarga():<8} | {x.getPenulis():<20} | {x.getPenerbit():<14} | {x.getTahunTerbit():<5} | {x.getGenre():<12} | {x.getJumlahHalaman():<8} | {x.getVolume():<6} |")
    print("+------+----------------------+----------+----------------------+----------------+-------+--------------+----------+--------+")

def tambahkan_data():
    print("\n============= TAMBAHKAN DATA KOMIK =============")
    kode = input("Kode produk: ")
    nama = input("Nama komik: ")
    harga = int(input("Harga: "))
    penulis = input("Penulis: ")
    penerbit = input("Penerbit: ")
    tahun = int(input("Tahun terbit: "))
    genre = input("Genre: ")
    halaman = int(input("Jumlah halaman: "))
    volume = int(input("Volume: "))

    data.append(Komik(kode, nama, harga, penulis, penerbit, tahun, genre, halaman, volume))
    print("Data komik berhasil ditambahkan.")

while True:
    print("\n==============================================")
    print("             TOKO BUKU - KOMIK")
    print("==============================================")
    print("1. Tambahkan Data Komik")
    print("2. Tampilkan Data Komik")
    print("3. Keluar")
    pilihan = input("Pilih fitur: ")

    if pilihan == "1":
        tambahkan_data()
    elif pilihan == "2":
        tampilkan_data()
    elif pilihan == "3":
        print("Program selesai.")
        break
    else:
        print("Pilihan tidak tersedia.")
