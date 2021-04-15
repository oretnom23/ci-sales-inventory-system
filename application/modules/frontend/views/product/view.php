<?php
	$image = array();

	if($product["image"] && count(explode(",",$product["image"]))){
		$image = explode(",",$product["image"]);
	}else{
		$image[] = "default.jpg";
	}
?>

<div class="products">
	<div class="single-page">
		<div class="single-page-row">
			<div class="col-md-6 single-top-left">
				<div class="flexslider">
					<ul class="slides">
						<?php foreach($image as $_image): ?>
							<li data-thumb="<?php echo base_url("assets/images/product/".$_image) ?>">
								<div class="thumb-image detail_images">
									<img src="<?php echo base_url("assets/images/product/".$_image) ?>" data-imagezoom="true" class="img-responsive" alt="<?php echo $product["name"] ?>">
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-6 single-top-right">
				<form method="post" action="<?php echo site_url("product/add_to_cart"); ?>" class="product-form">
					<input type="hidden" name="product_id" value="<?php echo $product["id"] ?>">
					<input type="hidden" name="product_name" value="<?php echo $product["name"] ?>">
					<input type="hidden" name="sku" value="<?php echo $product["sku"] ?>">
					<input type="hidden" name="price" value="<?php echo $product["price"] ?>">
					<input type="hidden" name="qty" value="1">

					<?php if($product["image"] && count(explode(",",$product["image"]))): ?>
						<?php $image = explode(",",$product["image"])[0]; ?>
						<input type="hidden" name="image" value="<?php echo $image; ?>">
					<?php else: ?>
						<input type="hidden" name="image" value="default.jpg">
					<?php endif; ?>

					<h3 class="item_name"><?php echo $product["name"] ?></h3>
					<!--<p>SKU : <?php echo $product["sku"] ?></p>-->
					<div class="single-rating"></div>
					<div class="single-price">
						<ul>
							<li>PHP <?php echo number_format($product["price"],2); ?></li>
						</ul>
					</div>
					<p class="single-price-text"><?php echo $product["description"] ?></p>
					<button class="w3ls-cart" type="submit">
						<i class="fa fa-cart-plus"></i> Add to cart
					</button>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>