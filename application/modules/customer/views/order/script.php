<script type="text/javascript">
	(function($){
		var order = {
			modal : {
				container : $("#order-data-modal")
			},
			load : function(id){
				$.get("<?php echo site_url("customer/order/load") ?>/" + id).done(function(response){
					if(response.status){
						order.modal.container.find(".modal-body").html(response.data);
						order.modal.container.modal("show");
					}else{
						toastr["error"](response.message);
					}
				});
			}
		};

		$(".btn-load").on("click",function(){
			order.load($(this).data("id"));
		});
	}(jQuery));
</script>