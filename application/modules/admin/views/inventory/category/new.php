<div class="row">
	<div class="col-md-12">
		<form method="post" action="<?php echo site_url("admin/inventory/category/insert") ?>" class="form-horizontal form-row-seperated new-category-form">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="tools">
						<button class="btn btn-primary btn-save" type="button">
							<i class="fa fa-check"></i> Save
						</button>
						<button class="btn btn-danger btn-action" type="button" data-url="<?php echo site_url("admin/inventory/category") ?>">
							<i class="fa fa-remove"></i> Cancel
						</button>
					</div>
				</div>
				<div class="portlet-body">
					<div class="form-group">
						<label class="col-md-2 control-label">Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Description</label>
						<div class="col-md-6">
							<textarea class="form-control" name="description"></textarea>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>