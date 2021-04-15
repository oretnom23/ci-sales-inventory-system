<div class="login-page row">
	<div class="col-md-12 col-sm-12">
		<div class="content-form-page">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<h1>Login</h1>
					<form class="form-horizontal form-without-legend login-form" method="post" action="<?php echo site_url("customer/login/authenticate") ?>">
						<?php if(isset($url) && $url): ?>
							<input type="hidden" name="url" value="<?php echo $url ?>">
						<?php endif; ?>
						<div class="form-group">
							<label class="control-label col-md-4">Username <span class="require">*</span></label>
							<div class="col-md-8">
								<input type="text" name="username" class="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Password <span class="require">*</span></label>
							<div class="col-md-8">
								<input type="password" name="password" class="">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
								<input type="submit" class="btn-primary" value="Login">
							</div>
						</div>
					</form>
				</div>

				<div class="col-md-6 col-sm-6">
					<h1>Create an Account</h1>
					<form class="form-horizontal form-without-legend register-form" method="post" action="<?php echo site_url("customer/login/register") ?>">
						<?php if(isset($url) && $url): ?>
							<input type="hidden" name="url" value="<?php echo $url ?>">
						<?php endif; ?>
						<div class="form-group">
							<label class="control-label col-md-4">Fullname <span class="require">*</span></label>
							<div class="col-md-8">
								<input type="text" name="fullname" class="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Email <span class="require">*</span></label>
							<div class="col-md-8">
								<input type="text" name="email" class="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Phone Number <span class="require">*</span></label>
							<div class="col-md-8">
								<input type="text" name="phone" class="">
							</div>
						</div>
						<fieldset>
							<legend>Account Information</legend>
							<div class="form-group">
								<label class="control-label col-md-4">Username <span class="require">*</span></label>
								<div class="col-md-8">
									<input type="text" name="username" class="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Password <span class="require">*</span></label>
								<div class="col-md-8">
									<input type="password" name="password" class="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Confirm Password <span class="require">*</span></label>
								<div class="col-md-8">
									<input type="password" name="confirm" class="">
								</div>
							</div>
						</fieldset>
						<div class="row">
							<div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
								<input type="submit" class="btn-primary" value="Register">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>