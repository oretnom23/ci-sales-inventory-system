<script type="text/javascript">
	(function($){
		var form = {
			checkout : $(".checkout-form")
		};

		form.checkout.validate({
			rules : {
				pick_up_date : "required",
				payment_method : "required",
			}
		});

		$(".btn-confirm").on("click",function(){
			if(form.checkout.valid()){
				$.post("<?php echo site_url("customer/cart/process") ?>",form.checkout.serialize()).done(function(response){
					if(response.status){
						window.location = "<?php echo site_url("customer/cart") ?>";
						window.open(response.url, "_blank","toolbar=0,location=0,menubar=0,scrollbar=1,width=640");
					}else{
						toastr["error"](response.message);
					}
				});
			}
		});
	}(jQuery));
</script>