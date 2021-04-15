var Global = {} || Global;

Global = {
    table:null,
    msg:function(type,text,title){
        toastr.options = {
          closeButton: true,
          debug: false,
          positionClass: "toast-bottom-right",
          onclick: null,
          showDuration: "1000",
          hideDuration: "1000",
          timeOut: "5000",
          extendedTimeOut: "1000",
          showEasing: "swing",
          hideEasing: "linear",
          showMethod: "fadeIn",
          hideMethod: "fadeOut"
        }

        toastr[type](text,title)
    },
    change_pass:function(){
     var form = "<form role=\"form\" id=\"form_change_pass\" method=\"post\" novalidate=\"novalidate\">"+
                  "<div class=\"form-body\">"+
                    "<div class=\"row\">"+
                    "<div class=\"col-md-12 col-xs-12 col-xm-12\">"+
                    "<div class=\"form-group form-md-line-input\">"+    
                      "<input type=\"password\" id=\"old_password\" name=\"old_password\" class=\"form-control\" placeholder=\"This field is required.\" />"+
                      "<label for=\"old_password\">Old Password</label>"+
                      "<span class=\"help-block\">Enter old password here.</span>"+ 
                    "</div>"+
                    "</div>"+
                    "</div>"+
                    "<div class=\"row\">"+
                    "<div class=\"col-md-12 col-xs-12 col-xm-12\">"+
                    "<div class=\"form-group form-md-line-input\">"+    
                      "<input type=\"password\" id=\"new_password\" name=\"new_password\" class=\"form-control\" placeholder=\"This field is required.\" />"+
                      "<label for=\"new_password\">New Password</label>"+
                      "<span class=\"help-block\">Enter new password here.</span>"+ 
                    "</div>"+
                    "</div>"+
                    "</div>"+
                    "<div class=\"row\">"+
                    "<div class=\"col-md-12 col-xs-12 col-xm-12\">"+
                    "<div class=\"form-group form-md-line-input\">"+    
                      "<input type=\"password\" id=\"repeat_password\" name=\"repeat_password\" class=\"form-control\" placeholder=\"This field is required.\" />"+
                      "<label for=\"repeat_password\">Repeat New Password</label>"+
                      "<span class=\"help-block\">Enter new password here.</span>"+ 
                    "</div>"+
                    "</div>"+
                    "</div>"+
                    "<div class=\"form-actions noborder\">"+
                      "<button class=\"btn green-haze pull-right btn-save\" type=\"submit\">Save</button>"+
                    "</div>"+
                  "</div>"+
                "</form><div style=\"clear:both;\"></div>";

     bootbox.dialog({
      title:"Change Password for Current User",
      message:form
     });


    var form_obj = $('#form_change_pass');
    var error = [];

    form_obj.on('submit',function(e){
      e.preventDefault();


      $.each($(this).find('input[type=password]'),function(c){
        if(!$(this).val()){
          error.push(c);
        }else{
          error.slice(c);
        }
      });


      console.log(error);

      return false;
    });

    },
    // admin_prev:function(save,array_fields){


    //   var path = window.location.pathname;
    //   var url = window.location.protocol+'//'+window.location.hostname+'/'+path.split('/')[1]+'/';
    //   $.ajax({
    //       url:url+'check_account',
    //       type:"POST",
    //       data:{
    //         fields:array_fields.join(',')
    //       },
    //       success:function(res){
    //           if(res.restrict){
    //               var msg = '<form id="form_prev"><div class="form-group form-md-line-input has-info">'+
    //                         '<div class="input-group">'+
    //                               '<span class="input-group-addon">'+
    //                               '<i class="fa fa-user"></i>'+
    //                               '</span>'+
    //                               '<input class="form-control" placeholder="Admin username" type="text" name="username">'+
    //                               '<label for="form_control_1">Username</label>'+
    //                           '</div>'+
    //                       '</div>'+
    //                       '<div class="form-group form-md-line-input has-info">'+
    //                         '<div class="input-group">'+
    //                               '<span class="input-group-addon">'+
    //                               '<i class="fa fa-key"></i>'+
    //                               '</span>'+
    //                               '<input class="form-control" placeholder="Admin password" type="password" name="password">'+
    //                               '<label for="form_control_2">Password</label>'+
    //                           '</div>'+
    //                       '</div></form>';
    //               bootbox.dialog({
    //                   message: msg,
    //                   title: "Administrator privileges.",
    //                   buttons: {
    //                     success: {
    //                           label: "Proceed",
    //                           className: "green",
    //                           callback: function() {
    //                             $.ajax({
    //                               url:url+'check_account/check_password',
    //                               type:'POST',
    //                               data:$('#form_prev').serialize(),
    //                               success:function(res){
    //                                   if(res.status){
    //                                        save();
    //                                   }else{
    //                                       Global.msg('error',"Invalid username/password. <br />Data not save.");
    //                                   }
    //                               }
    //                             });
    //                           }
    //                       }
    //                   }
    //               });                          
    //           }else{
    //               save();
    //           }
    //       }
    //   });
    // },
    get_otable:function(e){
      this.table = e;
    },
    delete_data:function(e,module){
              var table = this.table;
              bootbox.confirm("Are you sure to delete selected data?", function(result) {
                  if(result){
                    var elem = $(e);
                    var row = elem.parents('tr')[0];
                    var id = elem.attr('row_id');
                    
                    var save = function(){
                      $.ajax({
                        url:module+"/remove/"+id,
                        type:"POST",
                        beforeSend:function(){
                            Metronic.blockUI({
                                boxed: true,
                                message:"deleting..."
                            }); 
                        },
                        success:function(res){
                            if(res.status){
                                Metronic.unblockUI();

                                if(table.length == 1){
                                  table.fnDeleteRow(row);
                                }
                                Global.msg('success',res.msg);
                            }else{
                                Global.msg('error',"An error occured.<br /> Please check the internet connection.");
                            }
                           
                        }
                      });
                    }

                    //Global.admin_prev(save);
                    save();

                  }
              }); 
            }
}