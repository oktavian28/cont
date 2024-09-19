
<h1 class="mt-4">Buku Ubah</h1> 
<div class="card"> 
    <div class="card-body"> 
        <div class="row"> 
            <div class="col-md-12">                 
                <form method="post" enctype="multipart/form-data"> 
                <?php 
                    $id = $_GET['id']; 
                    if(isset($_POST['submit'])) { 
                        $KategoriID = $_POST['KategoriID']; 
                        $Judul = $_POST['Judul']; 
                        $Penulis = $_POST['Penulis']; 
                        $Penerbit = $_POST['Penerbit']; 
                        $TahunTerbit = $_POST['TahunTerbit']; 
                        $Deskripsi = $_POST['Deskripsi']; 
                        $Foto = $_FILES['Foto']['name']; 
                        move_uploaded_file($_FILES['Foto']['tmp_name'], './assets/img/'.basename($_FILES['Foto']['name'])); 
 
                        // var_dump($Foto); 
                        // die;                         
                        $query = mysqli_query($koneksi, "UPDATE buku SET KategoriID='$KategoriID', Judul='$Judul',Penulis='$Penulis',Penerbit='$Penerb it',TahunTerbit='$TahunTerbit',Deskripsi='$Deskrips i',Foto='$Foto' WHERE BukuID=$id");  

                        if($query){                             
                            echo '<script>alert("Ubah data berhasil.");</script>'; 
                        }else{                             
                            echo '<script>alert("Ubah data gagal.");</script>'; 
                        } 
                    } 
                    $query = mysqli_query($koneksi, "SELECT*FROM buku WHERE BukuID=$id"); 
                    $data = mysqli_fetch_array($query); 
                ?> 
                    <div class="row mb-3 "> 
                        <div class="col-md-4">Kategori ID</div> 
                        <div class="col-md-8"> 
                            <select name="KategoriID" class="form-control" readonly> 
                                <?php                                      
                                $kat = mysqli_query($koneksi, "SELECT*FROM kategoribuku");                                    
                                 while($kategori = mysqli_fetch_array($kat)){ 
                                        ?> 
                                        <option 
                                            <?php if($kategori['KategoriID'] == $data['KategoriID']) echo 'selected'; ?> value="<?php echo $kategori['KategoriID']; ?>">
                                            <?php echo $kategori['KategoriID'];?>
                                        </option> 
                                        <?php 
                                    }            
                                    ?> 
                            </select> 
                        </div> 
                    </div> 
                    <div class="row mb-3 "> 

                        <div class="col-md4">Judul</div> 
                        <div class="col-md-8"><input type="text" value="<?php echo $data['Judul']; ?>" class="form-control" name="Judul"></div>                     
                   </div> 
                    <div class="row mb-3">                         
                        <div class="col-md4">Penulis</div> 
                        <div class="col-md8"><input type="text" value="<?php echo $data['Penulis']; ?>" class="form-control" name="Penulis"></div>                     
                    </div> 
                    <div class="row mb-3">                         
                        <div class="col-md4">Penerbit</div> 
                        <div class="col-md-8"><input type="text" value="<?php echo $data['Penerbit']; ?>" class="form-control" name="Penerbit"></div>                    
                     </div> 
                    <div class="row mb-3"> 
                        <div class="col-md-4">Tahun Terbit</div> 
                        <div class="col-md-8"><input type="number" value="<?php echo $data['TahunTerbit']; ?>" class="form-control" name="TahunTerbit"></div>                   
                    </div> 
                    <div class="row mb-3">                   
                    <div class="col-md4">Deskripsi</div> 
                        <div class="col-md-8"><input type="text" value="<?php echo $data['Deskripsi']; ?>" class="formcontrol"name="Deskripsi"></div> 
                    </div> 
                    <div class="row mb-3">                    
                        <div class="col-md4">Foto</div> 
                        <div class="col-md-8"><input type="file" value="<?php echo $data['Foto']; ?>" class="form-control" name="Foto"></div> 
                    </div> 
                    <div class="row mb-3">                        
                         <div class="col-md-4"></div> 
                        <div class="col-md-8">                             
                            <button type="submit" class="btn btn-primary btn-sm" name="submit" type="submit">Simpan</button> 
                            <button type="reset" class="btn btn-secondary btn-sm">Reset</button>                             
                            <a href="?page=buku" class="btn btn-danger btn-sm">Kembali</a> 
                        </div> 
                    </div> 
                </form> 
            </div> 
        </div> 
    </div> 
</div>  
