<div class="row products margin-bottom-40">
	<div class="col-md-12 col-sm-12">
		<h1>Reservation</h1>
		<form method="post" class="checkout-form" action="">
			<div id="checkout-page" class="panel-group checkout-page accordion scrollable">
				<input type="hidden" name="payment_method" value="cash"> 
				<div id="reservation-date" class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">
							<!--<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout-page" href="#reservation-date-content">	
								Step 1: Reservation Notification
							</a>-->
							Step 1: Reservation Notification
						</h2>
					</div>
					<div id="reservation-date-content" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="col-md-12">
								<div class="alert alert-danger">
									Pick up within on or before three(3) days of the reservation. Failure to do so, the reserved product(s) will be cancelled.
								</div>
								<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-parent="#checkout-page" data-target="#terms-and-condition-content">Continue</button>
							</div>
						</div>
					</div>
				</div>
				<!--<div id="payment-method" class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content">	
								Step 2 : Payment Method
							</a>
						</h2>
					</div>
					<div id="payment-method-content" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="col-md-12">
								<p>Please select the preferred payment method to use on this reservation.</p>
								<div class="radio-list">
			                    	<label>
			                        	<input type="radio" name="payment_method" value="cash"> Cash
			                        </label>
			                        <label>
			                        	<input type="radio" name="payment_method" value="credit_card"> Credit Card
			                        </label>
			                    </div>
			                    <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">Continue</button>
							</div>
						</div>
					</div>
				</div>-->
				<div id="terms-and-condition" class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">
							<!--<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout-page" href="#terms-and-condition-content">	
								Step 2 : Terms and Conditions
							</a>-->
							Step 2 : Terms and Conditions
						</h2>
					</div>
					<div id="terms-and-condition-content" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="col-md-12">
								<div class="alert alert-info">
									Do you agree with the terms and conditions.
								</div>
			                    <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">I Agree</button>
			                    <button class="btn btn-primary btn-action" data-url="<?php echo site_url("product"); ?>" type="button">I Disagree</button>
							</div>
						</div>
					</div>
				</div>
				<div id="confirm" class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">
							<!--<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content">
								Step 3 : Confirm Order
							</a>-->
							Step 3 : Confirm Order
						</h2>
					</div>
					<div id="confirm-content" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="col-md-12 clearfix">
								<div class="table-wrapper-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th width="20%"></th>
												<th>Name</th>
												<th>SKU</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<?php $total = 0; ?>
											<?php foreach($product as $_product): ?>
												<tr>
													<td class="checkout-image">
														<img src="<?php echo base_url("assets/images/product/".$_product["image"]); ?>" alt="<?php echo $_product["product_name"] ?>" class="img-responsive">
													</td>
													<td class="checkout-description">
														<h3>
															<a href="javascript:;"><?php echo $_product["product_name"] ?></a>
														</h3>
													</td>
													<td><?php echo $_product["sku"] ?></td>
													<td class="goods-page-price">
														<strong><?php echo number_format($_product["qty"],2); ?></strong>
													</td>
													<td class="goods-page-price">
														<strong><?php echo number_format($_product["price"],2) ?></strong>
													</td>
													<td class="goods-page-total">
														<strong><?php echo number_format($_product["qty"] * $_product["price"],2) ?></strong>
													</td>
												</tr>
												<?php $total = $total + ($_product["qty"] * $_product["price"]) ?>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<div class="checkout-total-block well col-md-6 pull-right">
									<ul>
										<li>
											<em>Sub total</em>
											<strong class="price"><?php echo number_format($total,2); ?></strong>
										</li>
										<li class="checkout-total-price">
											<em>Total</em>
											<strong class="price"><?php echo number_format($total,2); ?></strong>
										</li>
									</ul>
								</div>
								<div class="clear"></div>
								<button id="button-confirm" class="btn btn-confirm btn-primary pull-right" type="button">
									Confirm Order
								</button>
								<button class="btn btn-default pull-right margin-right-20 btn-action" data-url="<?php echo site_url("customer/cart") ?>" type="button">
									Cancel
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>