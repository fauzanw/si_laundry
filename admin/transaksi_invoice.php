<?php
    include 'header.php';
    include 'sidebar_and_navbar.php';
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }
    // koneksi database
    include '../koneksi.php';
?>
<div class="container justify-content-center">
    <div class="col-md-10 col-md-offset-1">
        <?php
            // menangkap id yang dikirim melalui url
            $id = $_GET['id'];
            // megambil data pelanggan yang ber id di atas dari tabel pelanggan
            $transaksi = mysqli_query($koneksi, "select * from transaksi,pelanggan where transaksi_id='$id' and transaksi_pelanggan=pelanggan_id");
            while ($t = mysqli_fetch_array($transaksi)) {
        ?>
        <h4>Invoice</h4>
        <br>
        <a href="transaksi.php" class="btn btn-primary float-left"><i class="glyphicon glyphicon-print"></i> Kembali</a>
        <a href="transaksi_invoice_cetak.php?id=<?= $id; ?>" target="_blank" class="btn btn-primary float-right"><i
                class="fas fa-print"></i> CETAK</a>
        <br />
        <br />
        <table class="table">
            <tr>
                <th width="20%">No. Invoice</th>
                <th>:</th>
                <td>INVOICE-<?= $t['transaksi_id']; ?></td>
            </tr>
            <tr>
                <th width="20%">Tgl. Laundry</th>
                <th>:</th>
                <td><?= $t['transaksi_tgl']; ?></td>
            </tr>
            <tr>
                <th>Nama Pelanggan</th>
                <th>:</th>
                <td><?= $t['pelanggan_nama']; ?></td>
            </tr>
            <tr>
                <th>HP</th>
                <th>:</th>
                <td><?= $t['pelanggan_hp']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td><?= $t['pelanggan_alamat']; ?></td>
            </tr>
            <tr>
                <th>Berat Cucian (Kg)</th>
                <th>:</th>
                <td><?= $t['transaksi_berat']; ?></td>
            </tr>
            <tr>
                <th>Tgl. Selesai</th>
                <th>:</th>
                <td><?= $t['transaksi_tgl_selesai']; ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <th>:</th>
                <td>
                    <?php
                        if ($t['transaksi_status'] == "0") { "<div class='badge badge-warning'>PROSES</div>";
                        } else if ($t['transaksi_status'] == "1") { 
                            "<div class='badge badge-info'>DI CUCI</div>";
                        } else {
                            if ($t['transaksi_status'] == "2") { 
                                echo "<div class='badge badge-success'>SELESAI</div>";
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Harga</th>
                <th>:</th>
                <td><?= "Rp." . number_format($t['transaksi_harga']) . " ,-"; ?></td>
            </tr>
        </table>
        <br />
        <h4 class="text-center">Daftar Cucian</h4>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Jenis Pakaian</th>
                <th width="20%">Jumlah</th>
            </tr>
            <?php
                // menyimpan id transaksi ke variabel id_transaksi
                $id = $t['transaksi_id'];
                // menampilkan pakaian-pakaian dari transaksi yang ber id di atas
                $pakaian = mysqli_query($koneksi, "select * from pakaian where pakaian_transaksi='$id'");
                while ($p = mysqli_fetch_array($pakaian)) {
            ?>
            <tr>
                <td><?= $p['pakaian_jenis']; ?></td>
                <td width="5%"><?= $p['pakaian_jumlah']; ?></td>
            </tr>
            <?php }?>
        </table>
        <br />
        <p>
            <center><i>" Terima kasih telah mempercayakan cucian anda pada kami ".</i></center>
        </p>
        <?php
            }
        ?>
    </div>
</div>
<?php 
    include 'footer.php';
?>