<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="tools">
					<?php if($data["status"] == 1): ?>
						<button class="btn btn-primary btn-action" data-url="<?php echo site_url("admin/pos/teller/index/".$data["id"]) ?>">
							<i class="fa fa-plus"></i>
							Order
						</button>
					<?php endif; ?>
					<button class="btn btn-warning btn-action" data-url="<?php echo site_url("admin/pos/reservation") ?>">
						<i class="fa fa-mail-reply"></i>
						Back
					</button>
					<button class="btn btn-danger btn-action" data-url="<?php echo site_url("admin/pos/reservation/delete/".$data["id"]); ?>" data-confirm="true">
						<i class="fa fa-remove"></i>
						Delete
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-lg">
						<li class="active">
							<a href="#detail" data-toggle="tab">Detail</a>
						</li>
					</ul>
					<div class="content">
						<div id="detail" class="tab-pane active">

							<div class="row">
								<div class="col-md-6">
									<div class="portlet red-sunglo box">
										<div class="portlet-title">
											<div class="caption">Reservation Details</div>
										</div>
										<div class="portlet-body">
											<div class="row static-info">
												<div class="col-md-4 name">Order #</div>
												<div class="col-md-8 value">
													<?php echo str_pad($data["id"],7, "0", STR_PAD_LEFT) ?>
												</div>
											</div>
											<div class="row static-info">
												<div class="col-md-4 name">Reservation Date</div>
												<div class="col-md-8 value">
													<?php echo $data["created_at"] ?>
												</div>
											</div>
											<div class="row static-info">
												<div class="col-md-4 name">Pick Up Date</div>
												<div class="col-md-8 value">
													<?php echo $data["pick_up_date"] ?>
												</div>
											</div>
											<div class="row static-info">
												<div class="col-md-4 name">Customer</div>
												<div class="col-md-8 value">
													<?php echo $data["customer"] ?>
												</div>
											</div>
											<div class="row static-info">
												<div class="col-md-4 name">Total</div>
												<div class="col-md-8 value">
													<?php echo number_format($data["total"],2) ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="portlet red-sunglo box">
										<div class="portlet-title">
											<div class="caption">Reserved Items</div>
										</div>
										<div class="portlet-body">
											<div class="table-container">
												<table class="table table-striped table-bordered table-hover item-table">
													<thead>
														<tr>
															<th width="40%">Product</th>
															<th width="20%">Price</th>
															<th width="20%">Quantity</th>
															<th width="20%">Total</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($item as $_item): ?>
															<tr>
																<td>
																	<b><?php echo $_item["product_name"] ?></b>
																	<ul>
																		<li>SKU : <?php echo $_item["sku"] ?></li>
																		<li>Description : <?php echo $_item["description"] ?></li>
																	</ul>
																</td>
																<td><?php echo number_format($_item["price"],2) ?></td>
																<td><?php echo number_format($_item["qty"],2) ?></td>
																<td>
																	<?php echo number_format(($_item["qty"] * $_item["price"]),2); ?>
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

							<div class="row">
								<div class="col-md-6 col-md-offset-6">
									<div class="well">
										<div class="row static-info align-reverse">
											<div class="col-md-8 name">Sub Total</div>
											<div class="col-md-3 value"><?php echo number_format($data["total"],2) ?></div>
										</div>
										<div class="row static-info align-reverse">
											<div class="col-md-8 name">Grand Total</div>
											<div class="col-md-3 value"><?php echo number_format($data["total"],2) ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>