
<h1 class="mt-4">Ulasan Buku</h1> 
<div class="row mt-4"> 
    <div class="col-md-12"> 
        <a href="?page=ulasan_tambah" class="btn btn-primary mb-4">+ Tambah</a> 
        <table class="table table-bordered"> 
            <thead> 
                <tr> 
                    <th>No</th> 
                    <th>Judul Buku</th> 
                    <th>Ulasan</th> 
                    <th>Rating</th> 
                    <th>Aksi</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php 
                    $userid = $_SESSION['user']['UserID']; 
                    $query = mysqli_query($koneksi, "SELECT u.UlasanID, b.Judul, u.Ulasan, u.Rating, u.UserID FROM ulasanbuku u JOIN buku b ON u.BukuID = b.BukuID"); 
                    $no = 1; 
                    while($data = mysqli_fetch_array($query)){ 
                ?> 
                <tr> 
                    <td><?php echo $no++; ?></td> 
                    <td><?php echo $data['Judul']; ?></td> 
                    <td><?php echo $data['Ulasan']; ?></td> 
                    <td><?php echo $data['Rating']; ?></td> 
                    <td> 
                        <?php if($data['UserID'] == $userid) { ?> 
                            <a href="?page=ulasan_ubah&id=<?php echo $data['UlasanID']; ?>" class="btn btnprimary btn-sm">Ubah</a> 
                            <a href="?page=ulasan_hapus&id=<?php echo $data['UlasanID']; ?>" class="btn btndanger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');">Hapus</a> 
                        <?php } ?> 
                    </td> 
                </tr> 
                <?php 
                    } 
                ?> 
            </tbody> 
        </table> 
    </div> 
</div> 
