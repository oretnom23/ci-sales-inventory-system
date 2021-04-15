<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="tools">
					<button class="btn btn-primary btn-action" data-url="<?php echo site_url("admin/inventory/supplier/add") ?>">
						<i class="fa fa-check"></i>
							Add
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover supplier-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Phone Number</th>
								<th>Email</th>
								<th class="no-sort"></th>
							</tr>
						</thead>
						<tbody>									
							<?php foreach($collection as $_collection): ?>
								<tr id="<?php echo $_collection["id"] ?>">
									<td><?php echo $_collection["name"] ?></td>
									<td><?php echo $_collection["phone"] ?></td>
									<td><?php echo $_collection["email"] ?></td>
									<td width="15%">
										<button class="btn btn-sm btn-primary btn-action" data-url="<?php echo site_url("admin/inventory/supplier/edit/".$_collection["id"]) ?>">
											<i class="fa fa-search"></i>
											View	
										</button>
										<button class="btn btn-sm btn-danger btn-action" data-url="<?php echo site_url("admin/inventory/supplier/delete/".$_collection["id"]) ?>" data-confirm="true">
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