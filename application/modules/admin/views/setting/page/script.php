<script type="text/javascript">
	(function($){
		var table = {
			container : $(".page-table"),
			wrapper : $(".table-container"),
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
                },
                "search" : "",
                "searchPlaceholder" : "Search Product"
            },
            "columnDefs": [{
                "orderable": false,
                "targets": "no-sort"
            }],
            "order": [
                [0, "asc"]
            ]
        });
		table.wrapper.find(".dataTables_length select").select2();
	}(jQuery));
</script>