
<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $bukuid = $_POST['BukuID'];
                        $userid = $_SESSION['user']['UserID'];
                        $ulasanid = $_POST['Ulasan'];
                        $rating = $_POST['Rating'];
                        $query = mysqli_query($koneksi, "INSERT INTO ulasanbuku(BukuID,UserID,Ulasan,Rating) values('$bukuid','$userid','$ulasanid','$rating')");

                        if ($query) {
                            echo '<script>alert("Tambah data berhasil.");</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal.");</script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Buku</div>
                        <div class="col-md-8">
                            <select name="BukuID" class="form-control">
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                    <option value="<?php echo
                                        $buku['BukuID']; ?>"><?php echo $buku['Judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Ulasan</div>
                        <div class="col-md-8">
                            <textarea rows="5" name="Ulasan" class="formcontrol"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Rating</div>
                        <div class="col-md-8">
                            <select name="Rating" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
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