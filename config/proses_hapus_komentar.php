<?php
session_start();
require_once("koneksi.php");

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    echo "<script>
        alert('Anda tidak memiliki izin untuk menghapus komentar ini');
        location.href='../admin/index.php';
    </script>";
    exit();
}

$id_komentar = $_GET['id_komentar'];
$id_foto = $_GET['id_foto'];

// Menghapus komentar berdasarkan id_komentar
$query = "DELETE FROM komentar_foto WHERE id_komentar = '$id_komentar'";
if (mysqli_query($koneksi, $query)) {
    echo "<script>
        alert('Komentar berhasil dihapus');
        location.href='../admin/index.php#komentar$id_foto';
    </script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
