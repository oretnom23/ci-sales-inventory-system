<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
					<button class="btn btn-primary btn-save">
						<i class="fa fa-plus"></i>
						Save
					</button>
					<button class="btn btn-danger btn-action" data-url="<?php echo site_url("admin/user/role") ?>">
						<i class="fa fa-remove"></i>
						Cancel
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="form-container">
					<form method="post" action="<?php echo site_url("admin/user/role/insert"); ?>" class="form-horizontal form-row-seperated new-role-form">
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-2 control-label">Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name">
								</div>
								<div class="clear"></div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Access</label>
								<div class="col-md-6">
									<select class="form-control" name="access">
										<option value=""></option>
										<option value="all">All</option>
										<option value="custom">Custom</option>
									</select>
								</div>
								<div class="clear"></div>
							</div>
							<div class="form-group custom-access" style="display:none">
								<label class="col-md-2 control-label">User Access Control</label>
								<div class="col-md-12">
									<?php foreach($uac as $key => $value): ?>
										<label class="col-md-10 col-md-offset-2"><?php echo str_replace("_"," ",strtoupper($key)) ?></label>
										<?php foreach($value as $k => $v): ?>
											<div class="col-md-10 col-md-offset-2">
												<input type="checkbox" name="uac[<?php echo $key ?>][<?php echo $k ?>]" value="1">
												<span><?php echo $v["label"] ?></span>
											</div>
										<?php endforeach; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>