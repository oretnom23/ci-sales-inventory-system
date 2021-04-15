<script type="text/javascript">
	(function($){
		var form = {
			account : $(".customer-update-form"),
			password : $(".password-update-form"),
		};

		form.password.validate({
			rules : {
				"password[old]" : "required",
				"password[new]" : "required",
				"password[confirm]" : {
					required : true,
					equalTo : "input[name='password[new]']",
				}
			},submitHandler : function(form){
				$.post($(form).attr("action"),$(form).serialize()).done(function(response){
					if(response.status){
						window.location = window.location;
					}else{
						toastr["error"](response.message);
					}
				});
			}
		})

		form.account.validate({
			rules : {
				"fullname" : "required",
				"phone" : "required",
				"email" : {
					required : true,
					email : true,
				}
			},submitHandler : function(form){
				$.post($(form).attr("action"),$(form).serialize()).done(function(response){
					if(response.status){
						window.location = window.location;
					}else{
						toastr["error"](response.message);
					}
				});
			}
		})
	}(jQuery));
</script>