<script type="text/javascript" src="<?php echo base_url("assets/plugins/plupload/js/plupload.full.min.js") ?>"></script>
<script type="text/javascript">
	(function($){
		var uploader = new plupload.Uploader({
            runtimes : "html5,flash,silverlight,html4",
            browse_button : document.getElementById("btn-browse"),
            container: document.getElementById("upload-image-container"),
            file_data_name : "file",
            url : "<?php echo site_url("admin/setting/slider/upload_image"); ?>",
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
                		var html = "<div class='col-md-3 col-xs-6' data-id='" + response.data.id + "'>"
                						+ "<div class='thumbnail'>"
                							+ "<img src='<?php echo base_url("assets/images/slider") ?>/" + response.data.file_name + "' class='img-responsive'>"
                							+ "<div class='caption'>"
                								+ "<!-- <button class='btn btn-primary btn-view' data-id='" + response.data.id + "'>"
                									+ "<i class='fa fa-search'></i> View"
                								+ "</button> -->"
                								+ "<button class='btn btn-danger btn-delete' data-id='" + response.data.id + "'>"
                									+ "<i class='fa fa-remove'></i> Delete"
                								+ "</button>"
                							+ "</div>"
                						+ "</div>"
                					+ "</div>";
                		$(".slider-image-container").append(html);
                	}else{
                		$("#uploaded_file_" + file.id + " > .status").removeClass("label-info").addClass("label-danger").html("<i class='fa fa-warning'></i> Failed");
                		toastr["error"](response.message);
                	}
                },
         
                Error:function(up,error){toastr["error"](error.message);}
            }
        });
        uploader.init();

        $(".slider-image-container").on("click",".btn-delete",function(){
            that = $(this);

            bootbox.confirm("Are you sure?",function(result){
                 if(result){
                    window.location.href = "<?php echo base_url("admin/setting/slider/delete") ?>/" + that.data("id");
                 }
             });
        });
	}(jQuery));
</script>