<?php 
    include 'header.php';
    include 'sidebar_and_navbar.php';
?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Filter Laporan</h4>
        </div>
        <div class="panel-body">
            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th> <b> Dari Tanggal</b></th>
                        <th> <b> Sampai Tanggal</b></th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                        <td>
                            <br />
                            <input type="date" name="tgl_dari" class="form-control">
                        </td>
                        <td>
                            <br />
                            <input type="date" name="tgl_sampai" class="form-control">
                            <br />
                        </td>
                        <td>
                            <br />
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <br />
    <?php 
        if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){
        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai'];
    ?>
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Laporan Laundry dari <b><?= $dari; ?></b> sampai <b><?= $sampai; ?></b></h4>
        </div>
        <div class="panel-body">
            <a target="_blank" href="cetak_print.php?dari=<?= $dari; ?>&sampai=<?= $sampai; ?>"
                class="btn btn-sm btn-primary"><i class="fas fa-print"></i>CETAK</a>
            <a target="_blank" href="cetak_pdf.php?dari=<?= $dari; ?>&sampai=<?= $sampai; ?>"
                class="btn btn-sm btn-primary"><i class="fas fa-print"></i>
                CETAK PDF</a>
            <br />
            <br />
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (Kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
                <?php 
                    // koneksi database
                    include '../koneksi.php';
                    // mengambil data pelanggan dari database
                    $data = mysqli_query($koneksi,"select * from pelanggan,transaksi where transaksi_pelanggan=pelanggan_id and date(transaksi_tgl) > '$dari' and date(transaksi_tgl) < '$sampai' order by transaksi_id desc");
                    $no = 1;
                    // mengubah data ke array dan menampilkannya dengan perulangan while
                    while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>INVOICE-<?= $d['transaksi_id']; ?></td>
                    <td><?= $d['transaksi_tgl']; ?></td>
                    <td><?= $d['pelanggan_nama']; ?></td>
                    <td><?= $d['transaksi_berat']; ?></td>
                    <td><?= $d['transaksi_tgl_selesai']; ?></td>
                    <td><?= "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
                    <td>
                        <?php 
                            if($d['transaksi_status']=="0"){
                                echo "<div class='badge badge-warning'>PROSES</div>";
                            }else if($d['transaksi_status']=="1"){
                                echo "<div class='badge badge-info'>DICUCI</div>";
                            }else if($d['transaksi_status']=="2"){
                                echo "<div class='badge badge-success'>SELESAI</div>";
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
    <?php } ?>
</div>
<?php include 'footer.php'; ?>