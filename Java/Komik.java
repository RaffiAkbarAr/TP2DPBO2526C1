public class Komik extends Buku {
    private String genre;
    private int jumlahHalaman;
    private int volume;

    public Komik(String kodeProduk, String namaProduk, int harga,
                 String penulis, String penerbit, int tahunTerbit,
                 String genre, int jumlahHalaman, int volume) {
        super(kodeProduk, namaProduk, harga, penulis, penerbit, tahunTerbit);
        this.genre = genre;
        this.jumlahHalaman = jumlahHalaman;
        this.volume = volume;
    }

    public String getGenre() { return genre; }
    public int getJumlahHalaman() { return jumlahHalaman; }
    public int getVolume() { return volume; }

    public void setGenre(String genre) { this.genre = genre; }
    public void setJumlahHalaman(int jumlahHalaman) { this.jumlahHalaman = jumlahHalaman; }
    public void setVolume(int volume) { this.volume = volume; }
}
