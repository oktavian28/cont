
<h1 class="mt-4">Laporan Peminjaman Buku</h1>
<div class="row">
    <div class="col-md-12">
        <a href="cetak.php" target=_blank class="btn btn-primary  mb-4"><i class="fa faprint"></i>Cetak</a>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjaman</th>

            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user ON user.UserID = peminjaman.UserID LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['Nis']; ?></td>
                    <td><?php echo $data['Judul']; ?></td>
                    <td><?php echo $data['TanggalPeminjaman']; ?></td>
                    <td><?php echo $data['TanggalPengembalian']; ?></td>
                    <td><?php echo $data['StatusPeminjaman']; ?></td>

                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>