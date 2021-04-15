<?php if(count($product)): ?>
	<?php $total = 0; ?>
	<div class="goods-page">
		<div class="goods-data clearfix">
			<div class="table-wrapper-responsive">
				<table class="cart-table table table-striped table-bordered">
					<thead>
						<tr>
							<th width="20%"></th>
							<th>Name</th>
							<th>SKU</th>
							<th width="10%">Quantity</th>
							<th>Price</th>
							<th>Total</th>
							<th width="10%"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($product as $_product): ?>
							<tr>
								<td class="goods-page-image">
									<img src="<?php echo base_url("assets/images/product/".$_product["image"]); ?>" alt="<?php echo $_product["product_name"] ?>" class="img-responsive">
								</td>
								<td>
									<h3>
										<a href="javascript:;"><?php echo $_product["product_name"] ?></a>
									</h3>
								</td>
								<td><?php echo $_product["sku"] ?></td>
								<td class="goods-page-quantity">
									<input type="text" class="form-control input-sm" name="cart[<?php echo $_product["product_id"] ?>][qty]" value="<?php echo $_product["qty"] ?>">
								</td>
								<td class="goods-page-price">
									<strong><?php echo number_format($_product["price"],2) ?></strong>
								</td>
								<td class="goods-page-total">
									<strong><?php echo number_format($_product["qty"] * $_product["price"],2) ?></strong>
								</td>
								<td class="del-goods-col">
									<button type="button" class="btn btn-danger btn-sm  btn-remove-product" data-id="<?php echo $_product["product_id"]?>">
										Remove
									</button>
								</td>
							</tr>
							<?php $total = $total + ($_product["qty"] * $_product["price"]) ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<div class="shopping-total well col-md-6 pull-right">
				<ul>
					<li>
						<em>Sub Total</em>
						<strong class="price"><?php echo number_format($total,2); ?></strong>
					</li>
					<li class="shopping-total-price">
						<em>Total</em>
						<strong class="price"><?php echo number_format($total,2); ?></strong>
					</li>
				</ul>
			</div>

		</div>

		<button class="btn btn-default btn-action" type="button" data-url="<?php echo site_url("product"); ?>">
			Continue Shopping
		</button>
		<button class="btn btn-primary btn-place pull-right" type="button" data-url="<?php echo $url ?>">Place Reservation</button>
	</div>	
<?php else: ?>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger margin-bottom-10">
				<button class="close" data-dismiss="alert" type="button"></button>
				You have no product added to cart yet. Please view our product <a href="<?php echo site_url("product") ?>">here</a>.
			</div>
		</div>
	</div>
<?php endif ?>