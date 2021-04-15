<div class="page-header-menu">
	<div class="container">
		<div class="hor-menu">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo site_url("admin") ?>"><?php echo strtoupper($access["name"]) ?> DASHBOARD</a></li>
				<?php if($access["access"] == "all"): ?>
					<?php foreach($menu as $key => $value): ?>
						<li class="menu-dropdown classic-menu-dropdown">
							<a class="dropdown-toggle hover-initialized" href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown">
								<?php echo str_replace("_"," ",strtoupper($key)); ?>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu">
								<?php foreach($value as $k => $v): ?>
									<li><a href="<?php echo site_url($v["url"]) ?>"><?php echo $v["label"] ?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
				<?php else: ?>
					<?php $uac = unserialize($access["access"]); ?>
					<?php foreach($menu as $key => $value): ?>
						<?php if(isset($uac[$key])): ?>
							<li class="menu-dropdown classic-menu-dropdown">
								<a class="dropdown-toggle hover-initialized" href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown">
									<?php echo str_replace("_"," ",strtoupper($key)); ?>
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<?php foreach($value as $k => $v): ?>
										<?php if(isset($uac[$key][$k])): ?>
											<li><a href="<?php echo site_url($v["url"]) ?>"><?php echo $v["label"] ?></a></li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				<!--<li class="menu-dropdown classic-menu-dropdown">
					<a class="dropdown-toggle hover-initialized" href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown">
						Inventory
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url("admin/inventory/product") ?>">Product</a></li>
						<li><a href="<?php echo site_url("admin/inventory/category") ?>">Category</a></li>
						<li><a href="<?php echo site_url("admin/inventory/sales") ?>">Sales Order</a></li>
					</ul>
				</li>
				<li class="menu-dropdown classic-menu-dropdown">
					<a class="dropdown-toggle hover-initialized" href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown">
						POS
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url("admin/pos/teller") ?>">Teller</a></li>
						<li><a href="<?php echo site_url("admin/pos/reservation") ?>">Reservation</a></li>
					</ul>
				</li>
				<li class="menu-dropdown classic-menu-dropdown">
					<a class="dropdown-toggle hover-initialized" href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown">
						Report
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url("admin/report/sales") ?>">Sales</a></li>
						<li><a href="<?php echo site_url("admin/report/reservation") ?>">Reservation</a></li>
					</ul>
				</li>
				<li class="menu-dropdown classic-menu-dropdown">
					<a class="dropdown-toggle hover-initialized" href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown">
						User Management
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url("admin/user/manage") ?>">User</a></li>
						<li><a href="<?php echo site_url("admin/user/role") ?>">Roles</a></li>
					</ul>
				</li>
				<li class="menu-dropdown classic-menu-dropdown">
					<a class="dropdown-toggle hover-initialized" href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown">
						Settings
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url("admin/setting/slider") ?>">Slider</a></li>
					</ul>
				</li>-->
			</ul>
		</div>
	</div>
</div>