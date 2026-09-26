public class Buku extends Produk {
    private String penulis;
    private String penerbit;
    private int tahunTerbit;

    public Buku(String kodeProduk, String namaProduk, int harga,
                String penulis, String penerbit, int tahunTerbit) {
        super(kodeProduk, namaProduk, harga);
        this.penulis = penulis;
        this.penerbit = penerbit;
        this.tahunTerbit = tahunTerbit;
    }

    public String getPenulis() { return penulis; }
    public String getPenerbit() { return penerbit; }
    public int getTahunTerbit() { return tahunTerbit; }

    public void setPenulis(String penulis) { this.penulis = penulis; }
    public void setPenerbit(String penerbit) { this.penerbit = penerbit; }
    public void setTahunTerbit(int tahunTerbit) { this.tahunTerbit = tahunTerbit; }
}
