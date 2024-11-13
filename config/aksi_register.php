<?php
    require_once("koneksi.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO user (username, password, email, nama_lengkap, alamat) 
          VALUES ('$username', '$password', '$email', '$namalengkap', '$alamat')";

    $sql = mysqli_query($koneksi, $query);

    if($sql) {
        echo "<script>
            alert('Pendaftaran akun berhasil');
            location.href='../login.php';
        </script>";
    }
?>