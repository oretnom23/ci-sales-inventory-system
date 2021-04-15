<script type="text/javascript">
	(function($){
		var reservation = {
			modal : {
				container : $("#reservation-data-modal"),
			},
			load : function(id){
				$.get("<?php echo site_url("customer/reservation/load") ?>/"+id).done(function(response){
					if(response.status){
						reservation.modal.container.find(".modal-body").html(response.data);
						reservation.modal.container.modal("show");
					}else{
						toastr["error"](response.message);
					}
				});
			}
		};

		$(".btn-load").on("click",function(){
			reservation.load($(this).data("id"));
		});
	}(jQuery));
</script>