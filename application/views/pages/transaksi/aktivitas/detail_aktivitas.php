<?php
/** @var AktivitasModel $json */
/** @var AktivitasModel $aktivitas */
if($aktivitas->status_aktivitas==0){
    $bg = 'bg-orange';
}elseif ($aktivitas->status_aktivitas==1){
    $bg = 'bg-green';
}else{
    $bg = 'bg-red';
}
?>
<link rel="stylesheet" href="<?=base_url('')?>assets/third_party/lightbox/dist/ekko-lightbox.css">
<style>
    .pdfobject-container { height: 50rem; }
</style>
<!-- /.row -->

<div class="row">
    <!--  start  -->
    <div class="col-lg-12">
        <!--start box-->
        <div class="box">
            <!-- start box-body -->
            <div class="box-body with-border">

                <div class="box-body pad">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label >Kode Aktivitas</label>
                                <input readonly="readonly" type="text" value="<?php echo $aktivitas->kode_aktivitas; ?>" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label >Status Aktivitas</label>
                                <input readonly="readonly" type="text" value="<?php echo $aktivitas->keterangan_status_aktivitas;?>" class="form-control <?php echo $bg ;?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label >Tanggal Aktivitas</label>
                                <input readonly="readonly" type="text" value="<?php echo Conversion::hariIndo($aktivitas->tgl_aktivitas).', '.Conversion::dateIndo($aktivitas->tgl_aktivitas,1) ;?>" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label>Waktu Pengerjaan Aktivitas</label>
                                <input readonly="readonly" type="text" class="form-control" value="<?php echo $aktivitas->keterangan_pengerjaan_aktivitas;?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label >Pelaksana</label>
                                <input readonly="readonly" type="text" value="<?php echo $aktivitas->nama; ?>" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label>Bagian</label>
                                <input readonly="readonly" type="text" class="form-control" value="<?php echo $aktivitas->bagian;?>">
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Jabatan</label>
                                <input readonly="readonly" type="text" class="form-control" value="<?php echo $aktivitas->nama_jabatan;?>">
                            </div>
                            <div class="col-lg-6">
                                <label>Sub Bidang</label>
                                <input readonly="readonly" type="text" class="form-control" value="<?php echo $aktivitas->keterangan_jabatan ;?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Nama Aktivitas</label>
                        <input readonly="readonly" type="text" class="form-control" value="<?php echo $aktivitas->nama_aktivitas;?>">
                    </div>

                    <div class="form-group">
                        <label for="namaPemesan">Keterangan AKtivitas</label>
                        <textarea class="form-control" disabled="disabled" class="form-control" type="text"  rows="4" cols="50" ><?php echo $aktivitas->keterangan_aktivitas;?></textarea>
                    </div>

                    <div class="form-group">
                        <?php
                        if ($json){
                            echo '<label for="namaPemesan">Lampiran File : '.$json->file_name.'</label> ';
                            echo '&nbsp; <a href="'.base_url().'assets/uploads/file/'.$json->file_name.'" download><span class="label label-success"><i class="fa fa-download"></i> Download File</span></a>';
                            if($json->is_image){ ?>
                                <div class="row margin-bottom">
                                    <div class="col-sm-6">
                                        <a href="<?php echo base_url('assets/uploads/file/').$json->file_name?>" data-toggle="lightbox" data-title="<?php echo $json->raw_name;?>" data-footer="<a href='<?php echo base_url('assets/uploads/file/').$json->file_name?>' download>Download Lampiran</a>">
                                            <img src="<?php echo base_url('assets/uploads/file/').$json->file_name?>" class="img-responsive">
                                        </a>
                                    </div>
                                </div>

                            <?php }else{
                                if(str_replace('.','',$json->file_ext)==='pdf'){?>
                                    <div class="form-control" id="pdf"></div>
                                <?php }else{?>
                                    <input readonly="readonly" type="text" class="form-control" value="Lampiran <?php echo $json->file_name; ?> File Tidak Bisa Ditampilkan, Silahkan Download">
                                <?php }?>
                            <?php } ?>

                        <?php }else{ ?>
                            <label for="namaPemesan">Lampiran File</label>
                            <input readonly="readonly" type="text" class="form-control" value="Tidak Ada Lampiran File">
                        <?php } ?>
                    </div>

                </div>
                <div class="box-footer text-center">
                    <button type="button" onclick="history.back();" class="btn btn-danger">Kembali</button>
                </div>
                <!-- /.form group -->
            </div>
            <!-- end box-body -->
        </div>
        <!--end box-->
    </div>
    <!--  end  -->
</div>


<!--<script src="/../lapak/assets/third_party/lightbox/dist/ekko-lightbox.min.js"></script>-->

<script src="<?php echo base_url('')?>assets/third_party/lightbox/dist/ekko-lightbox.js"></script>
<script src="<?php echo base_url('')?>assets/third_party/lightbox/dist/ekko-lightbox.min.js"></script>

<script src="<?php echo base_url('')?>assets/third_party/pdfobject/pdfobject.js"></script>
<script>PDFObject.embed("<?php echo base_url('assets/uploads/file/').$json->file_name?>", "#pdf");</script>
<script type="application/javascript">
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
