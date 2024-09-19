<h1 class="mt-4">Kategori Buku</h1>
<div class="row">
    <div class="col-md-12">
        <a href="?page=buku_tambah" class="btn btn-primary mb-3">+ Tambah</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategoribuku ON buku.KategoriID=kategoribuku.KategoriID");
            
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['Judul']; ?></td>
                    <td><?php echo $data['Penulis']; ?></td>
                    <td><?php echo $data['Penerbit']; ?></td>
                    <td><?php echo $data['TahunTerbit']; ?></td>
                    <td><?php echo $data['Deskripsi']; ?></td>
                    <td><img src="./assets/img/<?php echo $data['Foto']; ?>" alt="" width="210"></td>
                    <td>
                        <a href="?page=buku_ubah&&id=<?php echo $data['BukuID']; ?>" class="btn btn-info btn-sm">Ubah</a>
                        <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" href="?page=buku_hapus&&id=<?php echo $data['BukuID']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>