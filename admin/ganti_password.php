<?php 
    include 'header.php';
    include 'sidebar_and_navbar.php';
?>

<div class="container">
    <br />
    <div class="col-md-5 col-md-offset-3">
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "oke"){
                    echo "<div class='alert alert-success'>Password telah diganti!</div>";
                }
            }
        ?>
        <div class="card">
            <div class="card-body">
                <h4>Ganti Password</h4>
            </div>
            <div class="card-body">
                <form method="post" action="ganti_password_aksi.php">
                    <div class="form-group">
                        <label><strong> Masukkan Password Baru</strong></label>
                        <input type="password" class="form-control" name="password_baru"
                            placeholder="Masukkan Password Baru Anda ..">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Ganti Password">
                </form>
            </div>
            <br>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>