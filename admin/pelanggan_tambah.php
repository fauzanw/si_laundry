<?php include 'header.php';
      include 'sidebar_and_navbar.php';
?>
<div class="container">
    <br />
    <br />
    <br />
    <div class="col-md-5 col-md-offset-3">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Pelanggan Baru</h4>
            </div>
            <div class="card-body">
                <form method="post" action="pelanggan_aksi.php">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama ..">
                    </div>
                    <div class="form-group">
                        <label>HP</label>
                        <input type="number" class="form-control" name="hp" placeholder="Masukkan no.hp ..">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat ..">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>