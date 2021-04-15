<script type="text/javascript" src="<?php echo base_url("assets/plugins/plupload/js/plupload.full.min.js") ?>"></script>
<script type="text/javascript">
	(function($){
		var form = {
			container : $(".new-product-form")
		};

		form.container.validate({
			rules : {
				name : "required",
				description : "required",
				sku : "required",
				price : {
					required : true,
					number : true,
					min : 10,
				},
                srp_price : {
                    required : true,
                    number : true,
                    min : 10,
                },
				qty : {
					required : true,
					number : true
				}
			}
		});

		$(".btn-save").on("click",function(){
			if(form.container.valid()){
				$.post(form.container.attr("action"),form.container.serialize()).done(function(response){
					if(response.status){
						window.location.href = "<?php echo site_url("admin/inventory/product") ?>";
					}else{
						toastr["error"](response.message);
					}
				})
			}
		});

		var uploader = new plupload.Uploader({
            runtimes : "html5,flash,silverlight,html4",
            browse_button : document.getElementById("btn-browse"),
            container: document.getElementById("upload-image-container"),
            file_data_name : "file",
            url : "<?php echo site_url("admin/inventory/product/image_upload"); ?>",
            filters : {
                max_file_size : "10mb",
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                ]
            },
            flash_swf_url : "<?php echo base_url("assets/plugins/plupload/js/Moxie.swf") ?>",
            silverlight_xap_url : "<?php echo base_url("assets/plugins/plupload/js/Moxie.xap") ?>" , 
            init:{
                PostInit:function(){
                    $(".upload-image-list").html("");
                    $(".btn-upload").on("click",function() {
                        uploader.start();
                        return false;
                    });

                    $(".upload-image-list").on("click",".added-files .remove", function(){
                        uploader.removeFile($(this).parent(".added-files").attr("id"));    
                        $(this).parent(".added-files").remove();                     
                    });
                },
         
                FilesAdded: function(up, files) {
                    plupload.each(files, function(file) {
                        $(".upload-image-list").append('<div class="alert alert-warning added-files" id="uploaded_file_' + file.id + '">' + file.name + '(' + plupload.formatSize(file.size) + ') <span class="status label label-info"></span>&nbsp;<a href="javascript:;" style="margin-top:-5px" class="remove pull-right btn btn-sm red"><i class="fa fa-times"></i> remove</a></div>');
                    });
                },
         
                UploadProgress: function(up, file) {
                    $("#uploaded_file_" + file.id + " > .status").html(file.percent + "%");
                },
                FileUploaded: function(up,file,response){
                	response = JSON.parse(response.response);
                	if(response.status){
                		$("#uploaded_file_" + file.id + " > .status").removeClass("label-info").addClass("label-success").html("<i class='fa fa-check'></i> Done");

                		content = "<tr>";
                			content += "<td>";
                				content += "<img class='img-responsive' src='<?php echo base_url("assets/images/product") ?>/" + response.data.file_name +"'>";
                				content += "<input type='hidden' name='image[]' value='" + response.data.file_name + "'>"
                			content += "</td>";
                			content += "<td></td>";
                			content += "<td><button type='button' class='btn btn-danger btn-delete-image'><i class='fa fa-remove'></i> Remove</button></td>";
                		content += "</tr>";

                		$(".table-image tbody").append(content);
                	}else{
                		$("#uploaded_file_" + file.id + " > .status").removeClass("label-info").addClass("label-danger").html("<i class='fa fa-warning'></i> Failed");
                		toastr["error"](response.message);
                	}
                },
         
                Error:function(up,error){toastr["error"](error.message);}
            }
        });
        uploader.init();

        $(".table-image tbody").on("click",".btn-delete-image",function(){
        	$(this).parents("tr").remove();
        });
	}(jQuery));
</script>