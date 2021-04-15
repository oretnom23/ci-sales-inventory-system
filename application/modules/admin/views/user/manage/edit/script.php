<script type="text/javascript">
	(function($){
		var form = {
			container : $(".edit-user-form")
		};

		form.container.validate({
			rules : {
				fullname : "required",
				email : {
					required : true,
					email : true,
				},
				role_id : "required",
			}
		});

		$(".btn-save").on("click",function(){
			$.post(form.container.attr("action"),form.container.serialize()).done(function(response){
				if(response.status){
					window.location = window.location;
				}else{
					toastr["error"](response.message);
				}
			});
		});
	}(jQuery));
</script>