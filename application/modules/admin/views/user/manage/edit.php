<div class="row">
	<divc class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
					<button class="btn btn-primary btn-save">
						<i class="fa fa-plus"></i> Save
					</button>
					<button class="btn btn-danger btn-action" data-url="<?php echo site_url("admin/user/manage/delete/".$user["id"]) ?>" data-confirm="true">
						<i class="fa fa-remove"></i> Delete
					</button>
					<button class="btn btn-warning btn-action" data-url="<?php echo site_url("admin/user/manage") ?>">
						<i class="fa fa-mail-reply"></i> Back
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="form-container">
					<form method="post" action="<?php echo site_url("admin/user/manage/update") ?>" class="form-horizontal form-row-seperated edit-user-form">
						<input type="hidden" name="id" value="<?php echo $user["id"] ?>">
						<div class="form-body">
						<fieldset>
							<legend>Info</legend>
							<div class="form-group">
								<label class="col-md-2 control-label">Fullname</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="fullname" value="<?php echo $user["fullname"] ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Email</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="email" value="<?php echo $user["email"] ?>">
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Account</legend>
							<div class="form-group">
								<label class="col-md-2 control-label">Role</label>
								<div class="col-md-6">
									<select class="form-control" name="role_id">
										<option value=""></option>
										<?php foreach($role as $_role): ?>
											<option value="<?php echo $_role["id"] ?>" <?php echo $_role["id"] == $user["role_id"] ? "selected" : ""  ?>>
												<?php echo $_role["name"]; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Username</label>
								<div class="col-md-6">
									<h4><?php echo $user["username"]; ?></h4>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>