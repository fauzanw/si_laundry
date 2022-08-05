<?php
include 'header.php';
include 'sidebar_and_navbar.php';

include '../koneksi.php';
?>

<div class="container-fluid">
    <div class="alert alert-primary text-center">
        <h5 style="margin-bottom: 0px"><b>Selamat datang!</b> di sistem
            informasi laundry.</h5>
    </div>
    <div class="card ">
        <div class="card-body">
            <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h1>
                                <i class="fas fa-user"></i>
                                <span class="float-right">
                                    <?php
                                        $pelanggan = mysqli_query($koneksi, "select * from pelanggan");
                                        echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Pelanggan
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h1>
                                <i class="fas fa-retweet"></i>
                                <span class="float-right">
                                    <?php
                                        $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='0'");
                                        echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Di Proses
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h1>
                                <i class="fas fa-info"></i>
                                <span class="float-right">
                                    <?php
                                        $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='1'");
                                        echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Siap Ambil
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h1>
                                <i class="fas fa-check"></i>
                                <span class="float-right">
                                    <?php
                                        $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='2'");
                                        echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Selesai
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <h1 class="h3 mb-4 text-gray-800">Riwayat Transaksi Akhir</h1>
            <table class="table table-bordered table-striped table-responsive">
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
                    // mengambil data pelanggan dari database
                    $data = mysqli_query($koneksi, "select * from
                    pelanggan,transaksi where transaksi_pelanggan=pelanggan_id order by
                    transaksi_id desc limit 7");
                    $no = 1;
                    // mengubah data ke array dan menampilkannya dengan perulangan while
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                    <td><?php echo $d['transaksi_tgl']; ?></td>
                    <td><?php echo $d['pelanggan_nama']; ?></td>
                    <td><?php echo $d['transaksi_berat']; ?></td>
                    <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                    <td><?php echo "Rp." . number_format($d['transaksi_harga']) . " ,-"; ?></td>
                    <td>
                        <?php
                            if ($d['transaksi_status'] == "0") {
                                echo "<div class='badge badge-warning'>PROSES</div>";
                            } else if ($d['transaksi_status'] == "1") {
                                echo "<div class='badge badge-info'>DICUCI</div>";
                            } else if ($d['transaksi_status'] == "2") {
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
</div>

<?php
include 'footer.php';
?>