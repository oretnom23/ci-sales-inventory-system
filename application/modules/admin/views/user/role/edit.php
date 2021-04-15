<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
					<button class="btn btn-primary btn-save">
						<i class="fa fa-check"></i> Save
					</button>
					<button class="btn btn-danger btn-action" data-url="<?php echo site_url("admin/user/role/delete/".$role["id"]) ?>" data-confirm="true">
						<i class="fa fa-remove"></i> Delete
					</button>
					<button class="btn btn-warning btn-action" data-url="<?php echo site_url("admin/user/role"); ?>">
						<i class="fa fa-mail-reply"></i> Back
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="form-container">
					<form method="post" action="<?php echo site_url("admin/user/role/update") ?>" class="form-horizontal form-row-seperated edit-role-form">
						<input type="hidden" name="id" value="<?php echo $role["id"] ?>">
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-2 control-label">Name</label>
								<div class="col-md-6">
									<input class="form-control" name="name" type="text" value="<?php echo $role["name"] ?>">
								</div>
								<div class="clear"></div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Access</label>
								<div class="col-md-6">
									<select class="form-control" name="access">
										<option value=""></option>
										<option value="all" <?php echo $role["access"] == "all" ? "selected" : "" ?>>All</option>
										<option value="custom" <?php echo $role["access"] == "all" ? "" : "selected" ?>>Custom</option>
									</select>
								</div>
								<div class="clear"></div>
							</div>
							<div class="form-group custom-access" style="<?php echo $role["access"] == "all" ? "display:none" : "display:block" ?>">
								<label class="col-md-2 control-label">User Access Control</label>
								<div class="col-md-12">
									<?php $access = $role["access"] == "all" ? $role["access"] : unserialize($role["access"]); ?>
									<?php foreach($uac as $key => $value): ?>
										<label class="col-md-10 col-md-offset-2"><?php echo str_replace("_"," ",strtoupper($key)) ?></label>
										<?php foreach($value as $k => $v): ?>
											<div class="col-md-10 col-md-offset-2">
												<input type="checkbox" name="uac[<?php echo $key ?>][<?php echo $k ?>]" value="1"
													<?php echo $access != "all" && isset($access[$key][$k]) ? "checked='checked'" : "" ?>
												>
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