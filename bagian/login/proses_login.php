<?php
// Mulai sesi dan koneksi database
session_start();
include "../../koneksi/koneksi.php";

// Ambil data dari form
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, sha1($_POST['password']));

// Eksekusi query
$query = mysqli_query($db, "SELECT * FROM tb_bagian WHERE username='$username' AND password='$password'");

// Periksa apakah query berhasil		
if (!$query) {
    die("Query gagal: " . mysqli_error($db));
}

// Ambil hasil query
$data = mysqli_fetch_assoc($query);
$jumlah = mysqli_num_rows($query);

if ($jumlah > 0) {
    echo "Login berhasil!";
    $nama = $data['nama_lengkap']; // Ganti dengan kolom yang benar
    $id = $data['id_pengguna']; // Ganti dengan kolom yang benar
    $_SESSION['r3su'] = 'bgn';
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $nama;
    header('Location: ../');
} else {
    echo "<center>Username atau Password salah<br><br><h3>Silahkan Ulangi</h3></center>";
    echo "<meta http-equiv='refresh' content='2;url=../login/'>";
}
?>