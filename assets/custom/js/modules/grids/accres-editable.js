var TableEditable = function () {
    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }
        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input data-date-format="yyyy-mm-dd" type="text" class="form-control input-small date date-picker" value="' + aData[2] + '">';  
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[4] + '">'; 
            jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[5].replace(/[₱,]/g,'') + '">';
           
            // jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
            jqTds[3].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[4].innerHTML = '<a class="cancel" href="">Cancel</a>';

            $(".date-picker").datepicker({rtl: Metronic.isRTL(),autoclose: true });
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var pay_date = jqInputs[0].value;
            var or_num = jqInputs[1].value;
            var amm = jqInputs[2].value;

            // oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
           
            
            if(amm == '' || pay_date == '' || or_num == ''){
                return_data = {status:false,empty:true};
                // oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 3, false);
                // oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 4, false);
                oTable.fnDraw();
                if(!oTable.fnGetData(nRow)[0]){
                    oTable.fnDeleteRow(nRow);
                }
            }else{
                if($.isNumeric(amm)){
                    oTable.fnUpdate(pay_date, nRow, 2, false);
                    // oTable.fnUpdate(new Date('d m y'), nRow, 3, false); convert date to human
                    oTable.fnUpdate(or_num, nRow, 4, false);
                    oTable.fnUpdate('₱ '+Number(amm).toFixed(2), nRow, 5, false);
                    return_data = {status:true,amount:amm,id:oTable.fnGetData(nRow)[0],or_number:or_num,payment_date:pay_date};
                }else{
                    return_data = {status:false};
                }
                // oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 3, false);
                // oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 4, false);
                oTable.fnDraw();
            }
           
            
            // oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            // oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
           

            return return_data;
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            // oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 1, false);
            // oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            // oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 3, false);
            oTable.fnDraw();
        }

        var table = $('#editable');

        var oTable = table.dataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "bFilter": false,
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [2],
                    "visible": false,
                    "searchable": false
                }
            ]
            // // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // // So when dropdowns used the scrollable div should be removed. 
            // //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            // "lengthMenu": [
            //     [5, 15, 20, -1],
            //     [5, 15, 20, "All"] // change per page values here
            // ],

            // // Or you can use remote translation file
            // //"language": {
            // //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            // //},

            // // set the initial value
            // "pageLength": 10,

            // "language": {
            //     "lengthMenu": " _MENU_ records"
            // },
            // "columnDefs": [{ // set default column settings
            //     'orderable': false,
            //     'targets': [0]
            // }, {
            //     "searchable": false,
            //     "targets": [0]
            // }]
            // "order": [
            //     [0, "asc"]
            // ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        // tableWrapper.find(".dataTables_length select").select2({
        //     showSearchInput: false //hide search box with special css class
        // }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#editable_new').click(function (e) {
            e.preventDefault();

            // if (nNew && nEditing) {
            //     if (confirm("Previose row not saved. Do you want to save it ?")) {
            //         saveRow(oTable, nEditing); // save
            //         $(nEditing).find("td:second").html("Untitled");
            //         nEditing = null;
            //         nNew = false;

            //     } else {
            //         oTable.fnDeleteRow(nEditing); // cancel
            //         nEditing = null;
            //         nNew = false;
                    
            //         return;
            //     }
            // }

            // var aiNew = oTable.fnAddData(['', '', '', '', '', '']);
            // var nRow = oTable.fnGetNodes(aiNew[0]);
            // editRow(oTable, nRow);
            // nEditing = nRow;
            // nNew = true;

            // bootbox.prompt("Add Payment Amount.", function(result) {
            //     if(result){
            //         if($.isNumeric(result)){
            //             var path = window.location.pathname;
            //             var url = window.location.protocol+'//'+window.location.hostname+'/'+path.split('/')[1]+'/layaway/add_payment/'+path.split('/')[4];
            //             $.ajax({
            //                 url:url,
            //                 method:'POST',
            //                 data:{amount:result},
            //                 success:function(res){
            //                     if(res.status){
            //                         window.location.reload(true);
            //                     }
            //                 }
            //             });
            //         }else{
            //              Global.msg('error',"Only Numeric is allowed.");
            //         }
            //     }
            // });
        var formadd =   '<form>'+
                            '<div class="form-group form-md-line-input has-success">'+
                                '<div class="input-icon right">'+
                                    '<input type="text" data-date-format="yyyy-mm-dd" class="form-control date date-picker" placeholder="Payment date is required." name="payment_date" id="form_control_5">'+
                                    '<label for="form_control_5">Payment Date</label>'+
                                    '<i class="icon-calendar"></i>'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group form-md-line-input">'+
                                '<input type="text" placeholder="Order Number is required." id="form_control_1" class="form-control" name="order_number">'+
                                '<label for="form_control_1">Order Number</label>'+
                                '<span class="help-block">Enter Order Number here.</span>'+
                            '</div>'+
                            '<div class="form-group form-md-line-input">'+
                                '<input type="text" placeholder="Amount is required." id="form_control_2" class="form-control" name="amount">'+
                                '<label for="form_control_2">Amount</label>'+
                                '<span class="help-block">Enter amount here.</span>'+
                            '</div>'+
                        '</form><script>$(".date-picker").datepicker({rtl: Metronic.isRTL(),autoclose: true });</script>';
       
        bootbox.dialog({
                message: formadd,
                title: "New Payment",
                buttons: {
                  main: {
                    label: "Save",
                    className: "blue",
                    callback: function(e) {
                        var button = $(this).find('button.blue');
                        var obj = this;
                        var path = window.location.pathname;
                        var url = window.location.protocol+'//'+window.location.hostname+'/'+path.split('/')[1]+'/accres/add_payment/'+path.split('/')[4];
                        $.ajax({
                            url:url,
                            type:"POST",
                            data:obj.find('form').serialize(),
                            beforeSend:function(){
                                 button.text('Saving...');
                            },
                            success:function(res){
                               if(res.status){
                                    obj.modal('hide');
                                    window.location.reload(true);
                               }else{
                                    button.text('Save');
                                    Global.msg('error',res.msg);
                               }
                            }
                        });
                        return false;
                    }
                  }
                }
            });
        });
        
      
       

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
           
            // alert("Deleted! Do not forget to do some ajax to sync with backend :)");

            var path = window.location.pathname;
            var url = window.location.protocol+'//'+window.location.hostname+'/'+path.split('/')[1]+'/accres/delete_payment';
            var save = function(){

                $.ajax({
                    url:url,
                    method:'POST',
                    data:{id:oTable.fnGetData(nRow)[0],layaway_id:oTable.fnGetData(nRow)[1]},
                    success:function(res){
                        if(res.status){
                            oTable.fnDeleteRow(nRow);
                            $('#total_payment').text(res.total_amount);
                            Global.msg('success',"Data successfully deleted.");
                        }else{
                            Global.msg('error',"There is a problem with your connection, Try again.");
                        }
                    }
                }); 

            }

            Global.admin_prev(save);

        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                var data = saveRow(oTable, nEditing);
                nEditing = null;
                //alert("Updated! Do not forget to do some ajax to sync with backend :)");
                if(data.status){
                    var path = window.location.pathname;
                    var url = window.location.protocol+'//'+window.location.hostname+'/'+path.split('/')[1]+'/accres/update_payment';
                    $.ajax({
                        url:url,
                        method:'POST',
                        data:{amount:data.amount,id:data.id,order_number:data.or_number,payment_date:data.payment_date},
                        success:function(res){
                            if(res.status){
                                $('#total_payment').text(res.total);
                                 oTable.fnUpdate(res.date, nRow, 3, false);
                                Global.msg('success',"Data successfully updated.");
                            }else{
                                Global.msg('error',"There is a problem with your connection, Try again.");
                            }
                        }
                    });
                }else if(!data.status && data.empty){
                     Global.msg('error',"Field is required.");
                }else{
                     Global.msg('error',"Only Numeric is allowed.");
                }

            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();