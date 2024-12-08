<?php
include '../../../koneksi/koneksi.php';

// Ambil data dari form
$id_dokumen = mysqli_real_escape_string($db, $_POST['id_dokumen']);
$judul_dokumen = mysqli_real_escape_string($db, $_POST['judul_dokumen']);
$deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
$jenis_dokumen = mysqli_real_escape_string($db, $_POST['jenis_dokumen']);
$komisi = mysqli_real_escape_string($db, $_POST['komisi']);
$tanggal_dokumen = mysqli_real_escape_string($db, $_POST['tanggal_dokumen']);

// Proses file upload
$file_path = $_FILES['file_path']['name'];
$file_tmp = $_FILES['file_path']['tmp_name'];
$upload_dir = "../../.../dokumen/";

// Query untuk mendapatkan file lama
$query_file = mysqli_query($db, "SELECT file_path FROM tb_dokumen WHERE id_dokumen = '$id_dokumen'");
$data_file = mysqli_fetch_array($query_file);
$file_lama = $data_file['file_path'];

if ($file_path) {
    // Hapus file lama jika ada
    if (file_exists($file_lama)) {
        unlink($file_lama);
    }

    // Simpan file baru
    $file_baru = $upload_dir . basename($file_path);
    if (move_uploaded_file($file_tmp, $file_baru)) {
        $file_query = ", file_path = '$file_baru'";
    } else {
        echo "Error: Gagal mengunggah file.";
        exit;
    }
} else {
    $file_query = "";
}

// Query Update
$sql = "UPDATE tb_dokumen SET 
            judul_dokumen = '$judul_dokumen',
            deskripsi = '$deskripsi',
            jenis_dokumen = '$jenis_dokumen',
            komisi = '$komisi',
            tanggal_dokumen = '$tanggal_dokumen'
            $file_query
        WHERE id_dokumen = '$id_dokumen'";

if (mysqli_query($db, $sql)) {
    header("Location: ../index.php?pesan=sukses");
} else {
    echo "Error: " . mysqli_error($db);
}
?>