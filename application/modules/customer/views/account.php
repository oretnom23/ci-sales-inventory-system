<h1>My Account</h1>
<div class="content-page">
	<h4>Account Details</h4>
	<div class="form-container">
		<form method="post" action="<?php echo site_url("customer/account/update") ?>" class="customer-update-form form-horizontal form-without-legend">
			<input type="hidden" name="id" value=<?php echo $customer["id"] ?>"">
			<div class="form-group">
				<label class="col-md-3 control-label">Username</label>
				<div class="col-md-7"><h5><?php echo $customer["username"]; ?></h5></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Fullname</label>
				<div class="col-md-7">
					<input type="text" name="fullname" class="form-control" value="<?php echo $customer["fullname"]; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Email</label>
				<div class="col-md-7">
					<input type="text" name="email" class="form-control" value="<?php echo $customer["email"]; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Phone Number</label>
				<div class="col-md-7">
					<input type="text" name="phone" class="form-control" value="<?php echo $customer["phone"]; ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-3">
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</div>
		</form>
	</div>

	<hr />

	<h4>Change Password</h4>
	<div class="form-container">
		<form method="post" class="password-update-form form-horizontal form-without-legend" action="<?php echo site_url("customer/account/password") ?>">
			<input type="hidden" name="id" value="<?php echo $customer["id"] ?>">
			<div class="form-group">
				<label class="col-md-3 control-label">Old Password</label>
				<div class="col-md-7">
					<input type="password" name="password[old]" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">New Password</label>
				<div class="col-md-7">
					<input type="password" name="password[new]" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Confirm Password</label>
				<div class="col-md-7">
					<input type="password" name="password[confirm]" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-3">
					<input type="submit" class="btn btn-primary" value="Change Password">
				</div>
			</div>
		</form>
	</div>
</div>