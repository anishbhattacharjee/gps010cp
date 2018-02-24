<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>GPS</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		
		<!-- iOS webapp icons -->
		<link rel="apple-touch-icon-precomposed" href="<?=base_url();?>assets/images/ios/fickle-logo-72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url();?>assets/images/ios/fickle-logo-72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url();?>assets/images/ios/fickle-logo-114.png" />

		<!-- TODO: Add a favicon -->
		<link rel="shortcut icon" href="<?=base_url();?>assets/images/ico/fab.ico">

		

		<!--Page loading plugin Start -->
		<link rel="stylesheet" href="<?=base_url();?>assets/css/plugins/pace.css">
		<script src="<?=base_url();?>assets/js/pace.min.js"></script>
		<!--Page loading plugin End   -->

		<!-- Plugin Css Put Here -->
		<link href="http://localhost/admin/assets/css/bootstrap.min.css" rel="stylesheet">

		<link rel="stylesheet" href="<?=base_url();?>dist/css/bootstrap-progressbar-3.1.1.css">
		
		
		<!-- Plugin Css End -->
		<!-- Custom styles Style -->
		<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
		<!-- Custom styles Style End-->

		
		<!-- Custom styles for this template -->


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-screen" style="background:url(../images/bg/KIEC-03.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"  >
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-content">
                        <div class="login-user-icon">
                            <i class="glyphicon glyphicon-user"></i>

                        </div>
                        <h3 style="color:#EA8706;">  Identify Yourself  </h3>
 <?php 
if(isset($_GET['msg']))
{
?>
<div class='alert alert-block alert-danger'>
<button type="button" class="close" data-dismiss="alert">
<i class="icon-remove"></i>
</button>
<?php echo $_GET['msg']; ?>
		</div>
<?php	} ?>
<?php 
if(isset($_GET['smsg']))
{
?>
<div class='alert alert-block alert-success' style="width: 500px;text-align: center;margin-left: 232px;">
<button type="button" class="close" data-dismiss="alert">
<i class="icon-remove"></i>
</button>
<?php echo $_GET['smsg']; ?>
		</div>
<?php	} ?>
                        
                    </div>

                    <div class="login-form">
                        <form id="login" action="<?=base_url();?>adminlogin/validate" method="post" >
                            <div class="input-group ls-group-input">
                                <input class="form-control" type="text" id="inputEmail" name="username" placeholder="Username" placeholder="Username">
                                <span class="input-group-addon"><i class="fa fa-user" style="color:#EA8706;"></i></span>
                            </div>


                            <div class="input-group ls-group-input">

                                <input class="form-control" type="password" placeholder="Password" id="inputPassword" name="password"  >
                                <span class="input-group-addon"><i class="fa fa-lock" style="color:#EA8706;"></i></span>
                            </div>

                            
                            
                            <div class="input-group ls-group-input login-btn-box">
                                <button type="submit" class="btn ls-dark-btn ladda-button col-md-12 col-sm-12 col-xs-12" data-style="slide-down" >
                                    <span class="ladda-label"><i class="fa fa-key" style="color:#EA8706;"></i></span>
                                </button>
                                

                                <a class="forgot-password" href="javascript:void(0)">Forgot password</a>
                            </div>
                        </form>
                    </div>
                    <div class="forgot-pass-box">
                        <form action="#" class="form-horizontal ls_form">
                            <div class="input-group ls-group-input">
                                <input class="form-control" type="text" placeholder="someone@mail.com">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                            <div class="input-group ls-group-input login-btn-box">
                                <button class="btn ls-dark-btn col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-rocket"></i> Send
                                </button>

                                <a class="login-view" href="javascript:void(0)">Login</a>  

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <p class="copy-right big-screen hidden-xs hidden-sm">
        <span>&#169;</span> GPS <span class="footer-year">2016</span>
    </p>
</section>

</body>
<script src="<?=$base_url();?>assets/js/lib/jquery-2.1.1.min.js"></script>
<script src="<?=$base_url();?>assets/js/lib/jquery.easing.js"></script>
<script src="<?=$base_url();?>assets/js/bootstrap-switch.min.js"></script>
<!--Script for notification start-->
<script src="<?=$base_url();?>assets/js/loader/spin.js"></script>
<script src="<?=$base_url();?>assets/js/loader/ladda.js"></script>
<script src="<?=$base_url();?>assets/js/humane.min.js"></script>

<script type="text/javascript">

jQuery(document).ready(function($) {
    'use strict';

    bootstrap_switch_trigger_call();
    forgo_password_view();
    login_view_submit();
    // Bind progress buttons and simulate loading progress
    ladda_button_call();
});
/*** Switch Call ***/
function bootstrap_switch_trigger_call(){
    $(".switchCheckBox").bootstrapSwitch();

}
/*** Switch Call  End***/
function forgo_password_view(){
    $(".forgot-password, .login-view").click(function () {
        $('.login-form, .forgot-pass-box').slideToggle('slow');
    });


}
function login_view_submit(){
    $('#form-login').submit(function () {
        /*var setUrl = window.location.origin + '/index.html'
         window.location.assign(setUrl);*/

        return false;
    });
}

function ladda_button_call(){
    Ladda.bind('button.ladda-button', {
        callback: function (instance) {
            var progress = 0;
            var interval = setInterval(function () {
                progress = Math.min(progress + Math.random() * 0.1, 1);
                instance.setProgress(progress);

                if (progress === 1) {
                    instance.stop();
                    clearInterval(interval);
                    //Checking Login in here


                    var jacked = humane.create({baseCls: 'humane-jackedup', addnCls: 'humane-jackedup-success'});
                    jacked.log("<i class='fa fa-smile-o'></i> Successfully logedin ");

                    setInterval(function () {
                        var setUrl = './index.php';
                        window.location.assign(setUrl);
                    }, 500);
                }
            }, 200);
        }
    });
}
</script>
</html>
