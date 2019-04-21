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
                        if ($json){ ?>
                            <label for="namaPemesan">Lampiran File : <?php echo $json->file_name?></label>
                            <div class="form-control" id="pdf"></div>
                        <?php }else{ ?>
                            <label for="namaPemesan">Lampiran File</label>
                            <input readonly="readonly" type="text" class="form-control" value="Tidak Ada Lampiran File">
                        <?php } ?>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Kembali</button>
                </div>
                <!-- /.form group -->
            </div>
            <!-- end box-body -->
        </div>
        <!--end box-->
    </div>
    <!--  end  -->
</div>

<script src="<?php echo base_url()?>assets/third_party/pdfobject/pdfobject.js"></script>
<script>PDFObject.embed("<?php echo base_url('assets/uploads/file/').$json->file_name?>", "#pdf");</script>
