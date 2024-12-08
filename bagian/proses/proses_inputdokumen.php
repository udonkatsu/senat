<?php
session_start();
include '../../koneksi/koneksi.php';

// Ambil data dari form
$judul_dokumen = mysqli_real_escape_string($db, $_POST['judul_dokumen']);
$deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
$komisi = mysqli_real_escape_string($db, $_POST['komisi']);
$jenis_dokumen = mysqli_real_escape_string($db, $_POST['jenis_dokumen']);
$tanggal_dokumen = mysqli_real_escape_string($db, $_POST['tanggal_dokumen']);
$diunggah_oleh = mysqli_real_escape_string($db, $_POST['diunggah_oleh']);

// Konfigurasi zona waktu
date_default_timezone_set('Asia/Jakarta');
$tanggal_upload = date("Y-m-d H:i:s");

// Validasi dan unggah file
$nama_file_lengkap = $_FILES['file_path']['name'];
$ext_file = strtolower(pathinfo($nama_file_lengkap, PATHINFO_EXTENSION));
$ukuran_file = $_FILES['file_path']['size'];
$tmp_file = $_FILES['file_path']['tmp_name'];
$max_file_size = 10485760; // 10MB dalam byte
$upload_dir = "../../dokumen/";

// Cek file PDF
if ($ext_file !== 'pdf' || $ukuran_file > $max_file_size) {
    echo "<center><h2>File harus berupa PDF dengan ukuran maksimal 10MB.</h2></center>
        <meta http-equiv='refresh' content='2;url=../inputdokumen.php'>";
    exit;
}

// Nama file baru untuk disimpan
$nama_file_baru = time() . '-' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $nama_file_lengkap);
$path_file = $upload_dir . $nama_file_baru;

// Proses unggah file
if (!move_uploaded_file($tmp_file, $path_file)) {
    echo "<center><h2>Gagal mengunggah file. Silakan coba lagi.</h2></center>
        <meta http-equiv='refresh' content='2;url=../inputdokumen.php'>";
    exit;
}

// Masukkan data ke database
$sql = "INSERT INTO tb_dokumen (judul_dokumen, deskripsi, komisi, jenis_dokumen, tanggal_dokumen, file_path, diunggah_oleh, tanggal_upload) 
        VALUES ('$judul_dokumen', '$deskripsi', '$komisi', '$jenis_dokumen', '$tanggal_dokumen', '$nama_file_baru', '$diunggah_oleh', '$tanggal_upload')";

if (mysqli_query($db, $sql)) {
    echo "<center><h2>Data berhasil disimpan!</h2></center>
        <meta http-equiv='refresh' content='2;url=../index.php'>";
} else {
    echo "<center><h2>Terjadi kesalahan saat menyimpan data. Silakan coba lagi.</h2></center>
        <meta http-equiv='refresh' content='2;url=../inputdokumen.php'>";
}

// Tutup koneksi
mysqli_close($db);
?>