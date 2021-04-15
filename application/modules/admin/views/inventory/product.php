<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="tools">
					<button class="btn btn-primary btn-action" data-url="<?php echo site_url("admin/inventory/product/add") ?>">
						<i class="fa fa-check"></i>
							Add
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover product-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Unit Price</th>
								<th>SRP Price</th>
								<th>Product Code</th>
								<th>Quantity</th>
								<th>Stapus</th>
								<th class="no-sort"></th>
							</tr>
						</thead>
						<tbody>									
							<?php foreach($collection as $_collection): ?>
								<tr id="<?php echo $_collection["id"] ?>">
									<td><?php echo $_collection["name"] ?></td>
									<td><?php echo number_format($_collection["price"],2) ?></td>
									<td><?php echo number_format($_collection["srp_price"],2) ?></td>
									<td><?php echo $_collection["sku"] ?></td>
									<td><?php echo $_collection["qty"] ?></td>
									<td>
										<?php echo $_collection["qty"] ? "In Stock" : "Out of Stock"; ?>
									</td>
									<td width="15%">
										<button class="btn btn-sm btn-primary btn-action" data-url="<?php echo site_url("admin/inventory/product/edit/".$_collection["id"]) ?>">
											<i class="fa fa-pencil"></i>
											Edit	
										</button>
										<button class="btn btn-sm btn-danger btn-action" data-url="<?php echo site_url("admin/inventory/product/delete/".$_collection["id"]) ?>" data-confirm="true">
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