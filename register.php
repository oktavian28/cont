<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login ke perpustakaan digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Buat Akun Perpustakaan Digital</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['register'])) {
                                        $nama = $_POST['namalengkap'];
                                        $nis = $_POST['nis'];
                                        $alamat = $_POST['alamat'];
                                        $username = $_POST['username'];
                                        $password = md5($_POST['password']);
                                        $level = 'peminjam';

                                        // Cek apakah username sudah ada 
                                        $checkUsername = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
                                        if (mysqli_num_rows($checkUsername) > 0) {
                                            echo '<script>alert("Username sudah ada, silahkan pilih username lain.");</script>';
                                        } else {
                                            // Jika username belum ada, lanjutkan proses pendaftaran 
                                            $insert = mysqli_query($koneksi, "INSERT INTO user(namalengkap, nis, alamat, username, password, level) VALUES('$nama', '$nis', '$alamat', '$username', '$password', '$level')");
                                            if ($insert) {
                                                echo '<script>alert("Selamat, register berhasil, silahkan login"); location.href="login.php"</script>';
                                            } else {
                                                echo '<script>alert("Maaf, register gagal, silahkan ulang kembali");</script>';
                                            }
                                        }
                                    }
                                    ?>
                                    <form method="POST">

                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="namalengkap" placeholder="Masukkan Nama Lengkap" required />
                                                <label for="inputEmail">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="nis" placeholder="Masukkan Nis" required/> 
                                            <label for="inputEmail">Nis</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="alamat" placeholder="Masukkan alamat" required />
                                            <label for="inputEmail">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" name="username" placeholder="Username" required />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" name="register" value="register">Register</button> <a class="btn btn-danger" href="login.php">Login</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        &copy; PerpustakaanDigital2024
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>