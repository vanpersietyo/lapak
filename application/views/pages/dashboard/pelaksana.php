<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 24/10/2018
 * Time: 14:59
 */
/** @var CI_Controller $this */

$aktivitas  = $this->AktivitasModel->find_view([
	AktivitasModel::t_deleted    => 0,
	AktivitasModel::t_id_user    => $this->role->user_id_yang_login(),
])->num_rows();
$akt_now    = $this->AktivitasModel->find_view([
	AktivitasModel::t_deleted    => 0,
	AktivitasModel::t_id_user    => $this->role->user_id_yang_login(),
	AktivitasModel::t_tgl_aktivitas => date('Y-m-d')
])->num_rows();
?>
<!-- Small boxes (Stat box) -->
<div class="row">

    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $akt_now;?></h3>
                <p>Aktivitas Hari Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?=site_url('master/user_pelaksana')?>" class="small-box-footer"> Lihat Aktivitas&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $aktivitas;?></h3>
                <p>Semua Aktivitas</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=site_url('transaksi/aktivitas')?>" class="small-box-footer"> Lihat Semua Aktivitas&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- /.row -->
