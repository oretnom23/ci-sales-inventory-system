<html>
	<head>
		<title><?php echo $title ?></title>
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/font-awesome/css/font-awesome.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap/css/bootstrap.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap-toastr/toastr.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap-slider/css/bootstrap-slider.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/frontend_2/style.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/frontend_2/local.css") ?>">
	</head>
	<body>

		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-ui/jquery-ui.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootbox/bootbox.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap-toastr/toastr.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-validation/js/jquery.validate.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-validation/js/additional-methods.min.js") ?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
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

				$(document).on("click",".btn-action",function(){
					that = $(this);

					window.location.href = that.data("url");
				});

				$(".datepicker").datepicker({
					format : "yyyy-mm-dd",
					todayHighlight: true
				});
			});
		</script>
		<?php if(isset($script) && $script): ?>
			<?php echo $script ?>
		<?php endif; ?>
	</body>
</html>