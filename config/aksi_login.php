<?php
    session_start();
    require_once("koneksi.php");
    

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    $sql = mysqli_query($koneksi, $query);

    $cek = mysqli_num_rows($sql);

    if($cek > 0) {
        $data = mysqli_fetch_array($sql);

        $_SESSION['username'] = $data['username'];
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['is_admin'] = $data['is_admin'];
        $_SESSION['status'] = 'login';
        echo "<script>
            alert('Login Berhasil');
            location.href='../admin/index.php';
        </script>";
    } else {
        echo "<script>
            alert('Username atau Password salah');
            location.href='../login.php';
        </script>";
    }
?>