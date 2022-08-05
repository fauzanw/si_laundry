<?php 
    include 'header.php';
    include 'sidebar_and_navbar.php';
?>
<div class="container">
    <br />
    <div class="col-md-5 col-md-offset-3">
        <div class="card">
            <div class="card-body">
                <h4>Pengaturan Harga Laundry</h4>
            </div>
            <div class="card-body">
                <?php 
                    // menghubungkan koneksi
                    include '../koneksi.php';
                    // megambil data haraga per kilo dari tabel harga
                    $data = mysqli_query($koneksi,"select harga_per_kilo from harga");
                    while($d=mysqli_fetch_array($data)){
                ?>
                <form method="post" action="harga_update.php">
                    <div class="form-group">
                        <label>Harga per kilo</label>
                        <input type="number" class="form-control" name="harga" value="<?= $d['harga_per_kilo']; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Ubah Harga">
                </form>
                <br>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>