<script type="text/javascript">
	(function($){
		var form = {
			container : $(".edit-role-form"),
			wrapper : $(".form-container")
		};

		form.container.validate({
			rules : {
				name : "required",
				access : "required",
			},
			submitHandler : function(form){

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

		form.container.on("change","[name='access']",function(){
			var that = $(this);

			if(that.val() == "all"){
				form.container.find(".custom-access").hide();
			}else{
				form.container.find(".custom-access").show();
			}
		});
	}(jQuery));
</script>