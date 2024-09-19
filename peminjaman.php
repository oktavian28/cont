

<h1 class="mt-4">Peminjaman Buku</h1> 
<a href="?page=peminjaman_tambah" target=_blank class="btn btn-primary mb4"><i class="fa fa-plus"></i>Tambah Peminjaman</a> 

<div class="row"> 
    <div class="col-md-12"> 
        <?php if($_SESSION['user']['level'] == 'peminjam') :?> 
        <?php endif;?> 
        <table class="table table-bordered"> 
            
            <tr> 
                <th>Noooo</th> 
                <th>User</th> 
                <th>Buku</th> 
                <th>Foto</th> 
                <th>Tanggal Peminjaman</th> 
                <th>Tanggal Pengembalian</th> 
                <th>Status Peminjaman</th> 
                <th>Aksi</th> 
 
            </tr> 
            <?php 
            $i =1; 
                // Query untuk menampilkan semua data peminjaman 
                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman  
                LEFT JOIN user ON user.UserID = peminjaman.UserID  
                LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID"); 
 
                while($data = mysqli_fetch_array($query)){ 
                    ?> 
                    <tr> 
                        <td><?php echo $i++; ?></td> 
                        <td><?php echo $data['Nis']; ?></td> 
                        <td><?php echo $data['Judul']; ?></td> 
                        <td><img src="./assets/img/<?php echo $data['Foto'];?>" alt="" width="150"></td> 
                        <td><?php echo $data['TanggalPeminjaman']; ?></td> 
                        <td><?php echo $data['TanggalPengembalian']; ?></td> 
                        <td><?php echo $data['StatusPeminjaman']; ?></td> 
                        <td> 
                            <?php 
                            // if(isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] === 'admin'){ 
                                if ($_SESSION['user']['Level'] == 'admin' || $_SESSION['user']['Level'] == 'petugas') { 
                                    // Kode yang akan dieksekusi jika level pengguna adalah admin atau petugas 
                                 
                                 
                            ?> 
                            <a href="?page=peminjaman_ubah&&id=<?php echo $data['PeminjamanID'];?>" class="btn btn-info">Ubah</a> 
                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" href="?page=peminjaman_hapus&&id=<?php echo $data['PeminjamanID'];?>" class="btn btn-danger">Hapus</a> 
                            <?php     
                            }   else { 
                                // Peminjam tidak memiliki aksi Ubah atau Hapus 
                                echo '-'; 
                            } 
                            ?> 
                        </td> 
                    </tr> 
                    <?php 
                } 
            ?> 
        </table> 
    </div> 
</div> 
