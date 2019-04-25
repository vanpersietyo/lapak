<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 27/10/2018
 * Time: 21:59
 */
/** @var CI_Controller $this */
/** @var UserModel $user */
?>

<style type="text/css">
    .help-block {
        display: inline  !important;
        margin-top: 0  !important;
        margin-bottom: 0 !important;
    }
</style>

<div class="row">
    <!--  start  -->
    <div class="col-lg-12">
        <!--start box-->
        <div class="box">
            <!-- start box-body -->
            <div class="box-body with-border">

                <div class="box-body pad">

                    <fieldset>
                        <form class="form-horizontal" method="post" action="javascript:void(0)" id="form" onsubmit="save()" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" value="<?php echo $user->id_user;?>" name="<?php echo UserModel::t_id_user; ?>"/>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="projectinput2">Kode User</label>
                                            <input name="<?php echo UserModel::t_kode_user?>" class="form-control" type="text" value="<?php echo $user->kode_user;?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="projectinput2">Username</label>
                                            <input name="<?php echo UserModel::t_username?>" placeholder="Masukkan Username" value="<?php echo $user->username;?>"  class="form-control" type="text" autofocus="autofocus" required="required">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_username;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="projectinput2">Password</label>
                                            <div class="input-group input-group">
                                                <input name="<?php echo UserModel::t_password?>" placeholder="Password Default = Username" class="form-control" type="password">
                                                <span class="input-group-btn">
                                                <a href="<?php echo site_url('ubah_password.php')?>" type="button" class="btn btn-info btn-flat">Ubah Password</a>
                                                </span>
                                            </div>
<!--                                            <div class="--><?php //echo 'NOTIF_ERROR_'.UserModel::t_password;?><!--"></div>-->
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Bagian</label>
                                            <select data-live-search-placeholder="Pilih Bagian" class="form-control" name="<?php echo UserModel::t_id_jabatan;?>" data-show-subtext="true" data-live-search="true" disabled="disabled" onchange="get_hak_akses()">
                                                <option value=""> -- Pilih Bagian-- </option>
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
                                            <input name="<?php echo JabatanModel::v_nama_level?>" placeholder=" - " class="form-control" type="text" readonly="readonly" disabled="disabled">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Jabatan</label>
                                            <input name="<?php echo UserModel::t_bagian;?>" class="form-control" type="text" disabled="disabled">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="projectinput2">Nama Lengkap</label>
                                            <input name="<?php echo UserModel::t_nama?>" placeholder="Masukkan Nama Lengkap" class="form-control" type="text" required="required">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_nama;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Email User</label>
                                            <input name="<?php echo UserModel::t_email;?>" placeholder="Email User" class="form-control" type="text">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_email;?>"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Telepon User</label>
                                            <input name="<?php echo UserModel::t_telp;?>" placeholder="No. Telepon User" class="form-control" type="text">
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
                                            <input name="<?php echo UserModel::t_tempat_lahir;?>" placeholder="Tempat Lahir" class="form-control" type="text">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_tempat_lahir;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tanggal Lahir</label>
                                            <input name="<?php echo UserModel::t_tgl_lahir;?>" placeholder="Tanggal Lahir" class="form-control" type="date">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_tgl_lahir;?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label for="namaPemesan">Jenis Kelamin</label>
                                            <select data-live-search-placeholder="Pilih Jenis Kelamin" class="form-control" name="<?php echo UserModel::t_jenis_kelamin;?>" data-show-subtext="true" data-live-search="true" >
                                                <option value=""> -- Pilih Jenis Kelamin-- </option>
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
                                            <input name="<?php echo UserModel::t_periode_kontrak;?>" class="form-control" type="text" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tanggal Awal Kontrak</label>
                                            <input name="<?php echo UserModel::t_tgl_awal_kontrak;?>"  class="form-control" type="date" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tanggal Akhir Kontrak</label>
                                            <input name="<?php echo UserModel::t_tgl_akhir_kontrak;?>"  class="form-control" type="date" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Alamat</label>
                                            <textarea name="<?php echo UserModel::t_alamat;?>" placeholder="Alamat" class="form-control"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Tugas</label>
                                            <textarea name="<?php echo UserModel::t_tugas;?>" placeholder="Tugas" class="form-control" disabled="disabled"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-body">
                                            <label class="control-label">Foto</label>
                                            <input type="file" name="<?php echo UserModel::t_foto;?>">
                                            <div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_foto;?>"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <button type="submit" id="btnSave" class="btn btn-info"> Simpan</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </fieldset>

                </div>
                <!-- /.form group -->
            </div>
            <!-- end box-body -->
        </div>
        <!--end box-->
    </div>
    <!--  end  -->
</div>

<script type="text/javascript">

    function edit(id)
    {
        position = 'update';
        $('#form')[0].reset();
        clear();
        $.ajax({
            url : "<?php echo site_url('master/user/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="update"]').val('true');
                $('[name=<?php echo UserModel::t_kode_user;         ?>]').val(data.<?php echo UserModel::t_kode_user;           ?>);
                $('[name=<?php echo UserModel::t_id_user;           ?>]').val(data.<?php echo UserModel::t_id_user;             ?>);
                $('[name=<?php echo UserModel::t_id_jabatan;        ?>]').val(data.<?php echo UserModel::t_id_jabatan;          ?>).trigger('change');
                $('[name=<?php echo UserModel::t_username;          ?>]').val(data.<?php echo UserModel::t_username;            ?>);
                $('[name=<?php echo UserModel::t_nama;              ?>]').val(data.<?php echo UserModel::t_nama;                ?>);
                $('[name=<?php echo UserModel::t_password;          ?>]').val('xxxxxxxx');
                $('[name=<?php echo UserModel::t_password;          ?>]').attr('readonly','readonly');
                $('[name=<?php echo UserModel::t_alamat;            ?>]').val(data.<?php echo UserModel::t_alamat;              ?>);
                $('[name=<?php echo UserModel::t_telp;              ?>]').val(data.<?php echo UserModel::t_telp;              ?>);
                $('[name=<?php echo UserModel::t_bagian;            ?>]').val(data.<?php echo UserModel::t_bagian;              ?>);
                $('[name=<?php echo UserModel::t_tugas;             ?>]').val(data.<?php echo UserModel::t_tugas;               ?>);
                $('[name=<?php echo UserModel::t_periode_kontrak;   ?>]').val(data.<?php echo UserModel::t_periode_kontrak;     ?>);
                $('[name=<?php echo UserModel::t_tgl_awal_kontrak;  ?>]').val(data.<?php echo UserModel::t_tgl_awal_kontrak;    ?>);
                $('[name=<?php echo UserModel::t_tgl_akhir_kontrak; ?>]').val(data.<?php echo UserModel::t_tgl_akhir_kontrak;   ?>);
                $('[name=<?php echo UserModel::t_tempat_lahir;      ?>]').val(data.<?php echo UserModel::t_tempat_lahir;        ?>);
                $('[name=<?php echo UserModel::t_email;             ?>]').val(data.<?php echo UserModel::t_email;               ?>);
                $('[name=<?php echo UserModel::t_tgl_lahir;         ?>]').val(data.<?php echo UserModel::t_tgl_lahir;           ?>);
                $('[name=<?php echo UserModel::t_jenis_kelamin;     ?>]').val(data.<?php echo UserModel::t_jenis_kelamin;       ?>).trigger('change');
                $('#modal_form').modal('show');
                $('[name="<?php echo UserModel::t_username;         ?>"]').focus();
                $('.modal-title').text('Ubah Data User');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function clear()
    {
        $(  '[name="<?php echo UserModel::t_username; ?>"],' +
            '[name="<?php echo UserModel::t_telp; ?>"],' +
            '[name="<?php echo UserModel::t_foto; ?>"],' +
            '[name="<?php echo UserModel::t_tgl_lahir; ?>"],' +
            '[name="<?php echo UserModel::t_email; ?>"],' +
            '[name="<?php echo UserModel::t_password; ?>"]').parents("div.form-body.has-error").removeClass('has-error');

        $(  '[class="NOTIF_ERROR_<?php echo UserModel::t_username; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo UserModel::t_telp; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo UserModel::t_foto; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo UserModel::t_tgl_lahir; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo UserModel::t_email; ?>"],' +
            '[class="NOTIF_ERROR_<?php echo UserModel::t_password; ?>"]').html('');
    }

    function save()
    {
        let btnsv = $('#btnSave');
        btnsv.text('saving...'); //change button text
        btnsv.attr('disabled',true); //set button disable
        clear();
        // ajax adding data to database
        let formData = new FormData($('#form')[0]);
        $.ajax({
            url         : "<?php echo site_url('master/user/update_profile')?>",
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
                    swal({
                        title: 'Success!',
                        html: '<h5>' + data.messages + '</h5>',
                        type: 'success'
                    });
                    edit(<?php echo $user->id_user;?>)
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

    //function untuk delete data
    function reset(id,kode,name)
    {
        swal({
            title: 'Reset Password?',
            html: '<h5>Yakin akan Reset Password User <b>'+kode+' - '+name+'</b>?</h5>',
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
                    url     : "<?php echo site_url('master/user/ajax_reset')?>/"+id,
                    type    : "POST",
                    dataType: "JSON",
                    success : function(data)
                    {
                        if(data.status){
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
</script>

<script type="application/javascript">
    $( document ).ready(function() {
        $(".select2").select2();
        edit(<?php echo $user->id_user;?>)
    });
</script>
