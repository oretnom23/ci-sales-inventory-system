<script type="text/javascript">
    (function($){
        var table = {
            product : {
                container : $(".product-table"),
                wrapper : $(".product-table-container")
            },
            order : {
                container : $(".order-table"),
                wrapper : $(".order-table-container")
            }
        };

        var form = {
            teller : $(".teller-form"),
            check : {
                cash : function(){
                    var type = form.teller.find("[name='payment_method']").val();
                    var cash = form.teller.find("[name='amount_paid']").val();
                    var total = form.teller.find("[name='total']").val();

                    if(type == "cash"){
                        if(parseInt(cash) < parseInt(total)){
                            return false;
                        }else{
                            return true;
                        }
                    }else{
                        return true;
                    }
                }
            }
        };

        table.product.container.dataTable({
            "dom": "<'row'<'col-md-12'f<'clear'>>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
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
            "columnDefs": [{ // set default column settings
                "orderable": false,
                "targets": "no-sort"
            }],
            "order": [
                [0, "asc"]
            ]
        });

        table.product.wrapper.find(".dataTables_filter input").removeClass("input-small");

        table.product.wrapper.on("click",".btn-cart",function(){
            var that = $(this);
            var data = {};

            data.id = that.parents("tr").find("[name='id']").val();
            data.name = that.parents("tr").find("[name='name']").val();
            data.price = that.parents("tr").find("[name='price']").val();
            data.qty = that.parents("tr").find("[name='qty']").val();
            data.sku = that.parents("tr").find("[name='sku']").val();

            if(data.qty){
                $.post("<?php echo site_url("admin/pos/teller/add") ?>",data).done(function(response){
                    if(response.status){
                        that.parents("tr").find("[name='qty']").val("1").change();
                        table.order.container.find("tbody").html(response.data);
                        table.order.container.find(".total-td").html(response.total);
                        form.teller.find("[name='total']").val(response.total_amount).change();
                        toastr["success"](response.message);
                    }else{
                        toastr["error"](response.message);
                    }
                })
            }else{
                toastr["error"]("Quantity required.");
            }
        });

        table.order.container.on("blur","input",function(){
            if($(this).val()){
                data = {};
                data[$(this).attr("name")] = $(this).val();
                $.post("<?php echo site_url("admin/pos/teller/edit") ?>",data).done(function(response){
                    if(response.status){
                        table.order.container.find("tbody").html(response.data);
                        table.order.container.find(".total-td").html(response.total);
                        form.teller.find("[name='total']").val(response.total_amount).change();
                        toastr["success"](response.message);
                    }else{
                        toastr["error"](response.message);
                    }
                });
            }else{
                toastr["error"]("Quantity required.");
            }
        });

        table.order.container.on("click",".btn-remove-product",function(){
            that = $(this);
            bootbox.confirm("Remove product from order?",function(result){
                if(result){
                    $.post("<?php echo site_url("admin/pos/teller/delete") ?>",{id:that.data("id")}).done(function(response){
                         if(response.status){
                            table.order.container.find("tbody").html(response.data);
                            table.order.container.find(".total-td").html(response.total);
                            form.teller.find("[name='total']").val(response.total_amount).change();
                            toastr["success"](response.message);
                        }else{
                            toastr["error"](response.message);
                        }
                    });
                }
            });
        });

        form.teller.validate({
            rules : {
                payment_method : "required",
                amount_paid : {
                    required : true,
                    number : true,
                }
            }
        });

        /*form.teller.on("change","[name='payment_method']",function(){
            var that = $(this);
            
            if(that.val() == "cash"){
                form.teller.find(".amount-paid-container").show();
            }else{
                form.teller.find(".amount-paid-container").hide();
            }
        });*/

        form.teller.on("keyup","[name='amount_paid']",function(){
            var that = $(this);
            var total = form.teller.find("[name='total']").length ? form.teller.find("[name='total']").val() : 0;

            if(parseInt(that.val()) >= parseInt(total)){
                var change = parseInt(that.val()) - parseInt(total);
                form.teller.find("[name='change']").val(change).change();
            }
        });

        $(".btn-save").on("click",function(){

            if(form.teller.valid()){
                if(form.check.cash()){
                    $.post("<?php echo site_url("admin/pos/teller/process") ?>",form.teller.serialize()).done(function(response){
                        if(response.status){
                            table.order.container.find("tbody").html("");
                            table.order.container.find("tfoot .total-td").html("0.00");
                            table.order.wrapper.find("[name='customer']").val("").change();
                            table.order.wrapper.find("[name='customer_id']").val("").change();
                            table.order.wrapper.find("[name='reservation_id']").val("").change();

                            window.location = "<?php echo site_url("admin/pos/teller") ?>";
                            window.open(response.url, "_blank","toolbar=0,location=0,menubar=0,scrollbar=1,width=450");
                        }else{
                            toastr["error"](response.message);
                        }
                    });
                }else{
                    toastr["error"]("Insufficient funds.");
                }
            }else{
                toastr["error"]("Cash is required.");
            }
            
        });
    }(jQuery));
</script>