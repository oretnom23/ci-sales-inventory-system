<script type="text/javascript">
	(function($){
		var form = {
			container : $(".edit-supplier-form")
		};

		form.container.validate({
			rules : {
				name : "required",
				email : {
					email : true,
					required : true,
				},
				phone : "required",
			}
		});

		$(".btn-save").on("click",function(){
			if(form.container.valid()){
				$.post(form.container.attr("action"),form.container.serialize()).done(function(response){
					if(response.status){
						window.location = window.location;
					}else{
						toastr["error"](response.message);
					}
				});
			}else{
				toastr["error"]("Some fields are required.");
			}
		});
	}(jQuery));
</script>