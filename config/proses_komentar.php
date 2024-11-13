<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['userid']) || empty($_POST['id_foto']) || empty($_POST['isi_komentar'])) {
    echo "<script>
        alert('Data tidak lengkap.');
        location.href='../admin/index.php';
    </script>";
    exit();
}

$id_foto = $_POST['id_foto'];
$id_user = $_SESSION['userid'];
$isi_komentar = mysqli_real_escape_string($koneksi, $_POST['isi_komentar']);
$tanggal_komentar = date('Y-m-d');

$query = "INSERT INTO komentar_foto (id_foto, id_user, isi_komentar, tanggal_komentar)
          VALUES ('$id_foto', '$id_user', '$isi_komentar', '$tanggal_komentar')";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../admin/index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
