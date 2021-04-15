<script type="text/javascript">
	(function($){
		var form = {
			login : {
				container : $(".login-form"),
			},
			register : {
				container : $(".register-form")
			}
		};

		form.register.container.validate({
			rules : {
				fullname : "required",
				email : {
					required : true,
					email : true,
				},
				phone : "required",
				username : "required",
				password : "required",
				confirm : {
					equalTo : ".register-form [name='password']"
				}
			},
			submitHandler : function(form){
				$.post($(form).attr("action"),$(form).serialize()).done(function(response){
					if(response.status){
						if(response.url){
							window.location.href = response.url;
						}else{
							window.location.href = "<?php echo site_url("customer/account") ?>";
						}
					}else{
						toastr["error"](response.message);
					}
				});
			}
		});

		form.login.container.validate({
			rules : {
				username : "required",
				password : "required",
			},
			submitHandler : function(form){
				$.post($(form).attr("action"),$(form).serialize()).done(function(response){
					if(response.status){
						if(response.url){
							window.location.href = response.url;
						}else{
							window.location.href = "<?php echo site_url("customer/account") ?>";
						}
					}else{
						toastr["error"](response.message);
					}
				});
			}
		});
	}(jQuery));
</script>