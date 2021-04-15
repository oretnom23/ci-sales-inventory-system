<script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap-slider/js/bootstrap-slider.min.js") ?>"></script>
<script type="text/javascript">
	(function($){
		$(".product-form").on("submit",function(){
			that = $(this);

			$.post(that.attr("action"),that.serialize()).done(function(response){
				if(response.status){
					toastr["success"](response.message);
				}else{
					if(response.login){
						window.location ="<?php echo site_url("customer/account/login") ?>";
					}else{
						toastr["error"](response.message);
					}
					
				}
			})

			return false;
		});

		$(".range-slider").bootstrapSlider();

		$(".btn-filter").on("click",function(){
			$(".filter-product-form").submit();
		});
	}(jQuery));
</script>