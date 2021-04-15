<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
					<button class="btn btn-primary btn-save">
						<i class="fa fa-check"></i> Save
					</button>
					<button class="btn btn-danger btn-action" data-url="<?php echo site_url("admin/setting/page") ?>">
						<i class="fa fa-remove"></i> Cancel
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<form method="post" action="<?php echo site_url("admin/setting/page/insert") ?>" class="form-horizontal form-row-seperated new-page-form">
					<div class="form-group">
						<label class="col-md-2 control-label">Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name">
						</div>
						<div class="clear"></div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Content</label>
						<div class="col-md-10">
							<textarea class="wysiwyg form-control" name="content"></textarea>
						</div>
						<div class="clear"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>