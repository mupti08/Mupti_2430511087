<?php
include "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Booking - Admin</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="container card">
        <h2>Daftar Booking Masuk</h2>
        <hr>
        <table border="1" width="100%" cellpadding="10" style="border-collapse: collapse;">
            <thead>
                <tr style="background-color: #007bff; color: white;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Alamat</th>
                    <th>Kerusakan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while($row = mysqli_fetch_assoc($query)) : 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['tanggal_jemput']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?= $row['detail_kerusakan']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="index.php">Kembali ke Form</a>
    </div>
</body>
</html>