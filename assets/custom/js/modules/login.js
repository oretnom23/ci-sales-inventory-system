var Login = function() {

    var handleLogin = function() {

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },

            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function(event, validator) {
                Global.msg('info',"Username and Password are required.");
            },
            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                Metronic.blockUI({
                    boxed: true,
                    message: "Verifying..."
                });

                $.ajax({
                    url:"login/authenticate",
                    type:"POST",
                    data: $('.login-form').serialize(),
                    success:function(res){
                        if(res.status){
                            Metronic.unblockUI();
                            Global.msg('success',res.msg);
                            window.location.reload(true);
                        }else{
                            Global.msg('error',res.msg);
                            Metronic.unblockUI();    
                        }
                    }
                })

                return false;
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    }

    return {
        init: function() {
            handleLogin();
        }

    };

}();