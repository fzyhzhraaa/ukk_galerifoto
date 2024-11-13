<?php
    session_start();
    require_once("../config/koneksi.php");
    $userid = $_SESSION['userid'];

    if($_SESSION['status'] != 'login') {
        echo "<script>
            alert('Anda belum login');
            location.href='../index.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
 
</head>
<body class="bg-pattern">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Website Galeri</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                   <a href="home.php" class="nav-link">Home</a>
                   <a href="album.php" class="nav-link">Album</a>
                   <a href="foto.php" class="nav-link">Foto</a>
                </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        Album :
        <a href="home.php" class="btn btn-outline-primary">Semua Foto</a>
        <?php
            $query = mysqli_query($koneksi, "SELECT * FROM album WHERE id_user='$userid'");
            while($row = mysqli_fetch_array($query)) { ?>
                <a href="home.php?albumid=<?php echo $row['id_album'] ?>" class="btn btn-outline-primary">
                    <?php echo $row['nama_album'] ?>
                </a>
            <?php } ?>

        <div class="row">
            <?php
            if(isset($_GET['albumid'])) {
                $albumid = $_GET['albumid'];
                $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE id_user='$userid' AND id_album='$albumid'");
                 while($data = mysqli_fetch_array($query)) { ?>
                    <div class="col-md-3 mt-2">
                        <div class="card mb-2">
                            <img src="../assets/img/<?php echo $data['lokasi_file']?>" class="card-img-top" title="<?php echo $data['judul_foto']?>" style="height:12rem;">
                            
                        </div>
                    </div>
            <?php } } else { 
                $query = mysqli_query($koneksi, "SELECT * FROM  foto WHERE id_user='$userid'");
                while($data = mysqli_fetch_array($query)) {
            ?>
            <div class="col-md-3 mt-2">
                <div class="card">
                    <img src="../assets/img/<?php echo $data['lokasi_file']?>" class="card-img-top" title="<?php echo $data['judul_foto']?>" style="height:12rem;">
                    <div class="card-footer text-center">
                    <?php echo $data['judul_foto'] ?>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 fixed-bottom">
        <p>&copy; UKK RPL 2024 | Zahra</p>
    </footer>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
