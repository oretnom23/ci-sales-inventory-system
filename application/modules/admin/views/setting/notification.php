<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<?php foreach($collection as $_collection): ?>
						<div class="col-md-12">
							<div class="alert alert-<?php echo $_collection["qty"] > 0 ? "warning" : "danger"; ?>">
								<a href="<?php echo site_url("admin/inventory/product/edit") . "/" . $_collection["id"] ?>">
									<?php echo $_collection["name"] ?>
								</a>
								<?php if($_collection["qty"] > 0): ?>
									has low inventory stock.
								<?php else: ?>
									is out of stock. Please contact <?php echo $_collection["supplier"]; ?> supplier.
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>