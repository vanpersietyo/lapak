<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 27/10/2018
 * Time: 21:59
 */
/** @var CI_Controller $this */
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
                <h3 class="box-title">Biodata Pelaksana</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" title="Refresh Data" data-original-title="Refresh Data" onclick="refresh()"><i class="fa fa-refresh"> Refresh Data</i></button>
                </div>
                <!-- /. tools -->
            </div>

            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered sourced-data" id="mytable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pelaksana</th>
                            <th>Username Pelaksana</th>
                            <th>Nama Lengkap</th>
                            <th>Hak Akses</th>
                            <th>Bagian</th>
                            <th>Action</th>
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
            ajax        : { "url": "<?php echo site_url('master/user/ajax_list_pelaksana')?>", "type": "POST" },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
                    "orderable": false //set not orderable
                }
            ]
        });
    });

    function edit(id)
    {
        $('#form')[0].reset();
        $.ajax({
            url : "<?php echo site_url('master/user/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                let foto;
                if(data.<?php echo UserModel::t_foto;?> === '' || data.<?php echo UserModel::t_foto;?> == null ){
                    foto = "<?php echo base_url('assets/adminlte/dist/img/male-circle-512.png');?>";
                }else{
                    foto = "<?php echo base_url('assets/uploads/foto_profile/');?>"+data.<?php echo UserModel::t_foto;?>;
                }

                let status;
                if(data.<?php echo UserModel::t_deleted;?> === '0'){
                    status = 'Aktif';
                    $('[name=<?php echo UserModel::t_password;?>]').removeClass('has-danger bg-red');
                    $('[name=<?php echo UserModel::t_password;?>]').addClass('has-success bg-green');
                }else {
                    status = 'Nonaktif';
                    $('[name=<?php echo UserModel::t_password;?>]').removeClass('has-success bg-green');
                    $('[name=<?php echo UserModel::t_password;?>]').addClass('has-danger bg-red');
                }

                $('[name=<?php echo UserModel::t_kode_user;         ?>]').val(data.<?php echo UserModel::t_kode_user;           ?>);
                $('[name=<?php echo UserModel::t_id_user;           ?>]').val(data.<?php echo UserModel::t_id_user;             ?>);
                $('[name=<?php echo UserModel::t_id_jabatan;        ?>]').val(data.<?php echo UserModel::t_id_jabatan;          ?>).trigger('change');
                $('[name=<?php echo UserModel::t_username;          ?>]').val(data.<?php echo UserModel::t_username;            ?>);
                $('[name=<?php echo UserModel::t_nama;              ?>]').val(data.<?php echo UserModel::t_nama;                ?>);
                $('[name=<?php echo UserModel::t_password;          ?>]').val(status);
                $('[name=<?php echo UserModel::t_alamat;            ?>]').val(data.<?php echo UserModel::t_alamat;              ?>);
                $('[name=<?php echo UserModel::t_bagian;            ?>]').val(data.<?php echo UserModel::t_bagian;              ?>);
                $('[name=<?php echo UserModel::t_tugas;             ?>]').val(data.<?php echo UserModel::t_tugas;               ?>);
                $('[name=<?php echo UserModel::t_periode_kontrak;   ?>]').val(data.<?php echo UserModel::t_periode_kontrak;     ?>);
                $('[name=<?php echo UserModel::t_tgl_awal_kontrak;  ?>]').val(data.<?php echo UserModel::t_tgl_awal_kontrak;    ?>);
                $('[name=<?php echo UserModel::t_tgl_akhir_kontrak; ?>]').val(data.<?php echo UserModel::t_tgl_akhir_kontrak;   ?>);
                $('[name=<?php echo UserModel::t_tempat_lahir;      ?>]').val(data.<?php echo UserModel::t_tempat_lahir;        ?>);
                $('[name=<?php echo UserModel::t_email;             ?>]').val(data.<?php echo UserModel::t_email;               ?>);
                $('[name=<?php echo UserModel::t_tgl_lahir;         ?>]').val(data.<?php echo UserModel::t_tgl_lahir;           ?>);
                //$('[name=<?php //echo UserModel::t_foto;         ?>//]').attr('src',"<?php //echo base_url('assets/adminlte/dist/img/male-circle-512.png');?>//");
                $('[name=<?php echo UserModel::t_foto;         ?>]').attr('src',foto);
                $('[name=<?php echo UserModel::t_jenis_kelamin;     ?>]').val(data.<?php echo UserModel::t_jenis_kelamin;       ?>).trigger('change');
                $('#modal_form').modal('show');
                $('.modal-title').text('Detail Pelaksana');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function get_hak_akses() {
        id = $('[name="<?php echo UserModel::t_id_jabatan; ?>"]').val();
        if(id === '' || id === null){
        }else{
            $.ajax({
                url     : "<?php echo site_url('master/user/get_hak_akses')?>/"+id,
                type    : "GET",
                dataType: "JSON",
                success : function(data)
                {
                    if(data.status){
                        $('[name=<?php echo JabatanModel::v_nama_level;  ?>]').val(data.<?php echo JabatanModel::v_nama_level;    ?>);
                    }else{
                        swal({
                            title   : "Gagal !",
                            html    : '<h5>' + data.messages + '</h5>',
                            type    : 'error'
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    swal("Ya Ampun Maaf !", "Data Gagal Dihapus !", "warning");
                }
            });
        }
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
                            <input type="hidden" value="" name="update"/>
                            <input type="hidden" value="" name="<?php echo UserModel::t_id_user; ?>"/>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="projectinput2">Kode User</label>
                                            <input name="<?php echo UserModel::t_kode_user?>" class="form-control" type="text" placeholder="Akan Tergenerate Otomatis" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="projectinput2">Username</label>
                                            <input name="<?php echo UserModel::t_username?>" placeholder="Masukkan Username" class="form-control" type="text" autofocus="autofocus"  readonly="readonly">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_username;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="projectinput2">Password</label>
                                            <input name="<?php echo UserModel::t_password?>" placeholder="Password Default = Username" class="form-control" type="text"  readonly="readonly">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_password;?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="projectinput2">Nama Lengkap</label>
                                            <input name="<?php echo UserModel::t_nama?>" placeholder="Masukkan Nama Lengkap" class="form-control" type="text"  readonly="readonly">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_nama;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Bagian</label>
                                            <select class="form-control" name="<?php echo UserModel::t_id_jabatan;?>" onchange="get_hak_akses()"  disabled="disabled">
                                                <?php
                                                /** @var JabatanModel $list_jabatan */
                                                /** @var JabatanModel $detail */
                                                foreach ($list_jabatan as $detail){
                                                    echo '<option value="'.$detail->id_jabatan.'">'.$detail->nama_jabatan.'</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_id_jabatan;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="namaPemesan">Hak Akses</label>
                                            <input name="<?php echo JabatanModel::v_nama_level?>" placeholder=" - " class="form-control" type="text" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Jabatan</label>
                                            <input name="<?php echo UserModel::t_bagian;?>" placeholder="Jabatan User" class="form-control" type="text"  readonly="readonly">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_bagian;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Email User</label>
                                            <input name="<?php echo UserModel::t_email;?>" placeholder="Email User" class="form-control" type="text"  readonly="readonly">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_email;?>"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Telepon User</label>
                                            <input name="<?php echo UserModel::t_telp;?>" placeholder="No. Telepon User" class="form-control" type="text"  readonly="readonly">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_telp;?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tempat Lahir</label>
                                            <input name="<?php echo UserModel::t_tempat_lahir;?>" placeholder="Tempat Lahir" class="form-control" type="text"  readonly="readonly">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_tempat_lahir;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tanggal Lahir</label>
                                            <input name="<?php echo UserModel::t_tgl_lahir;?>" placeholder="Tanggal Lahir" class="form-control" type="date"  readonly="readonly">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_tgl_lahir;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="namaPemesan">Jenis Kelamin</label>
                                            <select class="form-control" name="<?php echo UserModel::t_jenis_kelamin;?>" disabled="disabled">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_jenis_kelamin;?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Periode Kontrak</label>
                                            <input name="<?php echo UserModel::t_periode_kontrak;?>" placeholder="Periode Kontrak" class="form-control" type="number" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tanggal Awal Kontrak</label>
                                            <input name="<?php echo UserModel::t_tgl_awal_kontrak;?>" placeholder="Tanggal Awal Kontrak" class="form-control" type="date"  readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tanggal Akhir Kontrak</label>
                                            <input name="<?php echo UserModel::t_tgl_akhir_kontrak;?>" placeholder="Tanggal Akhir Kontrak" class="form-control" type="date"  readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Alamat</label>
                                            <textarea name="<?php echo UserModel::t_alamat;?>" rows="4" cols="70" placeholder="Alamat" class="form-control"  readonly="readonly"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tugas</label>
                                            <textarea name="<?php echo UserModel::t_tugas;?>" rows="4" cols="70" placeholder="Tugas" class="form-control"  readonly="readonly"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Foto</label>
<!--                                            <script href="/../../../../../assets/uploads/foto_profile/"></script>-->
                                            <div class="img-responsive">
                                                <img src="" class="img-circle" name="<?php echo UserModel::t_foto;?>" alt="User Image" height="80px" width="80px">
                                            </div>
                                        </div>
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