import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static ArrayList<Komik> data = new ArrayList<>();

    public static void main(String[] args) {
        data.add(new Komik("K001", "One Piece", 45000, "Eiichiro Oda", "Elex Media", 1997, "Petualangan", 192, 1));
        data.add(new Komik("K002", "Naruto", 40000, "Masashi Kishimoto", "Elex Media", 1999, "Aksi", 192, 1));
        data.add(new Komik("K003", "Doraemon", 35000, "Fujiko F. Fujio", "Elex Media", 1970, "Komedi", 190, 1));
        data.add(new Komik("K004", "Detective Conan", 42000, "Gosho Aoyama", "Elex Media", 1994, "Misteri", 192, 2));
        data.add(new Komik("K005", "Dragon Ball", 38000, "Akira Toriyama", "Elex Media", 1984, "Aksi", 192, 3));

        Scanner input = new Scanner(System.in);
        int pilihan;

        do {
            System.out.println("\n==============================================");
            System.out.println("             TOKO BUKU - KOMIK");
            System.out.println("==============================================");
            System.out.println("1. Tambahkan Data Komik");
            System.out.println("2. Tampilkan Data Komik");
            System.out.println("3. Keluar");
            System.out.print("Pilih fitur: ");
            pilihan = input.nextInt();
            input.nextLine();

            if (pilihan == 1) {
                tambahkanData(input);
            } else if (pilihan == 2) {
                tampilkanData();
            } else if (pilihan == 3) {
                System.out.println("Program selesai.");
            } else {
                System.out.println("Pilihan tidak tersedia.");
            }
        } while (pilihan != 3);
    }

    public static void tambahkanData(Scanner input) {
        System.out.println("\n============= TAMBAHKAN DATA KOMIK =============");
        System.out.print("Kode produk: "); String kode = input.nextLine();
        System.out.print("Nama komik: "); String nama = input.nextLine();
        System.out.print("Harga: "); int harga = input.nextInt(); input.nextLine();
        System.out.print("Penulis: "); String penulis = input.nextLine();
        System.out.print("Penerbit: "); String penerbit = input.nextLine();
        System.out.print("Tahun terbit: "); int tahun = input.nextInt(); input.nextLine();
        System.out.print("Genre: "); String genre = input.nextLine();
        System.out.print("Jumlah halaman: "); int halaman = input.nextInt();
        System.out.print("Volume: "); int volume = input.nextInt();

        data.add(new Komik(kode, nama, harga, penulis, penerbit, tahun, genre, halaman, volume));
        System.out.println("Data komik berhasil ditambahkan.");
    }

    public static void tampilkanData() {
        System.out.println("\n============================================== DATA KOMIK ==============================================");
        System.out.printf("+------+----------------------+----------+----------------------+----------------+-------+--------------+----------+--------+%n");
        System.out.printf("| %-4s | %-20s | %-8s | %-20s | %-14s | %-5s | %-12s | %-8s | %-6s |%n",
                "Kode", "Nama Produk", "Harga", "Penulis", "Penerbit", "Tahun", "Genre", "Halaman", "Volume");
        System.out.printf("+------+----------------------+----------+----------------------+----------------+-------+--------------+----------+--------+%n");
        for (Komik x : data) {
            System.out.printf("| %-4s | %-20s | %-8d | %-20s | %-14s | %-5d | %-12s | %-8d | %-6d |%n",
                    x.getKodeProduk(), x.getNamaProduk(), x.getHarga(), x.getPenulis(), x.getPenerbit(),
                    x.getTahunTerbit(), x.getGenre(), x.getJumlahHalaman(), x.getVolume());
        }
        System.out.printf("+------+----------------------+----------+----------------------+----------------+-------+--------------+----------+--------+%n");
    }
}
