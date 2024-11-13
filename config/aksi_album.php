<?php
    session_start();
    require_once("koneksi.php");

    if(isset($_POST['tambah'])) {
        $namaalbum = $_POST['namaalbum'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = date('Y-m-d');
        $userid = $_SESSION['userid'];

        $query = "INSERT INTO album (nama_album, deskripsi, tanggal_dibuat, id_user) 
          VALUES ('$namaalbum', '$deskripsi', '$tanggal', '$userid')";

        $sql = mysqli_query($koneksi, $query);

        echo "<script>
            alert('Data berhasil disimpan');
            location.href='../admin/album.php';
        </script>";
    }

    if(isset($_POST['edit'])) {
        $albumid = $_POST['albumid'];
        $namaalbum = $_POST['namaalbum'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = date('Y-m-d');
        $userid = $_SESSION['userid'];

        $query = "UPDATE album SET nama_album='$namaalbum', deskripsi='$deskripsi', tanggal_dibuat='$tanggal' WHERE id_album='$albumid'";

        $sql = mysqli_query($koneksi, $query);

        echo "<script>
            alert('Data berhasil diperbarui');
            location.href='../admin/album.php';
        </script>";
    }

    if(isset($_POST['hapus'])) {
        $albumid = $_POST['albumid'];

        $query = "DELETE FROM album WHERE id_album='$albumid'";

        $sql = mysqli_query($koneksi, $query);

        echo "<script>
            alert('Data berhasil dihapus');
            location.href='../admin/album.php';
        </script>";
    }
?>