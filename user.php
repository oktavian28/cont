
<h1 class="mt-4">User</h1>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Level</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM user");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['Nis']; ?></td>
                    <td><?php echo $data['Username']; ?></td>
                    <td><?php echo $data['NamaLengkap']; ?></td>
                    <td><?php echo $data['Alamat']; ?></td>
                    <td><?php echo $data['level']; ?></td>

                </tr>
            <?php
            }

            ?>
        </table>
    </div>
</div>