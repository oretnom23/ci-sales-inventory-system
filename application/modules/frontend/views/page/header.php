<div class="header">
	<div class="w3ls-header">
		<div class="w3ls-header-left">
		</div>
		<div class="w3ls-header-right">
			<ul>
				<li class="dropdown"><a href="<?php echo site_url("customer/account") ?>">My Account</a></li>
				<!--<li class="dropdown"><a href="<?php echo site_url("customer/cart") ?>">Cart</a></li>-->
				<?php if(isset($login)): ?>
					<li class="dropdown"><a href="<?php echo site_url("customer/account/logout") ?>">Log Out</a></li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div class="header-two">
		<div class="container">
			<div class="header-logo">
				<h1>
					<a href="<?php echo site_url("home") ?>">
						<img src="<?php echo base_url("assets/images/frontend/logo.jpg") ?>" class="img-responsive">
						<!--<span>C</span>
						HMSC
						<i>Bazaar</i>-->
					</a>
				</h1>
			</div>
			<div class="header-search">
				<form method="get" class="search-product-form" action="<?php echo site_url("product") ?>">
					<input name="filter[search]" type="search" placeholder="Search for a Product...">
					<button class="btn btn-default" type="submit" aria-label="Left Align">
						<i class="fa fa-search"> </i>
					</button>
				</form>
				
			</div>
			<div class="header-cart">
				<button class="w3view-cart btn-action" type="button" data-url="<?php echo site_url("cart"); ?>">
					<i class="fa fa-cart-arrow-down"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="header-three">
		<div class="container">
			<div class="menu">
				<ul>
					<li><a href="<?php echo site_url("home") ?>">HOME</a></li>
					<li><a href="<?php echo site_url("product") ?>">PRODUCT</a></li>
					<?php foreach($pages as $page): ?>
						<li><a href="<?php echo site_url("page") . "/" . $page["slug"] ?>"><?php echo $page["name"] ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>