<script type="text/javascript">
	(function($){
		var form = {
			container : $(".new-user-form")
		};

		form.container.validate({
			rules : {
				role_id : "required",
				username : "required",
				fullname : "required",
				email : {
					required : true,
					email : true,
				},
				password : "required",
				confirm : {
					required : true,
					equalTo : "[name='password']"
				}
			}
		});

		$(".btn-save").on("click",function(){
			if(form.container.valid()){
				$.post(form.container.attr("action"),form.container.serialize()).done(function(response){
					if(response.status){
						window.location.href = "<?php echo site_url("admin/user/manage") ?>";
					}else{
						toastr["error"](response.message);
					}
				});
			}else{
				toastr["error"]("Somefields are required.");
			}
		});
	}(jQuery));
</script>