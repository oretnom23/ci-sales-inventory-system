<?php foreach($product as $_collection): ?>
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
<?php endforeach; ?>