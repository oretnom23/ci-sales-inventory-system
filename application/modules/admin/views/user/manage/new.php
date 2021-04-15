<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal form-row-seperated new-user-form" method="post" action="<?php echo site_url("admin/user/manage/insert") ?>">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption"></div>
					<div class="tools">
						<button class="btn btn-primary btn-save" type="button">
							<i class="fa fa-check"></i>
							Save
						</button>
						<button class="btn btn-danger btn-action" type="button" data-url="<?php echo site_url("admin/user/manage") ?>">
							<i class="fa fa-remove"></i>
							Cancel
						</button>
					</div>
				</div>
				<div class="portlet-body">
					<div class="form-body">
						<fieldset>
							<legend>Info</legend>
							<div class="form-group">
								<label class="col-md-2 control-label">Fullname</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="fullname">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Email</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="email">
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
											<option value="<?php echo $_role["id"] ?>"><?php echo $_role["name"]; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Username</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="username">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Confirm</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="confirm">
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>