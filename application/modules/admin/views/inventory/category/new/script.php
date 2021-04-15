<script type="text/javascript">
	(function($){
		var form = {
			container : $(".new-category-form")
		};

		form.container.validate({
			rules : {
				name : "required",
			}
		});

		$(".btn-save").on("click",function(){
			if(form.container.valid()){
				$.post(form.container.attr("action"),form.container.serialize()).done(function(response){
					if(response.status){
						window.location = "<?php echo site_url("admin/inventory/category"); ?>";
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