<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 18/04/2019
 * Time: 14:34
 */
?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <!-- notif -->
			<?=$this->session->flashdata('login');?>
            <!-- notif -->

            <!-- result ajax -->
            <div class="result-content"> </div>

            <form class="login100-form validate-form flex-sb flex-w" method="post" id="form_login" action="javascript:void(0)" onsubmit="cek_login()">
					<span class="login100-form-title p-b-32 text-center">
						Login SI Lapak
					</span>

                <span class="txt1 p-b-11">
						Username
					</span>
                <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required" >
                    <input class="input100" type="text" name="username" autofocus="autofocus">
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Password
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                    <input class="input100" type="password" name="password" >
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function cek_login(){
        swal({html : '<div id="fountainG">' +
            '<div id="fountainG_1" class="fountainG"></div>' +
            '<div id="fountainG_2" class="fountainG"></div>' +
            '<div id="fountainG_3" class="fountainG"></div>' +
            '<div id="fountainG_4" class="fountainG"></div>' +
            '<div id="fountainG_5" class="fountainG"></div>' +
            '<div id="fountainG_6" class="fountainG"></div>' +
            '<div id="fountainG_7" class="fountainG"></div>' +
            '<div id="fountainG_8" class="fountainG"></div>' +
            '</div>',
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false,});
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('login/cek_login');?>",
            data: $('#form_login').serialize(),
            success: function(result){
                swal.close();
                $('.result-content').html(result)
            },
            error: function(result){
                $('.result-content').html(result)
            },
        });
    };
</script>