<?php
session_start();
include '../../../koneksi/koneksi.php';

if (isset($_GET['id_dokumen'])) {
    // Ambil ID dokumen
    $id = mysqli_real_escape_string($db, $_GET['id_dokumen']);
    
    // Query untuk mendapatkan data dokumen
    $sql2 = "SELECT * FROM tb_dokumen WHERE id_dokumen = '$id'";
    $query2 = mysqli_query($db, $sql2);

    if ($query2 && mysqli_num_rows($query2) > 0) {
        $data = mysqli_fetch_array($query2);
        $file_path = "../../dokumen/" . $data['file_path']; // Path file
        
        // Hapus data dari tabel
        $sql_delete = "DELETE FROM tb_dokumen WHERE id_dokumen = '$id'";
        $query_delete = mysqli_query($db, $sql_delete);
        
        if ($query_delete) {
            // Hapus file jika ada
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            // Pesan sukses
            echo "<center><h2><br>Data dokumen telah dihapus</h2></center>";
            echo "<meta http-equiv='refresh' content='2;url=../index.php'>";
        } else {
            // Pesan gagal
            echo "<center><h2><br>Gagal menghapus data dokumen.<br>Silakan coba lagi.</h2></center>";
            echo "<meta http-equiv='refresh' content='2;url=../index.php'>";
        }
    } else {
        // Jika data tidak ditemukan
        echo "<center><h2><br>Data dokumen tidak ditemukan.<br>Silakan coba lagi.</h2></center>";
        echo "<meta http-equiv='refresh' content='2;url=../index.php'>";
    }
} else {
    // Jika ID dokumen tidak ada di URL
    echo "<center><h2><br>Invalid request.<br>ID dokumen tidak ditemukan.</h2></center>";
    echo "<meta http-equiv='refresh' content='2;url=../index.php'>";
}
?>