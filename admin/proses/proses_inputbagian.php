<?php
session_start();
include '../../koneksi/koneksi.php';

// Mengambil input dari form
$nama_komisi        = mysqli_real_escape_string($db, $_POST['nama_komisi']);
$username           = mysqli_real_escape_string($db, $_POST['username']);
$password           = mysqli_real_escape_string($db, sha1($_POST['password']));
$role               = mysqli_real_escape_string($db, $_POST['role']);
$nama_lengkap       = mysqli_real_escape_string($db, $_POST['nama_lengkap']);
$alamat             = mysqli_real_escape_string($db, $_POST['alamat']);
$no_hp_bagian       = mysqli_real_escape_string($db, $_POST['no_hp_bagian']);

// Upload file gambar
$nama_file_lengkap  = $_FILES['gambar']['name'];
$nama_file          = substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
$ext_file           = substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
$tipe_file          = $_FILES['gambar']['type'];
$ukuran_file        = $_FILES['gambar']['size'];
$tmp_file           = $_FILES['gambar']['tmp_name'];

// Validasi input
if (!empty($nama_komisi) && !empty($username) && !empty($password) && !empty($role) &&
    !empty($nama_lengkap) && !empty($alamat) && !empty($no_hp_bagian) &&
    ($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") &&
    ($ukuran_file <= 2100000)) {

    // Generate nama file baru
    $nama_baru = $username . $ext_file;
    $path = "../../bagian/images/" . $nama_baru;

    // Memindahkan file ke folder tujuan
    if (move_uploaded_file($tmp_file, $path)) {
        // Query untuk memasukkan data ke database
        $sql = "INSERT INTO tb_bagian (nama_komisi, username, password, role, nama_lengkap, alamat, no_hp_bagian, gambar)
                VALUES ('$nama_komisi', '$username', '$password', '$role', '$nama_lengkap', '$alamat', '$no_hp_bagian', '$nama_baru')";

        if (mysqli_query($db, $sql)) {
            echo "<center><h2><br>Terima Kasih<br>Data Pengguna Telah Didaftarkan ke Sistem</h2></center>
                  <meta http-equiv='refresh' content='2;url=../data-pengguna.php'>";
        } else {
            echo "<center><h2>Terjadi kesalahan saat menyimpan data. Silakan coba lagi.</h2></center>
                  <meta http-equiv='refresh' content='2;url=../input-data-pengguna.php'>";
        }
    } else {
        echo "<center><h2>Gagal mengunggah file gambar. Silakan coba lagi.</h2></center>
              <meta http-equiv='refresh' content='2;url=../input-data-pengguna.php'>";
    }
} else {
    echo "<center><h2>Silakan isi semua kolom dengan benar dan pastikan file gambar sesuai ketentuan.</h2></center>
          <meta http-equiv='refresh' content='2;url=../input-data-pengguna.php'>";
}
?>