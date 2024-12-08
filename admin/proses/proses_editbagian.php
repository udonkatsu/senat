<?php
session_start();
include '../../koneksi/koneksi.php';

// Ambil data dari form
$id_pengguna = mysqli_real_escape_string($db, $_POST['id_pengguna']);
$nama_komisi = mysqli_real_escape_string($db, $_POST['nama_komisi']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = !empty($_POST['password']) ? mysqli_real_escape_string($db, sha1($_POST['password'])) : null;
$role = mysqli_real_escape_string($db, $_POST['role']);
$nama_lengkap = mysqli_real_escape_string($db, $_POST['nama_lengkap']);
$alamat = mysqli_real_escape_string($db, $_POST['alamat']);
$no_hp_bagian = mysqli_real_escape_string($db, $_POST['no_hp_bagian']);
$gambar = $_FILES['gambar']['name'];

// Ambil data lama untuk validasi
$sql = "SELECT * FROM tb_bagian WHERE id_pengguna = '$id_pengguna'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);

if (!$data) {
    echo "<center><h2>Data pengguna tidak ditemukan</h2></center>";
    exit;
}

// Jika tidak ada file gambar yang diunggah
if (empty($gambar)) {
    $gambar_baru = $data['gambar'];
} else {
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];

    if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") && $ukuran_file <= 2100000) {
        // Hapus file lama
        if (file_exists("../../bagian/images/" . $data['gambar'])) {
            unlink("../../bagian/images/" . $data['gambar']);
        }

        $ext_file = pathinfo($gambar, PATHINFO_EXTENSION);
        $gambar_baru = $username . '.' . $ext_file;
        $path = "../../bagian/images/" . $gambar_baru;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $path);
    } else {
        echo "<center><h2>Gambar tidak sesuai ketentuan (JPEG/PNG, max 2MB)</h2></center>";
        exit;
    }
}

// Update data
$sql_update = "UPDATE tb_bagian SET 
    nama_komisi = '$nama_komisi',
    username = '$username',
    " . ($password ? "password = '$password'," : "") . "
    role = '$role',
    nama_lengkap = '$nama_lengkap',
    alamat = '$alamat',
    no_hp_bagian = '$no_hp_bagian',
    gambar = '$gambar_baru'
WHERE id_pengguna = '$id_pengguna'";

$execute = mysqli_query($db, $sql_update);

if ($execute) {
    echo "<center><h2>Data pengguna berhasil diperbarui</h2></center>";
    echo "<meta http-equiv='refresh' content='2;url=../data-pengguna.php'>";
} else {
    echo "<center><h2>Terjadi kesalahan saat memperbarui data</h2></center>";
}
?>