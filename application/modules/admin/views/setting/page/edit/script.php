<script type="text/javascript" src="<?php echo base_url("assets/plugins/summernote/summernote.min.js") ?>"></script>
<script type="text/javascript">
	(function($){
		var form = {
			container : $(".edit-page-form")
		};

		$(".wysiwyg").summernote({
			height: 300
		});

		form.container.validate({
			rules : {
				name: "required",
			}
		});

		$(".btn-save").on("click",function(){
			if(form.container.valid()){
				$.post(form.container.attr("action"),form.container.serialize()).done(function(response){
					if(response.status){
						window.location.href = window.location;
					}else{
						toastr["error"](response.message);
					}
				});
			}else{
				toastr["error"]("Some field(s) are missing.");
			}
		});
	}(jQuery));
</script>