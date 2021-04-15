<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover reservation-table">
						<thead>
							<tr>
								<th>Reservation ID</th>
								<th>Customer</th>
								<th>Email</th>
								<!-- <th>Phone Number</th> -->
								<th>Total</th>
								<th>Status</th>
								<th>Created At</th>
								<th class="no-sort"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($collection as $_collection): ?>
								<tr>
									<td><?php echo str_pad($_collection["id"],7, "0", STR_PAD_LEFT) ?></td>
									<td><?php echo $_collection["customer"] ?></td>
									<td><?php echo $_collection["email"] ?></td>
									<!-- <td><?php echo $_collection["phone"] ?></td> -->
									<td><?php echo number_format($_collection["total"],2) ?></td>
									<td><?php echo $_collection["status"] ?></td>
									<td><?php echo $_collection["created_at"] ?></td>
									<td>
										<?php if($_collection["status_id"] == 1): ?>
											<button class="btn btn-primary btn-action" data-url="<?php echo site_url("admin/pos/teller/index/".$_collection["id"]) ?>">Order</button>
										<?php endif; ?>
										<button class="btn btn-warning btn-action" data-url="<?php echo site_url("admin/pos/reservation/view/".$_collection["id"]) ?>">View</button>
										<button class="btn btn-danger btn-action" data-url="<?php echo site_url("admin/pos/reservation/delete/".$_collection["id"]) ?>" data-confirm="true">Delete</button>
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