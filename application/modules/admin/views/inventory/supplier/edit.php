<div class="row">
	<div class="col-md-12">
		<form method="post" action="<?php echo site_url("admin/inventory/supplier/update") ?>" class="form-horizontal form-row-seperated edit-supplier-form">
			<input type="hidden" name="id" value="<?php echo $supplier["id"] ?>">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="tools">
						<button class="btn btn-primary btn-save" type="button">
							<i class="fa fa-check"></i>
							Save
						</button>
						<button class="btn btn-danger btn-action" type="button" data-url="<?php echo site_url("admin/inventory/supplier/delete/".$supplier["id"]) ?>" data-confirm="true">
							<i class="fa fa-remove"></i>
							Delete
						</button>
						<button class="btn btn-warning btn-action" type="button" data-url="<?php echo site_url("admin/inventory/supplier") ?>">
							<i class="fa fa-mail-reply"></i>
							Back
						</button>
					</div>
				</div>
				<div class="portlet-body">
					<div class="form-group">
						<label class="col-md-2 control-label">Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="<?php echo $supplier["name"] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="email" value="<?php echo $supplier["email"] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Phone Number</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="phone" value="<?php echo $supplier["phone"] ?>">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>