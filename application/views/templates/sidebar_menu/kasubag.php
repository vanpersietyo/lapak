<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 14/12/2018
 * Time: 9:37
 */
?>
<li>
    <a  href="<?=site_url('add_antrian.php')?>">
        <i class="fa fa-plus-square"></i> <span>Registrasi Antrian Layanan</span>
    </a>
</li>

<li>
    <a  href="<?=site_url('daftar_antrian.php')?>">
        <i class="fa fa-reorder "></i> <span>List Antrian Layanan</span>
    </a>
</li>


<li>
    <a  href="<?=site_url('proses_antrian.php')?>">
        <i class="fa fa-forward"></i> <span>Proses Layanan</span>
    </a>
</li>

<li>
    <a  href="<?=site_url('invoice_antrian.php')?>">
        <i class="fa fa-paypal"></i> <span>Invoice Layanan</span>
    </a>
</li>


<li class="header">DATA MASTER</li>
<li>
    <a  href="<?=site_url('master/pelanggan.php')?>">
        <i class="fa fa-calendar"></i> <span>Pelanggan</span>
    </a>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-opencart"></i> <span>Layanan</span>
        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="<?= site_url('master/jenis_layanan.php')?>"><i class="fa fa-circle-o"></i> Jenis Layanan</a></li>
        <li><a href="<?= site_url('master/layanan.php')?>"><i class="fa fa-circle-o"></i> Daftar Layanan</a></li>
    </ul>
</li>

<li>
    <a  href="<?=site_url('master/kendaraan.php')?>">
        <i class="fa fa-car"></i> <span>Kendaraan</span>
    </a>
</li>

<li class="header">Laporan</li>
<li>
    <a  href="<?=site_url('laporan_transaksi.php')?>">
        <i class="fa fa-calendar"></i> <span>Transaksi Penjualan</span>
    </a>
</li>
<li>
    <a  href="<?=site_url('laporan_penjualan_spare_part.php')?>">
        <i class="fa fa-calendar"></i> <span>Penjualan Spare Part</span>
    </a>
</li>
<li>
    <a  href="<?=site_url('laporan_stok_spare_part.php')?>">
        <i class="fa fa-calendar"></i> <span>Stok Spare Part</span>
    </a>
</li>
<!--                <li>-->
<!--                    <a href="#">-->
<!--                        <i class="fa fa-calendar"></i> <span>Tabel</span>-->
<!--                        <span class="pull-right-container">-->
<!--                            <small class="label pull-right bg-red">3</small>-->
<!--                            <small class="label pull-right bg-blue">17</small>-->
<!--                        </span>-->
<!--                    </a>-->
<!--                </li>-->
