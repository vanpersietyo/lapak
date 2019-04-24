<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 27/10/2018
 * Time: 21:59
 */
/** @var CI_Controller $this */
/** @var int $id_user */
?>

<style type="text/css">
    .help-block {
        display: inline  !important;
        margin-top: 0  !important;
        margin-bottom: 0 !important;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">

            <div class="box-header" style="cursor: move;">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Kelola Aktivitas</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <?php if($this->role->level() == 4){?>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Tambah Data" data-original-title="Tambah Data" onclick="add()"><i class="fa fa-plus"> Tambah Data</i></button>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Refresh Data" data-original-title="Refresh Data" onclick="refresh()"><i class="fa fa-refresh"> Refresh Data</i></button>
                    <?php } ?>
                </div>
                <!-- /. tools -->
            </div>

            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered sourced-data" id="mytable" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 10%">Kode</th>
                                <th style="width: 15%">Aktvitas</th>
                                <th style="width: 15%">Tanggal</th>
                                <th style="width: 15%">Pelaksana</th>
                                <th style="width: 15%">Sub Bagian</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    var table;
    var position = 'add';
    $(document).ready(function() {
        table = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage   : {sProcessing: "loading..."},
            order       : [],
            ajax        : { "url": "<?php echo site_url('transaksi/aktivitas/ajax_list/').$id_user?>", "type": "POST" },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
                    "orderable": false //set not orderable
                }
            ]
        });
    });

    function add()
    {
        if(position === 'update'){
            before_add();
        }
        position = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('[name=<?php echo AktivitasModel::t_nama_aktivitas;       ?>]').val('');
        $('[name=<?php echo AktivitasModel::t_pengerjaan_aktivitas; ?>]').val('');
        $('[name=<?php echo AktivitasModel::t_keterangan_aktivitas; ?>]').val('');
        $('#modal_form').modal('show'); // show bootstrap modal
        $('[name="<?php echo AktivitasModel::t_nama_aktivitas;    ?>"]').focus();
        $('.modal-title').text('Tambah Data User'); // Set Title to Bootstrap modal title
    }
    function before_add() {
        $('#form')[0].reset(); // reset form on modals
        clear();
    }

    function edit(id)
    {
        position = 'update';
        $('#form')[0].reset();
        clear();
        $.ajax({
            url : "<?php echo site_url('transaksi/aktivitas/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name=<?php echo AktivitasModel::t_id_aktivitas;         ?>]').val(data.<?php echo AktivitasModel::t_id_aktivitas;       ?>);
                $('[name=<?php echo AktivitasModel::t_id_user;              ?>]').val(data.<?php echo AktivitasModel::t_id_user;            ?>);
                $('[name=<?php echo AktivitasModel::t_nama_aktivitas;       ?>]').val(data.<?php echo AktivitasModel::t_nama_aktivitas;     ?>);
                $('[name=<?php echo AktivitasModel::t_pengerjaan_aktivitas; ?>]').val(data.<?php echo AktivitasModel::t_pengerjaan_aktivitas;?>);
                $('[name=<?php echo AktivitasModel::t_kode_aktivitas;       ?>]').val(data.<?php echo AktivitasModel::t_kode_aktivitas;     ?>);
                $('[name=<?php echo AktivitasModel::t_status_aktivitas;     ?>]').val(data.<?php echo AktivitasModel::t_status_aktivitas;   ?>);
                $('[name=<?php echo AktivitasModel::t_tgl_aktivitas;        ?>]').val(data.<?php echo AktivitasModel::t_tgl_aktivitas;      ?>);
                $('[name=<?php echo AktivitasModel::t_keterangan_aktivitas; ?>]').val(data.<?php echo AktivitasModel::t_keterangan_aktivitas;?>);
                $('#modal_form').modal('show');
                $('[name="<?php echo AktivitasModel::t_nama_aktivitas;?>"]').focus();
                $('.modal-title').text('Ubah Data Aktivitas');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function clear()
    {
        $(  '[name="<?php echo AktivitasModel::t_nama_aktivitas; ?>"],' +
            '[name="<?php echo AktivitasModel::t_pengerjaan_aktivitas; ?>"],' +
            '[name="<?php echo AktivitasModel::t_keterangan_aktivitas; ?>"],' +
            '[name="<?php echo AktivitasModel::t_file; ?>"],' +
            '[name="<?php echo AktivitasModel::t_tgl_aktivitas; ?>"]').parents("div.form-body.has-error").removeClass('has-error');

        $(  '[class="NOTIF_ERROR_<?php echo AktivitasModel::t_tgl_aktivitas; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo AktivitasModel::t_nama_aktivitas; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo AktivitasModel::t_keterangan_aktivitas; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo AktivitasModel::t_file; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo AktivitasModel::t_pengerjaan_aktivitas; ?>"]').html('');
    }

    function refresh()
    {
        loading();
        setTimeout(function(){
            swal.close();
            table.api().ajax.reload();
            }, 1000);
    }
    function reload()
    {
        table.api().ajax.reload();
    }

    function save()
    {
        let btnsv   = $('#btnSave');
        let url;
        btnsv.text('saving...'); //change button text
        btnsv.attr('disabled',true); //set button disable
        clear();
        if(position === 'add'){
            url = "<?php echo site_url('transaksi/aktivitas/ajax_add')?>";
        }else{
            url = "<?php echo site_url('transaksi/aktivitas/ajax_update')?>"
        }
        // ajax adding data to database
        let formData = new FormData($('#form')[0]);
        $.ajax({
            url         : url,
            type        : "POST",
            data        : formData,
            contentType : false,
            processData : false,
            dataType    : "JSON",
            success     : function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload();
                    swal({
                        title: 'Success!',
                        html: '<h5>' + data.messages + '</h5>',
                        type: 'success'
                    });
                    before_add();
                }
                else
                {
                    if(data.sw_alert){
                        swal({
                            title   : 'Gagal!',
                            html    : '<h5>' + data.messages + '</h5>',
                            type    : 'error'
                        });
                    }else{
                        for (let i = 0; i < data.inputerror.length; i++)
                        {
                            let inputerror = $('[name="'+data.inputerror[i]+'"]');
                            // inputerror.parents("div.form-group").addClass('has-error');
                            inputerror.parents("div.form-body").addClass('has-error');
                            $('[class="NOTIF_ERROR_'+data.inputerror[i]+'"]').html(data.notiferror[i]);
                        }
                        $('[name="'+data.inputerror[0]+'"]').focus();
                    }

                }
                btnsv.text('save'); //change button text
                btnsv.attr('disabled',false); //set button enable
            },
            error       : function (jqXHR, textStatus, errorThrown)
            {
                swal("Ya Ampun Maaf !", "Data Gagal Disimpan !", "warning");
                btnsv.text('save'); //change button text
                btnsv.attr('disabled',false); //set button enable
            }
        });
    }

    //function untuk delete data
    function remove(id,kode,name)
    {
        swal({
            title: 'Delete Data?',
            html: '<h5>Yakin akan delete aktivitas <b>'+kode+' - '+name+'</b>?</h5>',
            type: 'info',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url     : "<?php echo site_url('transaksi/aktivitas/ajax_delete')?>/"+id,
                    type    : "POST",
                    dataType: "JSON",
                    success : function(data)
                    {
                        if(data.status){
                            reload();
                            swal({
                                title   : "Berhasil !",
                                html    : '<h5>' + data.messages + '</h5>',
                                type    : 'success'
                            });
                        }else{
                            swal("Gagal!", data.messages, "error");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal("Ya Ampun Maaf !", "Data Gagal Dihapus !", "warning");
                    }
                });
            }
        })
    }


    //function untuk delete data
    function approve(id,kode,name)
    {
        swal({
            title: 'Setujui Aktivitas?',
            html: '<h5>Masukkan Pesan Untuk Menyetujui Aktivitas <b>'+kode+' - '+name+'</b>?</h5>',
            type: 'success',
            input: 'text',
            showCancelButton: true,
            allowOutsideClick: false,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Setujui',
        }).then((result) => {
            if (result.value) {
                let alasan = result.value;
                $.ajax({
                    url     : "<?php echo site_url('transaksi/aktivitas/ajax_approve')?>/"+id,
                    type: "POST",
                    data: "alasan="+alasan,
                    cache:false,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status) {
                            reload();
                            swal({
                                title: "Berhasil !",
                                html: '<h5>' + data.messages + '</h5>',
                                type: 'success'
                            });
                        } else {
                            swal("Gagal!",data.messages, "error");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Maaf", "Data Gagal Menyetujui. Hubungi Admin!", "warning");
                    }
                });
            }else if (result.dismiss === swal.DismissReason.cancel)
            {}
            else{
                $.ajax({
                    url     : "<?php echo site_url('transaksi/aktivitas/ajax_approve')?>/"+id,
                    type    : "POST",
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status) {
                            reload();
                            swal({
                                title: "Berhasil !",
                                html: '<h5>' + data.messages + '</h5>',
                                type: 'success'
                            });
                        } else {
                            swal("Gagal!",data.messages, "error");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Maaf", "Data Gagal Menyetujui. Hubungi Admin!", "warning");
                    }
                });
            }
        });
    }

    //function untuk delete data
    function reject(id,kode,name)
    {
        swal({
            title: 'Penolakan Aktivitas',
            html: '<h5>Masukkan Alasan Penolakan Aktivitas <b>'+kode+' - '+name+'</b>!</h5>',
            input: 'text',
            type: 'error',
            showCancelButton: true,
            allowOutsideClick: false,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tolak',
        }).then((result) => {
            if (result.value) {
                let alasan = result.value;
                if(alasan == null || alasan === ''){
                    swal({
                        title: "Gagal Menolak!",
                        html: '<h5>Alasan Harus Diisi!</h5>',
                        type: 'error'
                    });
                }else{
                    $.ajax({
                        url : "<?php echo site_url('transaksi/aktivitas/ajax_reject')?>/" + id,
                        type: "POST",
                        data: "alasan="+alasan,
                        cache:false,
                        dataType: "JSON",
                        success: function (data) {
                            if (data.status) {
                                reload();
                                swal({
                                    title: "Berhasil !",
                                    html: '<h5>' + data.messages + '</h5>',
                                    type: 'success'
                                });
                            } else {
                                swal("Gagal!", data.messages, "error");
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            swal("Ya Ampun Maaf !", "Data Gagal Ditolak. Hubungi Admin!", "warning");
                        }
                    });
                }
            }else if (result.dismiss === swal.DismissReason.cancel)
            {
            }else{
                swal({
                    title: 'Gagal Menolak',
                    html: '<h5>Alasan Harus Di Isi !</h5>',
                    type: 'error',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Isi Alasan',
                }).then((result) => {
                    if (result.value) {
                        reject(id,kode,name);
                    }
                });
            }
        });
    }
</script>


<!-- modal -->
<div class="modal fade" id="modal_form">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Default Modal</h4>
            </div>

            <div class="modal-body">
                <!-- /.box-header -->
                <div class="box-body">

                    <fieldset>
                        <form class="form-horizontal" method="post" action="javascript:void(0)" id="form" onsubmit="save()" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" value="" name="<?php echo AktivitasModel::t_id_user;       ?>"/>
                            <input type="hidden" value="" name="<?php echo AktivitasModel::t_id_aktivitas;  ?>"/>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-body">
                                            <label for="projectinput2">Kode Aktivitas</label>
                                            <input name="<?php echo AktivitasModel::t_kode_aktivitas?>" class="form-control" type="text" placeholder="Akan Tergenerate Otomatis" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-body">
                                            <label for="projectinput2">Nama Aktivitas</label>
                                            <input name="<?php echo AktivitasModel::t_nama_aktivitas?>" placeholder="Masukkan Nama Aktivitas" class="form-control" type="text" autofocus="autofocus">
                                            <div class="<?php echo 'NOTIF_ERROR_'.AktivitasModel::t_nama_aktivitas;?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-body">
                                            <label class="control-label">Tanggal Aktivitas</label>
                                            <input name="<?php echo AktivitasModel::t_tgl_aktivitas;?>" placeholder="Tanggal Aktivitas" class="form-control" type="date" value="<?php echo date('Y-m-d');?>">
                                            <div class="<?php echo 'NOTIF_ERROR_'.AktivitasModel::t_tgl_aktivitas;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-body">
                                            <label for="namaPemesan">Pengerjaan Aktivitas</label>
                                            <select data-live-search-placeholder="Pilih Waktu Pengerjaan Aktivitas" class="form-control" name="<?php echo AktivitasModel::t_pengerjaan_aktivitas;?>" data-show-subtext="true" data-live-search="true" >
                                                <option value=""> -- Pilih Waktu Pengerjaan Aktivitas-- </option>
                                                <option value="0">Jam Kerja</option>
                                                <option value="1">Luar Jam Kerja / Lembur</option>
                                            </select>
                                            <div class="<?php echo 'NOTIF_ERROR_'.AktivitasModel::t_pengerjaan_aktivitas;?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-body">
                                            <label class="control-label">Keterangan Aktivitas</label>
                                            <textarea name="<?php echo AktivitasModel::t_keterangan_aktivitas;?>" placeholder="Keterangan Aktivitas" class="form-control"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-body">
                                            <label class="control-label">File</label>
                                            <input type="file" name="<?php echo AktivitasModel::t_file;?>" value="<?php echo AktivitasModel::t_file;?>">
                                            <div class="<?php echo 'NOTIF_ERROR_'.AktivitasModel::t_file;?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <button type="submit" id="btnSave" class="btn btn-info btn-sm"> Simpan</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                    <!-- /.row -->
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="application/javascript">
    $( document ).ready(function() {
        $(".select2").select2();
    });
</script>
