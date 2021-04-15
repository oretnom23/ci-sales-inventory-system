<div class="row">
	<div class="col-md-6">
		<div class="row">
			<label class="col-md-4">Reservation ID</label>
			<div class="col-md-8">
				<h4><?php echo str_pad($id,7, "0", STR_PAD_LEFT) ?></h4>
			</div>
			<div class="clear"></div>
		</div>
		<div class="row">
			<label class="col-md-4">Status</label>
			<div class="col-md-8">
				<h4><?php echo $status_label; ?></h4>
			</div>
			<div class="clear"></div>
		</div>
		<div class="row">
			<label class="col-md-4">Reserved Date</label>
			<div class="col-md-8">
				<h4><?php echo $created_at; ?></h4>
			</div>
			<div class="clear"></div>
		</div>
		<div class="row">
			<label class="col-md-4">Pick-up Date</label>
			<div class="col-md-8">
				<h4><?php echo $pick_up_date; ?></h4>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-container">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Product</th>
						<th>SKU</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Sub Total</th>
					</tr>
				</thead>
				<tbody>
					<?php $total = 0; ?>
					<?php foreach($item as $_item): ?>
						<tr>
							<td><?php echo $_item["product_name"] ?></td>
							<td><?php echo $_item["sku"] ?></td>
							<td><?php echo number_format($_item["price"],2); ?></td>
							<td><?php echo number_format($_item["qty"],2) ?></td>
							<td><?php echo number_format(($_item["qty"] * $_item["price"]),2) ?></td>
						</tr>
						<?php $total = $total + ($_item["qty"] * $_item["price"]); ?>
					<?php endforeach; ?>
					<tr>
						<td colspan="4">Total</td>
						<td><?php echo number_format($total,2) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>