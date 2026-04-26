<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

if (isset($_POST['btnSubmit'])) {
    $nama      = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nama_lengkap']));
    $email     = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $tanggal   = mysqli_real_escape_string($conn, $_POST['tanggal_jemput']);
    $alamat    = mysqli_real_escape_string($conn, htmlspecialchars($_POST['alamat']));
    $kerusakan = mysqli_real_escape_string($conn, htmlspecialchars($_POST['detail_kerusakan']));

    $query = "INSERT INTO bookings (nama_lengkap, email, tanggal_jemput, alamat, detail_kerusakan) 
              VALUES ('$nama', '$email', '$tanggal', '$alamat', '$kerusakan')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('DATA BERHASIL MASUK KE DATABASE!'); 
                window.location.href='index.php';
              </script>";
        exit;
    } else {
        die("<h3 style='color:red;'>Gagal menyimpan ke database! Error: " . mysqli_error($conn) . "</h3>");
    }
}
?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FixLapBot id - Web Programming UMMI</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <div class="logo-wrapper">
        <img src="Logo.png" alt="Logo FixLapBot id" id="logo-img" />
        <h1>FixLapBot id</h1>
      </div>
      <nav>
        <a href="#booking">Booking</a>
        <a href="#harga">Pricelist</a>
      </nav>
    </header>

    <main class="container">
      <section id="booking" class="card">
        <h2>Form Booking Servis</h2>
        <hr />

        <form id="bookingForm" method="POST" action="index.php">
          <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama_lengkap" required />
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="nama@email.com"
              required
            />
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal Jemput:</label>
            <input type="date" id="tanggal" name="tanggal_jemput" required />
          </div>

          <div class="form-group">
            <label for="alamat">Alamat Lengkap (Jemput & Antar):</label>
            <textarea
              id="alamat"
              name="alamat"
              rows="3"
              placeholder="Contoh: Jl. Ahmad Yani No. 10, RT 01/02, Kota Sukabumi (Dekat Masjid Al-Ikhlas)"
              required
            ></textarea>
          </div>

          <div class="form-group">
            <label for="kerusakan">Detail Kerusakan:</label>
            <textarea id="kerusakan" name="detail_kerusakan" rows="3" required></textarea>
          </div>

          <button type="submit" name="btnSubmit" id="btnSubmit">Kirim Data</button>
        </form>

        <div id="pesanNotifikasi" style="display: none"></div>
      </section>

      <aside id="harga" class="card">
        <h2>Estimasi Biaya Jasa</h2>
        <hr />
        <table border="1" class="tabel-harga">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis Layanan</th>
              <th>Harga Mulai</th>
            </tr>
          </thead>
          <tbody id="isiTabel">
            <?php

            $daftar_layanan = [
                ["jenis" => "Pembersihan Debu & Ganti Pasta", "harga" => "Rp 150.000"],
                ["jenis" => "Install Ulang Windows", "harga" => "Rp 100.000"],
                ["jenis" => "Ganti Baterai / Keyboard", "harga" => "Mulai Rp 50.000"],
                ["jenis" => "Pengecekan Mati Total", "harga" => "Gratis Cek"]
            ];

            $no = 1;
            foreach ($daftar_layanan as $layanan) :
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $layanan['jenis']; ?></td>
                <td><?= $layanan['harga']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </aside>
    </main>

    <footer>
      <p>&copy; 2026 FixLapBot id - Praktikum Pemrograman Web</p>
    </footer>

  </body>
</html>