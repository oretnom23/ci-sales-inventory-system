<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
					<button class="btn btn-primary btn-save" type="button">
						<i class="fa fa-check"></i> Save
					</button>
					<button class="btn btn-danger btn-action" type="button" data-url="<?php echo site_url("admin/setting/page/delete") . "/" . $data["id"] ?>" data-confirm="true">
						<i class="fa fa-remove"></i> Delete
					</button>
					<button class="btn btn-warning btn-action" type="button" data-url="<?php echo site_url("admin/setting/page") ?>">
						<i class="fa fa-mail-reply"></i> Back
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<form method="post" action="<?php echo site_url("admin/setting/page/update") ?>" class="form-horizontal form-row-seperated edit-page-form">
					<input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
					<div class="form-group">
						<label class="col-md-2 control-label">Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="<?php echo $data["name"] ?>">
						</div>
						<div class="clear"></div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Content</label>
						<div class="col-md-10">
							<textarea class="wysiwyg form-control" name="content"><?php echo $data["content"] ?></textarea>
						</div>
						<div class="clear"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>