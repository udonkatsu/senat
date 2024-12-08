<?php
session_start();
include '../../koneksi/koneksi.php';

// Pastikan form diakses dengan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_pengguna    = mysqli_real_escape_string($db, $_POST['id_pengguna']);
    $username       = mysqli_real_escape_string($db, $_POST['username_admin_bagian']);
    $password       = mysqli_real_escape_string($db, sha1($_POST['password_bagian']));
    $nama_lengkap   = mysqli_real_escape_string($db, $_POST['nama_lengkap']);
    $alamat         = mysqli_real_escape_string($db, $_POST['alamat']);
    $no_hp_bagian   = mysqli_real_escape_string($db, $_POST['no_hp_bagian']);
    $gambar         = $_FILES['gambar']['name'];

    // Ambil data pengguna lama
    $sql = "SELECT * FROM tb_bagian WHERE id_pengguna='$id_pengguna'";
    $query = mysqli_query($db, $sql);
    $data_lama = mysqli_fetch_array($query);

    // Jika gambar tidak diunggah
    if (empty($gambar)) {
        $gambar_baru = $data_lama['gambar'];
    } else {
        // Validasi file gambar
        $tipe_file   = $_FILES['gambar']['type'];
        $ukuran_file = $_FILES['gambar']['size'];

        if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") && ($ukuran_file <= 2100000)) {
            $ext_file   = pathinfo($gambar, PATHINFO_EXTENSION);
            $gambar_baru = $username . '.' . $ext_file;
            $path_gambar = "../bagian/images/" . $gambar_baru;

            // Hapus gambar lama jika ada
            if (!empty($data_lama['gambar']) && file_exists("../bagian/images/" . $data_lama['gambar'])) {
                unlink("../bagian/images/" . $data_lama['gambar']);
            }

            // Simpan gambar baru
            move_uploaded_file($_FILES['gambar']['tmp_name'], $path_gambar);
        } else {
            echo "<center><h2><br>Gambar tidak sesuai ketentuan (JPEG/PNG, max 2MB)<br>Silakan ulangi</h2></center>
            <meta http-equiv='refresh' content='2;url=../editprofile.php'>";
            exit;
        }
    }

    // Update data ke database
    $sql_update = "UPDATE tb_bagian SET 
                    username = '$username',
                    password = '$password',
                    nama_lengkap = '$nama_lengkap',
                    alamat = '$alamat',
                    no_hp_bagian = '$no_hp_bagian',
                    gambar = '$gambar_baru'
                WHERE id_pengguna = '$id_pengguna'";

    if (mysqli_query($db, $sql_update)) {
        echo "<center><h2><br>Profil berhasil diperbarui!</h2></center>
        <meta http-equiv='refresh' content='2;url=../profile.php'>";
    } else {
        echo "<center><h2><br>Terjadi kesalahan saat memperbarui profil: " . mysqli_error($db) . "</h2></center>
        <meta http-equiv='refresh' content='2;url=../editprofile.php'>";
    }
} else {
    // Jika diakses langsung, kembalikan ke halaman edit profile
    header('Location: ../editprofile.php');
    exit;
}
?>