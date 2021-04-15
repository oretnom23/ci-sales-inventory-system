<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
		<a class="dashboard-stat dashboard-stat-light blue-madison" href="javascript:;">
			<div class="visual">
				<i class="fa fa-briefcase fa-icon-medium"></i>
			</div>
			<div class="details">
				<div class="number"><?php echo number_format($lifetime,2) ?></div>
				<div class="desc"> Lifetime Sales </div>
			</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light red-intense" href="javascript:;">
			<div class="visual">
				<i class="fa fa-shopping-cart"></i>
			</div>
			<div class="details">
				<div class="number"><?php echo $total ?></div>
				<div class="desc"> Total Orders </div>
			</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
			<div class="visual">
				<i class="fa fa-group fa-icon-medium"></i>
			</div>
			<div class="details">
				<div class="number"><?php echo number_format($average,2) ?></div>
				<div class="desc"> Average Orders </div>
			</div>
		</a>
	</div>
</div>
