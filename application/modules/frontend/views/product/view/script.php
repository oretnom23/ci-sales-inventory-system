<script type="text/javascript" src="<?php echo base_url("assets/plugins/flexslider/jquery.flexslider.js") ?>"></script>
<script type="text/javascript">
	(function($){
		$(".flexslider").flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});

		$(".product-form").submit(function(){
			

			$.post($(this).attr("action"),$(this).serialize()).done(function(response){
				if(response.status){
					toastr["success"](response.message);
				}else{
					toastr["error"](response.message);
				}
			});

			return false;
		});
	}(jQuery));
</script>