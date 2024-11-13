<?php
    session_start();
    require_once("koneksi.php");

    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];

    $ceksuka = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE id_foto='$fotoid' AND id_user='$userid'");

    if(mysqli_num_rows($ceksuka) == 1) {
        while($row = mysqli_fetch_array($ceksuka)) {
            $likeid = $row['id_like'];
            $query = mysqli_query($koneksi, "DELETE FROM like_foto WHERE id_like='$likeid'");

            echo "<script>
            location.href='../admin/index.php';
                </script>";
        }
    } else {
        $tanggalike = date('Y-m-d');
        $query = "INSERT INTO like_foto (id_foto, id_user, tanggal_like) VALUES ('$fotoid', '$userid', '$tanggalike')";
        $sql = mysqli_query($koneksi, $query);
    
        echo "<script>
                location.href='../admin/index.php';
            </script>";
    }
?>