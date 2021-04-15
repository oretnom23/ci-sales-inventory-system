<script type="text/javascript">
	(function($){
		$(".cart-form").validate({
			rules : {
				pick_up_date : "required",
			}
		});

		$(".cart-container").on("blur","input:not(.datepicker)",function(){
			that = $(this);

			if(that.val()){
				data = {};
				data[that.attr("name")] = that.val();

				$.post("<?php echo site_url("product/update_cart") ?>",data).done(function(response){
					if(response.status){
						$(".cart-container").html(response.data);
						toastr["success"](response.message);
					}else{
						toastr["error"](response.message);
					}
				});
			}else{
				toastr["error"]("Please provide quantity");
			}
		});

		$(".cart-container").on("click",".btn-remove-product",function(){
			that = $(this);

			bootbox.confirm("Are you sure to remove product from cart?",function(result){
				if(result){
					$.post("<?php echo site_url("product/delete_from_cart") ?>",{id:that.data("id")}).done(function(response){
						if(response.status){
							$(".cart-container").html(response.data);
							toastr["success"](response.message);
						}else{
							toastr["error"](response.message);
						}
					});
				}
			});
		});

		$(".cart-container").on("click",".btn-place",function(){
			var that = $(this);
			/*if($(".cart-form").valid()){
				$.post("<?php echo site_url("customer/cart/process") ?>",$(".cart-form").serialize()).done(function(response){
					if(response.status){
						window.location = window.location;
						window.open(response.url, "_blank","toolbar=0,location=0,menubar=0");
					}else{
						toastr["error"](response.message);
					}
				});
			}*/
			window.location.href = that.data("url");
		});
	}(jQuery));
</script>