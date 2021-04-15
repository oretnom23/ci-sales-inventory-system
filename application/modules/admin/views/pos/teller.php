<div class="row">
	<?php if($teller): ?>
		<div class="col-md-6">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">Search Product</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body">
					<div class="table-container product-table-container">
						<table class="table table-striped table-bordered table-hover product-table">
							<thead>
								<tr>
									<th>Product Code</th>
									<th>Name</th>
									<th>Price</th>
									<th>Stock</th>
									<th width="15%">Qty</th>
									<th width="10%" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($product as $_collection): ?>
									<tr>
										<td><?php echo $_collection["sku"] ?></td>
										<td>
											<?php echo $_collection["name"] ?>
											<input type="hidden" name="id" value="<?php echo $_collection["id"] ?>">
											<input type="hidden" name="price" value="<?php echo $_collection["price"] ?>">
											<input type="hidden" name="name" value="<?php echo $_collection["name"] ?>">
											<input type="hidden" name="sku" value="<?php echo $_collection["sku"] ?>">
										</td>
										<td><?php echo number_format($_collection["price"],2) ?></td>
										<td><?php echo number_format($_collection["qty"],0) ?></td>
										<td>
											<?php if($_collection["qty"]): ?>
												<input type="number" class="form-control input-sm" name="qty" value="1">
											<?php else: ?>
												<label class="error"><?php echo "N/A" ?></label>
											<?php endif; ?>
										</td>
										<td>
											<?php if($_collection["qty"]): ?>
												<button type="button" class="btn btn-primary btn-cart btn-sm">
													<i class="fa fa-plus"></i>
													Add
												</button>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="col-md-6 <?php echo $teller ? "" : "col-md-offset-6" ?>">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">Order</div>
				<div class="tools">
					<button class="btn btn-primary btn-save">
						<i class="fa fa-money"></i>
						Proceed
					</button>
					<button class="btn btn-danger btn-action" data-confirm="true" data-url="<?php echo site_url("admin/pos/teller/cancel"); ?>">
						<i class="fa fa-remove"></i>
						Cancel
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container order-table-container">
					<div class="row">
						<form method="post" class="teller-form">
							<input type="hidden" name="total" value="<?php echo $total ?>">
							<input type="hidden" name="payment_method" value="cash">
							<div class="col-md-12">
								<?php if(isset($reserve)): ?>
									<input type="hidden" name="reservation_id" value="<?php echo $reserve["reservation_id"] ?>" class="form-control">
									<input type="hidden" name="customer_id" value="<?php echo $reserve["customer_id"] ?>" class="form-control">
									<div class="form-group">
										<label>Customer</label>
										<input type="text" name="customer_name" value="<?php echo $reserve["customer"] ?>" class="form-control">
									</div>
								<?php else: ?>
									<div class="form-group">
										<label>Customer</label>
										<input type="text" name="customer_name" class="form-control">
									</div>
								<?php endif; ?>
							</div>
							<!--<div class="col-md-12">
								<div class="form-group">
									<label>Payment Method</label>
									<select class="form-control" name="payment_method">
										<option value=""></option>
										<?php foreach($payment as $_payment): ?>
											<option value="<?php echo $_payment ?>" <?php echo isset($reserve) && $reserve["payment_method"] == $_payment ? "selected" : "" ?>>
												<?php echo ucwords(str_replace("_"," ",$_payment)); ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>-->
							<div class="col-md-12 amount-paid-container">
								<div class="form-group">
									<label>Cash</label>
									<input type="text" name="amount_paid" class="form-control">
								</div>
							</div>
							<div class="col-md-12 amount-paid-container">
								<div class="form-group">
									<label>Change</label>
									<input type="text" name="change" class="form-control" readonly>
								</div>
							</div>
						</form>
					</div>
					<table class="table table-striped table-bordered table-hover order-table">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>
								<th width="15%">Qty</th>
								<th>Total</th>
								<th width="10%"></th>
							</tr>
						</thead>
						<tbody>
							<?php $total = 0; ?>
							<?php foreach($order as $_collection): ?>
								<tr>
									<td><?php echo $_collection["name"] ?></td>
									<td><?php echo number_format($_collection["price"],2) ?></td>
									<td>
										<input type="text" name="<?php echo $_collection["id"] ?>" class="form-control input-sm" value="<?php echo $_collection["qty"] ?>">
									</td>
									<td>
										<?php echo number_format(($_collection["qty"] * $_collection["price"]),2) ?>	
									</td>
									<td>
										<button class="btn btn-danger btn-sm btn-remove-product" data-id="<?php echo $_collection["id"] ?>">
											<i class="fa fa-remove"></i>
											Remove
										</button>
									</td>
								</tr>
								<?php $total = $total + ($_collection["qty"] * $_collection["price"]); ?>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3">Total</td>
								<td colspan="2" class="total-td"><?php echo number_format($total,2) ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

		