<div class="page-header-top">
	<div class="container">
		<div class="page-logo">
			<a href="javascript:;">
				<img class="logo-default" src="<?php echo base_url("assets/images/admin/admin.jpg") ?>" alt="POS">
			</a>
		</div>
		<a class="menu-toggler" href="javascript:;"></a>
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown dropdown-user dropdown-dark">
					<a class="dropdown-toggle" href="javascript:;" data-toggle="dropdown"  data-close-others="true">
						<img class="img-circle" alt="<?php echo $user["fullname"] ?>" src="<?php echo base_url("assets/images/admin/avatar.png")  ?>">
						<span class="username username-hide-mobile"><?php echo $user["fullname"] ?></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<!-- <li>
							<a href="<?php echo site_url("admin/account/"); ?>">
								<i class="fa fa-user"></i>
								My Profile
							</a>
						</li> -->
						<li>
							<a href="<?php echo site_url("admin/account/logout"); ?>">
								<i class="fa fa-lock"></i>
								Log Out
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>