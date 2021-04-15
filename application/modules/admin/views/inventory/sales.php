<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover sales-table">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Customer</th>
								<th>Total</th>
								<th>Date</th>
								<th class="no-sort"></th>
							</tr>
						</thead>
						<tbody>									
							<?php foreach($collection as $_collection): ?>
								<tr id="<?php echo $_collection["id"] ?>">
									<td><?php echo str_pad($_collection["id"],7, "0", STR_PAD_LEFT) ?></td>
									<td><?php echo $_collection["customer_name"] ?></td>
									<td><?php echo number_format($_collection["total"],2) ?></td>
									<td><?php echo $_collection["created_at"] ?></td>
									<td width="15%">
										<button class="btn btn-sm btn-primary btn-action" data-url="<?php echo site_url("admin/inventory/sales/view/".$_collection["id"]) ?>">
											<i class="fa fa-search"></i>
											View	
										</button>
										<button class="btn btn-sm btn-danger btn-action" data-url="<?php echo site_url("admin/inventory/sales/delete/".$_collection["id"]) ?>" data-confirm="true">
											<i class="fa fa-remove"></i>
											Delete	
										</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>