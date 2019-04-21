<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 24/10/2018
 * Time: 14:59
 */
?>

<!-- Small boxes (Stat box) -->
<div class="row">

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3></h3>
                <p>Sub Bag DN</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=site_url('transaksi/aktivitas')?>" class="small-box-footer">Lihat Aktivitas<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3></h3>
                <p>Sub Bag Luar Negeri</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?=site_url('laporan_stok_spare_part.php')?>" class="small-box-footer">Lihat Stok Spare Part<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3></h3>

                <p>Sub Bagian Pelaporan dan Evaluasi</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=site_url('laporan_pembelian_spare_part.php')?>" class="small-box-footer">Lihat Laporan Pembelian<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3></h3>
                <p>Apa lagi ya</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?=site_url('laporan_penjualan_spare_part.php')?>" class="small-box-footer">Lihat Laporan Penjualan<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<!-- /.row -->
