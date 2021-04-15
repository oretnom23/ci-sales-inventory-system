<script type="text/javascript">
	(function($){
		var form = {
			container : $(".inventory-report-form"),
		};

		var generate = {
			container : $(".table-wrapper"),
			report : function(){
				$.post(form.container.attr("action"),form.container.serialize()).done(function(response){
					if(response.status){
						generate.container.html(response.data);
					}else{

					}
				});
			},
			print : function(){
				var data = form.container.serialize();
				window.open("<?php echo site_url("admin/report/inventory/generate_print"); ?>" + "?" + data, "_blank","toolbar=0,location=0,menubar=0,scrollbars=1,width=780");
			}
		};

		generate.report();

		$(".btn-generate").on("click",function(){
			generate.report();
		});

		$(".btn-print").on("click",function(){
			generate.print();
		});
	}(jQuery));
</script>