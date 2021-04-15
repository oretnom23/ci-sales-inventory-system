var Module = function(){

    var formHandler = function(){

        $('.select2_category').select2({
            allowClear: true
        });

        $('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            autoclose: true
        });

      

        var form_add = $('#form_add');
        var form_update = $('#form_update');

        var form_obj,process_url,type;

        if(form_add.length == 0){
            form_obj = form_update;
            process_url = form_update.attr('update_link');
            type = "update";
        }else{
            form_obj = form_add;
            process_url = "save";
            type = "add";
        }

        
        var formvalidation = form_obj.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: false,
            ignore: "",
            rules: {
                username:{required:true},
                password:{required:true}
            },
            invalidHandler:function(event,validator){              
                Metronic.scrollTo($('.form-control'), -200);
            },
            highlight:function(element){
                $(element).closest('.form-group').addClass('has-error');
                $(element).closest('.form-group').find('.form-control').addClass('edited');
                $(element).closest('.form-group').find('.help-block').hide();
               
            },
            unhighlight:function(element){
                $(element).closest('.form-group').removeClass('has-error'); 
            },
            success:function(label){
                label.closest('.form-group').removeClass('has-error');
            },
            submitHandler:function(form){
                var button = $(form).find('.btn-save');

                $.ajax({
                    url: process_url,
                    type: "POST",
                    data: $(form).serialize(),
                    beforeSend:function(){
                        button.text('Saving...');
                        button.prop('disabled',true);
                    }
                }).done(function(response){

                    if(response.status){
                        button.text('Save');
                        button.prop('disabled',false);
                        Metronic.scrollTo($('.form-control'),-200);

                        if(type == "add"){
                            $(form).find("input[type=text], textarea,input[type=password]").val("");
                            formvalidation.resetForm();
                        }

                        Global.msg('success',response.msg);
                    }else{
                        button.text('Save');
                        button.prop('disabled',false);
                        Global.msg('error',"An error occured.<br /> Please check the internet connection.");
                    }
                    
                });

                return false;
            }
        });

    }

    return{
        init:function(){
            formHandler();
        }
    }
}();