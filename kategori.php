
<h1 class="mt-4">Kategori Buku</h1>
<div class="row">
    <div class="col-md-12">
        <a href="?page=kategori_tambah" class="btn btnprimary mb-4">+ Tambah</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi,"SELECT*FROM kategoribuku");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo
                        $data['NamaKategori']; ?></td>
                    <td> <a href="?page=kategori_ubah&&id=<?php echo $data['KategoriID']; ?>" class="btn btn-info">Ubah</a> 
                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" href="?page=kategori_hapus&&id=<?php echo $data['KategoriID']; ?>"
                        class="btn btndanger">Hapus</a>
                    </td>

                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>