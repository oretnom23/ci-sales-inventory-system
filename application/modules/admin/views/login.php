<html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap/css/bootstrap.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap-toastr/toastr.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/components.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/plugins.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/layout.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/themes/default.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/login.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/local.css") ?>">
		<style>
			.login .logo{margin-top:0px;}
			.login .logo > a > img{width:250px;}
		</style>
	</head>

	<body class="login">
		<div class="logo">
			<a href="<?php echo base_url() ?>">
				<img src="<?php echo base_url("assets/images/admin/admin.jpg") ?>" alt="POS">
			</a>
		</div>
		<div class="content">
			<form class="login-form" action="<?php echo site_url("admin/login/authenticate"); ?>" method="post">
				<h3 class="form-title">Log In</h3>
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control form-control-solid placeholder-no-fix" name="username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control form-control-solid placeholder-no-fix" name="password">
				</div>
				<div class="form-actions">
					<input type="submit" class="btn btn-success uppercase" value="Login">
				</div>
			</form>
		</div>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-validation/js/jquery.validate.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-validation/js/additional-methods.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap-toastr/toastr.min.js") ?>"></script>
		<script type="text/javascript">
			(function($){
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"positionClass": "toast-bottom-right",
					"onclick": null,
					"showDuration": "1000",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};

				$(".login-form").validate({
					rules : {
						username : "required",
						password : "required",
					},
					submitHandler : function(form){
						$.post($(form).attr("action"),$(form).serialize()).done(function(response){
							if(response.status){
								window.location.href = "<?php echo site_url("admin/dashboard"); ?>"
							}else{
								toastr["error"](response.message);
							}
						});
					}
				});
			}(jQuery));
		</script>
	</body>
</html>