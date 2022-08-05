<?php 
    include "header.php";
    include 'sidebar_and_navbar.php';
?>

<div class="container">
    <br />
    <br />
    <br />
    <div class="col-md-5 col-md-offset-3">
        <div class="card">
            <div class="card-body">
                <h4>Edit Pelanggan</h4>
            </div>
            <div class="card-body">
                <?php 
                    // menghubungkan koneksi
                    include '../koneksi.php';
                    // menangkap id yang dikirim melalui url
                    $id = $_GET['id'];
                    // megambil data pelanggan yang ber id di atas dari tabel pelanggan
                    $data = mysqli_query($koneksi,"select * from pelanggan where pelanggan_id='$id'");
                    while($d=mysqli_fetch_array($data)){
                ?>
                <form method="post" action="pelanggan_update.php">
                    <div class="form-group">
                        <label>Nama</label>
                        <!-- form id pelanggan yang di edit, untuk di kirim ke file aksi -->
                        <input type="hidden" name="id" value="<?= $d['pelanggan_id']; ?>">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama .."
                            value="<?= $d['pelanggan_nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label>HP</label>
                        <input type="number" class="form-control" name="hp" placeholder="Masukkan no.hp .."
                            value="<?= $d['pelanggan_hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat .."
                            value="<?= $d['pelanggan_alamat']; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Simpan">
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