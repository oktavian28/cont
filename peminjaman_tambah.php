
<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php if (isset($_POST['submit'])) {
                        $bukuid = $_POST['BukuID'];
                        $userid = $_SESSION['user']['UserID'];
                        $tanggalpeminjaman = $_POST['TanggalPeminjaman'];
                        $tanggalpengembalian = $_POST['TanggalPengembalian'];
                        $statuspeminjaman = $_POST['StatusPeminjaman'];
                        $query = mysqli_query($koneksi, "INSERT INTO peminjaman(BukuID,UserID,TanggalPeminjaman,TanggalPengembalian,StatusPeminjaman) values('$bukuid','$userid','$tanggalpeminjaman','$tanggalpengembalian','$statuspeminjaman')");
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
                                    <option value="<?php echo $buku['BukuID']; ?>"><?php echo $buku['Judul']; ?>-(
                                        <?php echo $buku['Foto']; ?> )</option>
                                <?php

                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="TanggalPeminjaman">
                        </div>
                    </div>
                    <!-- name tidak sama seperti database tidak masalah -->
                    <div class="row mb-3">
                        <div class="col-md-4">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="TanggalPengembalian">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select name="StatusPeminjaman" class="form-control">
                                <option value="Dipinjam">Dipinjam</option>
                                <!-- <option value="Dikembalikan">Dikembalikan</option>     -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" type="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>