
<h1 class="mt-4">Ubah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $kategori = $_POST['NamaKategori'];
                        $query = mysqli_query($koneksi, "UPDATE kategoribuku set NamaKategori='$kategori' WHERE KategoriID=$id");

                        if ($query) {
                            echo '<script>alert("Tambah data berhasil.");</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal.");</script>';
                        }
                    }
                    $id = $_GET['id'];
                    $query = mysqli_query($koneksi, "SELECT*FROM kategoribuku where KategoriID=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Nama Kategori</div>
                        <div class="col-md-8"><input type="text" class="form-control"
                                value="<?php echo $data['NamaKategori']; ?>" name="NamaKategori"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" type="submit">Simpan</button>
                            <button type="reset" class="btn btnsecondary">Reset</button>
                            <a href="?page=kategori" class="btn btndanger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>