<?php
session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id_pengguna'])) {
    // Mengamankan input dari SQL Injection
    $id = mysqli_real_escape_string($db, $_GET['id_pengguna']);

    // Mendapatkan data bagian berdasarkan ID
    $sql2 = "SELECT * FROM tb_bagian WHERE id_pengguna = '$id'";
    $query2 = mysqli_query($db, $sql2);

    // Validasi jika data ditemukan
    if ($query2 && mysqli_num_rows($query2) > 0) {
        $data2 = mysqli_fetch_array($query2);

        // Melakukan penghapusan data
        $sql = "DELETE FROM tb_bagian WHERE id_pengguna = '$id'";
        $query = mysqli_query($db, $sql);

        if ($query) {
            // Hapus file gambar jika ada
            if (!empty($data2['gambar']) && file_exists("../../bagian/images/" . $data2['gambar'])) {
                unlink("../../bagian/images/" . $data2['gambar']);
            }

            echo "<center><h2><br>Data BAGIAN telah Dihapus</h2></center>
                  <meta http-equiv='refresh' content='2;url=../data-pengguna.php'>";
        } else {
            echo "<center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
                  <meta http-equiv='refresh' content='2;url=../data-pengguna.php'>";
        }
    } else {
        // Redirect jika ID tidak valid atau data tidak ditemukan
        echo "<script>alert('Data tidak ditemukan!'); window.history.back();</script>";
    }
} else {
    // Redirect jika parameter ID tidak ditemukan
    echo "<script>alert('ID bagian tidak ditemukan!'); window.history.back();</script>";
}
?>