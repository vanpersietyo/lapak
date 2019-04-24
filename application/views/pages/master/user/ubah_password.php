<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 24/04/2019
 * Time: 14:45
 */?>

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

							<div class="form-group">
								<div class="row">

									<div class="col-md-4">
										<div class="form-body">
											<label for="projectinput2">Password Lama</label>
											<input name="<?php echo UserModel::t_password; ?>" class="form-control" type="password" placeholder="Password Sekarang" >
											<div class="<?php echo 'NOTIF_ERROR_'.UserModel::t_password;?>"></div>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-body">
											<label for="projectinput2">Password Baru</label>
											<input name="password_baru" class="form-control" type="password" placeholder="Password Baru" >
											<div class="NOTIF_ERROR_password_baru"></div>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-body">
											<label for="projectinput2">Confirm Password</label>
											<input name="confirm_password" class="form-control" type="password" placeholder="Ulangi Password Baru" >
											<div class="NOTIF_ERROR_confirm_password"></div>
										</div>
									</div>

								</div>
							</div>

							<div class="row">
								<div class="col-md-12 text-center">
									<div class="form-group">
										<button type="submit" id="btnSave" class="btn btn-info"> Simpan</button>
										<a type="button" href="<?php echo site_url('profile.php')?>" class="btn btn-danger">Batal</a>
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

    function clear()
    {
        $(  '[name="<?php echo UserModel::t_password; ?>"],' +
        	'[name="password_baru"],' +
            '[name="confirm_password"]').parents("div.form-body.has-error").removeClass('has-error');

        $(  '[class="NOTIF_ERROR_<?php echo UserModel::t_password; ?>"],' +
			'[class="NOTIF_ERROR_confirm_password"],' +
            '[class="NOTIF_ERROR_password_baru"]').html('');
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
            url         : "<?php echo site_url('master/user/ubah_password_go')?>",
            type        : "POST",
            data        : formData,
            contentType : false,
            processData : false,
            dataType    : "JSON",
            success     : function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                    swal({
                        title: 'Berhasil',
                        html: '<h5>Password Berhasil Diubah!</h5>',
                        type: 'success',
                        allowOutsideClick: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.value) {
                            	window.location.href = '<?=site_url('profile.php')?>';
                            }
                    });
                }
					//
                    //swal({
                    //    title: 'Success!',
                    //    html: '<h5>' + data.messages + '</h5>',
                    //    type: 'success'
                    //});
					//
                    //window.location.href = '<?//=site_url('profile.php')?>//';
                // }
                else
                {
					for (let i = 0; i < data.inputerror.length; i++)
					{
						let inputerror = $('[name="'+data.inputerror[i]+'"]');
						// inputerror.parents("div.form-group").addClass('has-error');
						inputerror.parents("div.form-body").addClass('has-error');
						$('[class="NOTIF_ERROR_'+data.inputerror[i]+'"]').html(data.notiferror[i]);
					}
					$('[name="'+data.inputerror[0]+'"]').focus();
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
</script>