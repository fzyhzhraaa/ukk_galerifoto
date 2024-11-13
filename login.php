<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Website Galeri</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
           
        </div>
        <a href="register.php" class="btn btn-outline-secondary m-1">Daftar</a>
        <a href="login.php" class="btn btn-outline-info m-1">Masuk</a>
        </div>
    </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>Login Aplikasi</h5>
                        </div>
                        <form action="config/aksi_login.php" method="POST">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" required>
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <div class="d-grid mt-2 pb-3">
                                <button class="btn btn-primary" type="submit" name="kirim">Masuk</button>
                            </div>
                        </form>
                        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UKK RPL 2024 | Zahra</p>
    </footer>

    <script type="text/javascript" href="assets/js/bootstrap.min.js"></script>
</body>
</html>