<style>
	.product-list {
	    display: flex;
	    flex-wrap: wrap;
	}
</style>
<div class="products">
	<div class="col-md-3 rsidebar">
		<form method="get" action="<?php echo site_url("product") ?>" class="filter-product-form">
			<div class="rsidebar-top">
				<div class="sidebar-row">
					<h4>Filter By Price</h4>
					<input type="text" class="range-slider" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[<?php echo $filter["price"] ?>]" name="filter[price]">
				</div>
				<div class="sidebar-row">
					<h4>Filter By Category</h4>
					<ul class="filter">
						<?php foreach($category as $_category): ?>
							<li>
								<label>
									<input type="checkbox" name="filter[category][]" 
										value="<?php echo $_category["id"] ?>"
										<?php echo in_array($_category["id"],$filter["category"]) ? "checked" : "" ?>
									>
									<?php echo $_category["name"] ?>
								</label>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="sidebar-row">
					<h4>Search</h4>
					<input type="text" class="form-control" name="filter[search]" placeholder="Search for Product Name" value="<?php echo $filter["search"] ?>">
				</div>
				<div class="sidebar-row">
					<button type="button" class="btn btn-primary btn-filter">
						<i class="fa fa-search"></i> Filter
					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-9">
		<div class="product-list">
			<?php if(count($product)): ?>
				<?php foreach($product as $_product): ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="thumbnail">
							<form class="product-form" method="post" action="<?php echo site_url("product/add_to_cart"); ?>">
								<input type="hidden" name="product_id" value="<?php echo $_product["id"] ?>">
								<input type="hidden" name="product_name" value="<?php echo $_product["name"] ?>">
								<input type="hidden" name="sku" value="<?php echo $_product["sku"] ?>">
								<input type="hidden" name="price" value="<?php echo $_product["price"] ?>">
								<input type="hidden" name="qty" value="1">

								<?php if($_product["image"] && count(explode(",",$_product["image"]))): ?>
									<?php $image = explode(",",$_product["image"])[0]; ?>
									<a href="<?php echo site_url("product/view")."/".$_product["id"]; ?>">
										<img class="img-responsive" src="<?php echo base_url("assets/images/product/".$image); ?>" alt="<?php echo $_product["name"]  ?>">
									</a>
									<input type="hidden" name="image" value="<?php echo $image; ?>">
								<?php else: ?>
									<a href="<?php echo site_url("product/view")."/".$_product["id"]; ?>">
										<img class="img-responsive" src="<?php echo base_url("assets/images/product/default.jpg"); ?>" alt="<?php echo $_product["name"]  ?>">
									</a>
									<input type="hidden" name="image" value="default.jpg">
								<?php endif; ?>

								<div class="caption">
									<h4>
										<a href="<?php echo site_url("product/view")."/".$_product["id"]; ?>">
											<?php echo $_product["name"] ?>
										</a>
									</h4>
									<div class="pi-price"><?php echo number_format($_product["price"],2); ?></div>
									<div><label>Stock on Hand</label> : <?php echo $_product["qty"] ?></div>
									<div><label>Reservations</label> : <?php echo $_product["reserved"] ?></div>

									<?php if($_product["qty"]): ?>
										<input type="submit" class="btn btn-primary add2cart" value="Add to Cart">
									<?php else: ?>
										<span class="pull-right">Out of Stock</span>
									<?php endif; ?>
								</div>
							</form>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-md-12">
					<div class="alert alert-danger margin-bottom-10">
						<i class="fa fa-warning fa-lg"></i>
						No product found.
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4 items-info"></div>
			<div class="col-md-8 col-sm-8"></div>
		</div>
	</div>
</div>