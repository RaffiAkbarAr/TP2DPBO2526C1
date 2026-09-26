<?php
require_once "Komik.php";

// Inisialisasi Data Awal (termasuk testcase Si Juki)
$data = [
    new Komik("K001", "One Piece", 45000, "Eiichiro Oda", "Elex Media", 1997, "Petualangan", 192, 1, "images/One Piece.jpg"),
    new Komik("K002", "Naruto", 40000, "Masashi Kishimoto", "Elex Media", 1999, "Aksi", 192, 1, "images/naruto.jpg"),
    new Komik("K003", "Doraemon", 35000, "Fujiko F. Fujio", "Elex Media", 1970, "Komedi", 190, 1, "images/doraemon.jpg"),
    new Komik("K004", "Detective Conan", 42000, "Gosho Aoyama", "Elex Media", 1994, "Misteri", 192, 2, "images/Detective conan.jpg"),
    new Komik("K005", "Dragon Ball", 38000, "Akira Toriyama", "Elex Media", 1984, "Aksi", 192, 3, "images/Dragon Ball.jpg"),
];

$pesan = "";
// Halaman default saat pertama buka adalah 'home' (Tampilan Awal)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Proses simpan data saat form dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pathFoto = "images/default.jpg";

    // Penanganan Unggah File Gambar (Choose File)
    if (isset($_FILES["foto_file"]) && $_FILES["foto_file"]["error"] == 0) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = time() . "_" . basename($_FILES["foto_file"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["foto_file"]["tmp_name"], $targetFilePath)) {
            $pathFoto = $targetFilePath;
        }
    }

    $komikBaru = new Komik(
        $_POST["kodeProduk"],
        $_POST["namaProduk"],
        (int)$_POST["harga"],
        $_POST["penulis"],
        $_POST["penerbit"],
        (int)$_POST["tahunTerbit"],
        $_POST["genre"],
        (int)$_POST["jumlahHalaman"],
        (int)$_POST["volume"],
        $pathFoto
    );
    $data[] = $komikBaru;
    $pesan = "Data komik berhasil ditambahkan!";
    $page = 'tampil'; // Otomatis beralih ke daftar komik setelah submit
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KOMIK21 - Komik</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #eef2f6; margin: 0; padding: 20px; color: #1e293b; }
        .container { max-width: 1000px; margin: 0 auto; background: #ffffff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); overflow: hidden; }
        .header { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #ffffff; text-align: center; padding: 30px 20px; }
        .header h1 { margin: 0; font-size: 28px; letter-spacing: 1px; }
        .header p { margin: 5px 0 0; opacity: 0.8; font-size: 14px; }
        .alert { background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; padding: 12px 20px; margin: 20px; border-radius: 8px; text-align: center; font-weight: bold; }
        .nav-buttons { display: flex; gap: 15px; padding: 20px 20px 0; border-bottom: 2px solid #f1f5f9; }
        .nav-btn { flex: 1; padding: 15px; text-align: center; text-decoration: none; color: #475569; background: #f8fafc; border-radius: 8px 8px 0 0; font-weight: bold; font-size: 15px; border: 1px solid #e2e8f0; border-bottom: none; transition: 0.3s; }
        .nav-btn.active { background: #1e3c72; color: #ffffff; border-color: #1e3c72; }
        .content { padding: 30px; }
        .card-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px; }
        .action-card { background: #f8fafc; border: 2px dashed #cbd5e1; border-radius: 12px; padding: 30px; text-align: center; cursor: pointer; text-decoration: none; color: inherit; transition: 0.3s; }
        .action-card:hover { border-color: #2a5298; background: #f0f7ff; transform: translateY(-3px); }
        .action-card h3 { margin: 10px 0 5px; color: #1e3c72; font-size: 20px; }
        .action-card p { margin: 0; color: #64748b; font-size: 13px; }
        .form-table { width: 100%; border-spacing: 0 12px; }
        .form-table td { padding: 4px 8px; vertical-align: middle; }
        input[type="text"], input[type="number"], input[type="file"] { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; }
        .btn-submit { background: #16a34a; color: white; border: none; padding: 12px 24px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 15px; }
        .btn-submit:hover { background: #15803d; }
        table.data-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table.data-table th { background: #1e3c72; color: white; padding: 12px; font-size: 13px; text-align: center; }
        table.data-table td { padding: 10px; border-bottom: 1px solid #e2e8f0; text-align: center; font-size: 14px; }
        table.data-table tr:nth-child(even) { background-color: #f8fafc; }
        .cover-img { width: 50px; height: 65px; object-fit: cover; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container">
    <!-- Header Utama -->
    <div class="header">
        <h1>📚 KOMIK21</h1>
        <p>Sistem Informasi Manajemen Data Komik</p>
    </div>

    <!-- Notifikasi Sukses -->
    <?php if ($pesan): ?>
        <div class="alert"><?= $pesan; ?></div>
    <?php endif; ?>

    <!-- Navigasi Menu Utama -->
    <div class="nav-buttons">
        <a href="index.php?page=home" class="nav-btn <?= ($page == 'home') ? 'active' : ''; ?>">🏠 Tampilan Awal</a>
        <a href="index.php?page=tambah" class="nav-btn <?= ($page == 'tambah') ? 'active' : ''; ?>">➕ Tambahkan Data Komik</a>
        <a href="index.php?page=tampil" class="nav-btn <?= ($page == 'tampil') ? 'active' : ''; ?>">📋 Tampilkan Data Komik</a>
    </div>

    <div class="content">

        <!-- 1. HALAMAN TAMPILAN AWAL (HOME) -->
        <?php if ($page == 'home'): ?>
            <div style="text-align: center; padding: 10px 0 30px;">
                <h2 style="color: #1e3c72; margin-bottom: 5px;">Selamat Datang di  KOMIK21</h2>
                <p style="color: #64748b; margin-top: 0;">Pilih salah satu menu di bawah ini untuk mengelola data koleksi komik:</p>
            </div>

            <div class="card-grid">
                <a href="index.php?page=tambah" class="action-card">
                    <div style="font-size: 40px;">➕</div>
                    <h3>Tambahkan Data Komik</h3>
                    <p>Isi formulir lengkap dan unggah file gambar sampul komik baru.</p>
                </a>

                <a href="index.php?page=tampil" class="action-card">
                    <div style="font-size: 40px;">📋</div>
                    <h3>Tampilkan Data Komik</h3>
                    <p>Lihat seluruh daftar komik yang tersimpan beserta detailnya (Total: <b><?= count($data); ?> Komik</b>).</p>
                </a>
            </div>
        <?php endif; ?>

        <!-- 2. HALAMAN FORM TAMBAH DATA KOMIK -->
        <?php if ($page == 'tambah'): ?>
            <h2 style="color: #1e3c72; margin-top: 0; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">➕ Formulir Tambah Data Komik</h2>
            
            <form method="post" action="index.php?page=tambah" enctype="multipart/form-data">
                <table class="form-table">
                    <tr>
                        <td width="15%"><b>Kode Produk</b></td>
                        <td width="35%"><input type="text" name="kodeProduk" placeholder="K007" required></td>
                        <td width="15%"><b>Tahun Terbit</b></td>
                        <td width="35%"><input type="number" name="tahunTerbit" placeholder="2022" required></td>
                    </tr>
                    <tr>
                        <td><b>Nama Komik</b></td>
                        <td><input type="text" name="namaProduk" placeholder="Judul Komik" required></td>
                        <td><b>Genre</b></td>
                        <td><input type="text" name="genre" placeholder="Komedi / Aksi" required></td>
                    </tr>
                    <tr>
                        <td><b>Harga (Rp)</b></td>
                        <td><input type="number" name="harga" placeholder="45000" required></td>
                        <td><b>Jumlah Halaman</b></td>
                        <td><input type="number" name="jumlahHalaman" placeholder="120" required></td>
                    </tr>
                    <tr>
                        <td><b>Penulis</b></td>
                        <td><input type="text" name="penulis" placeholder="Nama Penulis" required></td>
                        <td><b>Volume</b></td>
                        <td><input type="number" name="volume" placeholder="1" required></td>
                    </tr>
                    <tr>
                        <td><b>Penerbit</b></td>
                        <td><input type="text" name="penerbit" placeholder="Nama Penerbit" required></td>
                        <td><b>Foto Sampul</b></td>
                        <td><input type="file" name="foto_file" accept="image/*" required></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; padding-top: 15px;">
                            <button type="submit" class="btn-submit">Simpan Data Komik</button>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>

        <!-- 3. HALAMAN TABEL TAMPILKAN DATA KOMIK -->
        <?php if ($page == 'tampil'): ?>
            <h2 style="color: #1e3c72; margin-top: 0; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📋 Daftar Seluruh Data Komik</h2>
            
            <table class="data-table">
                <thead>
                    <tr>
                        <th>FOTO</th>
                        <th>KODE</th>
                        <th>NAMA PRODUK</th>
                        <th>HARGA</th>
                        <th>PENULIS</th>
                        <th>PENERBIT</th>
                        <th>TAHUN</th>
                        <th>GENRE</th>
                        <th>HALAMAN</th>
                        <th>VOL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $x): ?>
                    <tr>
                        <td><img src="<?= htmlspecialchars($x->getFotoProduk()); ?>" class="cover-img" alt="Sampul"></td>
                        <td><b><?= htmlspecialchars($x->getKodeProduk()); ?></b></td>
                        <td style="text-align: left;"><b><?= htmlspecialchars($x->getNamaProduk()); ?></b></td>
                        <td style="text-align: right;">Rp <?= number_format($x->getHarga(), 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($x->getPenulis()); ?></td>
                        <td><?= htmlspecialchars($x->getPenerbit()); ?></td>
                        <td><?= htmlspecialchars($x->getTahunTerbit()); ?></td>
                        <td><?= htmlspecialchars($x->getGenre()); ?></td>
                        <td><?= htmlspecialchars($x->getJumlahHalaman()); ?></td>
                        <td><?= htmlspecialchars($x->getVolume()); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
</div>

</body>
</html>