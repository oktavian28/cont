
<h1 class="mt-4">Buku Tambah</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_POST['submit'])) {
                        move_uploaded_file($_FILES['Foto']['tmp_name'], './assets/img/' . basename($_FILES['Foto']['name']));
                        // move_uploaded_file($_FILES['']['tmp_name'],) 
                        // move_uploaded_file($_FILES['Foto']['tmp_name'], 'images/'.basename($_FILES['Foto']['name'])); 
                        // proses upload.nya                                                 
                        $KategoriID = $_POST['KategoriID'];
                        $Judul = $_POST['Judul'];
                        $Penulis = $_POST['Penulis'];
                        $Penerbit = $_POST['Penerbit'];
                        $TahunTerbit = $_POST['TahunTerbit'];
                        $Deskripsi = $_POST['Deskripsi'];
                        $Foto = $_FILES['Foto']['name'];
                        // var_dump($Foto); die; 
                    
                        $query = mysqli_query($koneksi, "INSERT INTO buku(KategoriID,Judul,Penulis,Penerbit,TahunTerbit,Deskripsi,Foto) values ('$KategoriID','$Judul','$Penulis','$Penerbit','$TahunTerbit','$Deskripsi', '$Foto')");
                        if ($query) {
                            echo '<script>alert("Tambah data berhasil.");</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal.");</script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Kategori</div>
                        <div class="col-md-8">
                            <select name="KategoriID" class="form-control">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                                while ($kategori = mysqli_fetch_array($kat)) { ?>
                                    <option value="<?php echo $kategori['KategoriID']; ?>">
                                        <?php echo $kategori['NamaKategori']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-md4">Judul</div>
                        <div class="col-md8"><input type="text" name="Judul" class="formcontrol"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md4">Penulis</div>
                        <div class="col-md8"><input type="text" name="Penulis" class="formcontrol">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md4">Penerbit</div>
                        <div class="col-md8"><input type="text" name="Penerbit" class="formcontrol">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Tahun Terbit</div>
                        <div class="col-md8"><input type="number" name="TahunTerbit" class="form-control"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md4">Deskripsi</div>
                        <div class="col-md-8"><input type="text" name="Deskripsi" class="formcontrol"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Foto</div>
                        <div class="col-md8"><input type="file" name="Foto" class="formcontrol">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-sm" name="submit"
                                type="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                            <a href="?page=buku" class="btn btn-danger btn-sm">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>