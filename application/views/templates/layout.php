<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 22/10/2018
 * Time: 14:39
 */
if(!isset($subtitle)){$data['subtitle']= 'Subtitle Empty';}else{$data['subtitle']= $subtitle;}
if(!isset($title)){$data['title']= 'Title Empty';}else{$data['title']= $title;}

?>
<!--<style>-->
<!--    .wrapper {-->
<!--        height: 100%;-->
<!--        position: relative ;-->
<!--        overflow-x: hidden ;-->
<!--        overflow-y: hidden ;-->
<!--    }-->
<!--</style>-->
<?php $this->load->view('templates/header',true)?>

<?php $this->load->view('templates/sidebar',true)?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?=$title?>
                <small><?=$subtitle?></small>
            </h1>
<!--            <ol class="breadcrumb">-->
<!--                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
<!--                <li class="active">Dashboard</li>-->
<!--            </ol>-->
        </section>
        <!-- Main content -->
        <section class="content">
            <?php $this->load->view($page,$data)?>
        </section>
        <!-- /.content -->
    </div>

<?php $this->load->view('templates/footer',true)?>

<?php $this->load->view('templates/script',true)?>