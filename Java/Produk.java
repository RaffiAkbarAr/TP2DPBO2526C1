public class Produk {
    private String kodeProduk;
    private String namaProduk;
    private int harga;

    public Produk(String kodeProduk, String namaProduk, int harga) {
        this.kodeProduk = kodeProduk;
        this.namaProduk = namaProduk;
        this.harga = harga;
    }

    public String getKodeProduk() { return kodeProduk; }
    public String getNamaProduk() { return namaProduk; }
    public int getHarga() { return harga; }

    public void setKodeProduk(String kodeProduk) { this.kodeProduk = kodeProduk; }
    public void setNamaProduk(String namaProduk) { this.namaProduk = namaProduk; }
    public void setHarga(int harga) { this.harga = harga; }
}
