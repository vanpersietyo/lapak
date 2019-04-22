<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 24/10/2018
 * Time: 14:59
 */
/** @var CI_Controller $this */
$pelaksana  = $this->UserModel->find_view([
                    UserModel::v_id_level   => 4,
                    UserModel::t_deleted    => 0
                ])->num_rows();
$user       = $this->UserModel->find_view([
                    UserModel::t_deleted    => 0
                ])->num_rows();
$aktivitas  = $this->AktivitasModel->find_view([
                    UserModel::t_deleted    => 0
                ])->num_rows();
?>
<!-- Small boxes (Stat box) -->
<div class="row">

    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $pelaksana;?></h3>
                <p>Total Pelaksana</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=site_url('master/user_pelaksana')?>" class="small-box-footer">Lihat Biodata Pelaksana<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?php echo $user;?></h3>
                <p>Total User</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?=site_url('master/user')?>" class="small-box-footer">Lihat Daftar User<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $aktivitas;?></h3>
                <p>Total Aktivitas</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=site_url('transaksi/aktivitas')?>" class="small-box-footer">Lihat Aktivitas <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- /.row -->
