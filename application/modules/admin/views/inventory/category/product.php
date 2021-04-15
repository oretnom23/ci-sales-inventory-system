<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Product Name</th>
			<th>SKU</th>
			<th>Retail Price</th>
			<th>SRP Price</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($product as $_collection): ?>
			<tr>
				<td><?php echo $_collection["name"] ?></td>
				<td><?php echo $_collection["sku"] ?></td>
				<td><?php echo number_format($_collection["price"],2) ?></td>
				<td><?php echo number_format($_collection["srp_price"],2) ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>