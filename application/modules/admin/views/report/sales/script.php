<script type="text/javascript">
	(function($){
		var report = {
			form : {
				container : $(".sales-report-form")
			},
			table : {
				wrapper : $(".table-wrapper")
			},
			generate : function(){
				$.post("<?php echo base_url("admin/report/sales/generate") ?>",report.form.container.serialize()).done(function(response){
					if(response.status){
						report.table.wrapper.html(response.data);
					}else{
						toastr["error"]("No report generated.");
					}
				});
			},
			print : function(){
				var data = report.form.container.serialize();
				window.open("<?php echo site_url("admin/report/sales/generate/1"); ?>" + "?" + data, "_blank","toolbar=0,location=0,menubar=0,scrollbars=1,width=780");
			}
		};

		report.generate();

		$(".btn-generate").on("click",function(){
			report.generate();
		});

		$(".btn-print").on("click",function(){
			report.print();
		});
	}(jQuery));
</script>