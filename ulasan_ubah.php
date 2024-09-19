<?php
include "koneksi.php";
?>
<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $bukuid = $_POST['BukuID'];
                        $userid = $_SESSION['user']['UserID'];
                        $ulasanid = $_POST['Ulasan'];
                        $rating = $_POST['Rating'];
                        $query = mysqli_query($koneksi, "UPDATE ulasanbuku set BukuID='$bukuid', Ulasan='$ulasanid', Rating='$rating' WHERE UlasanID=$id");

                        if ($query) {
                            echo '<script>alert("Ubah data berhasil.");</script>';
                        } else {
                            echo '<script>alert("Ubah data gagal.");</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku where UlasanID=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Buku</div>
                        <div class="col-md-8">
                            <select name="BukuID" class="form-control">
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                    <option <?php if ($data['BukuID'] == $buku['BukuID']) echo 'selected'; ?> value="<?php echo $buku['BukuID']; ?>"><?php echo $buku['Judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Ulasan</div>
                        <div class="col-md-8">
                            <textarea name="Ulasan" rows="5"
                                class="formcontrol"><?php echo $data['Ulasan']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Rating</div>
                        <div class="col-md-8">
                            <select name="Rating" class="form-control">
                                <?php
                                for ($i = 1; $i <= 10; $i++) {
                                    ?>
                                    <option <?php if ($data['Rating'] == $i)
                                        echo 'selected'; ?>><?php echo $i; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" type="submit">Simpan</button>
                            <button type="reset" class="btn btnsecondary">Reset</button>
                            <a href="?page=ulasan" class="btn btndanger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>