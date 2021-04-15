<script type="text/javascript">
	(function($){
		var table = {
            wrapper : $(".table-container"),
            container : $(".category-table"),
        };
        var modal = {
            container : $("#view-product-modal")
        };

         table.container.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                    "zeroRecords": "No matching records found"
            },
            "bStateSave": true,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": " _MENU_ records",
                "paging": {
                    "previous": "Prev",
                    "next": "Next"
                }
            },
            "columnDefs": [{ // set default column settings
                "orderable": false,
                "targets": "no-sort"
            }],
            "order": [
                [0, "asc"]
            ]
        });
        table.wrapper.find(".dataTables_length select").select2();

        $(".btn-view-product").on("click",function(){
            var that = $(this);
            var id = that.data("id");

            $.post("<?php echo site_url("admin/inventory/category/product") ?>",{id:id}).done(function(response){
                if(response.status){
                    modal.container.find(".modal-content .modal-body").html(response.data);
                    modal.container.modal("show");
                }
            });
        });
	}(jQuery));
</script>