<!DOCTYPE html>
<html>
	<head>
		<?php echo $head;  ?>
	</head>
	<body class="page-header-menu-fixed">
		<div class="page-header">
			<?php echo $header ?>
			<?php echo $menu ?>
			
		</div>

		<div class="page-container">
			<div class="page-head">
				<div class="container">
					<div class="page-title"><h1><?php echo $title ?></h1></div>
				</div>
			</div>
			<div class="page-content">
				<div class="container">
					<?php echo $notification; ?>
					<?php echo $content; ?>
				</div>
			</div>
		</div>


		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-ui/jquery-ui.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery.blockui.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery.cokie.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/uniform/jquery.uniform.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/select2/select2.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/datatables/media/js/jquery.dataTables.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-validation/js/jquery.validate.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-validation/js/additional-methods.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootbox/bootbox.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap-toastr/toastr.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/metronic.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/layout.js") ?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				Metronic.init(); 
				Layout.init();

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
					}

				$(".page-container").on("click",".btn-action",function(){
					var url = $(this).data("url");
					if($(this).data("confirm")){
						bootbox.confirm("Are you sure?",function(result){
							if(result){window.location.href = url;}
						});
					}else{
						window.location.href = url;
					}
				})

				$(".datepicker").datepicker({
					format : "yyyy-mm-dd",
					todayHighlight: true
				});
			})
		</script>
		<?php if(isset($script) && $script): ?>	
			<?php echo $script; ?>
		<?php endif; ?>
	
	<?php echo $footer; ?>
	</body>
</html>