<div class="row">
	<div class="col-md-12">
		<form method="POST" action="<?php echo site_url("admin/inventory/product/update") ?>" class="form-horizontal form-row-seperated edit-product-form">
			<input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="tools">
						<button class="btn btn-primary btn-save" type="button">
							<i class="fa fa-check"></i>
							Save
						</button>
						<button class="btn btn-danger btn-action" type="button" data-url="<?php echo site_url("admin/inventory/product/delete/".$product["id"]) ?>" data-confirm="true">
							<i class="fa fa-remove"></i>
							Delete
						</button>
						<button class="btn btn-warning btn-action" type="button" data-url="<?php echo site_url("admin/inventory/product") ?>">
							<i class="fa fa-mail-reply"></i>
							Back
						</button>
					</div>
				</div>	
				<div class="portlet-body">
					<div class="tabbable">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_general" data-toggle="tab">General</a></li>
							<li><a href="#tab_image" data-toggle="tab">Images</a></li>
						</ul>
						<div class="tab-content no-space">
							<div id="tab_general" class="tab-pane active">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Category</label>
										<div class="col-md-6">
											<select name="category_id" class="form-control">
												<option value=""></option>
												<?php foreach($category as $_category): ?>
													<option value="<?php echo $_category["id"] ?>" <?php echo $_category["id"] == $product["category_id"] ? "selected" : ""; ?>>
														<?php echo $_category["name"] ?>
													</option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Product Code</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="sku" value="<?php echo $product["sku"]; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="name" value="<?php echo $product["name"]; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Description</label>
										<div class="col-md-6">
											<textarea name="description" class="form-control"><?php echo $product["description"]; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Supplier</label>
										<div class="col-md-6">
											<select name="supplier_id" class="form-control">
												<option value=""></option>
												<?php foreach($supplier as $_supplier): ?>
													<option value="<?php echo $_supplier["id"] ?>" <?php echo $_supplier["id"] == $product["supplier_id"] ? "selected" : "" ?>>
														<?php echo $_supplier["name"] ?>
													</option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Unit Price</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="price" value="<?php echo $product["price"]; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">SRP Price</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="srp_price" value="<?php echo $product["srp_price"]; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Quantity Type</label>
										<div class="col-md-6">
											<select class="form-control" name="qty_type">
												<option value=""></option>
												<option value="pair" <?php echo $product["qty_type"] == "pair" ? "selected" : "" ?>>
													Pair
												</option>
												<option value="half_dozen" <?php echo $product["qty_type"] == "half_dozen" ? "selected" : "" ?>>Half Dozen</option>
												<option value="dozen" <?php echo $product["qty_type"] == "dozen" ? "selected" : "" ?>>Dozen</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Quantity</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="qty"value="<?php echo $product["qty"]; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Show Online ?</label>
										<div class="col-md-6">
											<input type="checkbox" name="online" value="1" <?php echo $product["online"] ? "checked" : "" ?>>
										</div>
									</div>
								</div>
							</div>
							<div id="tab_image" class="tab-pane">
								<div class="alert alert-success margin-bottom-10">
									<i class="fa fa-warning fa-lg"></i>
									Image type and information need to be specified.
								</div>
								<div class="text-align-reverse margin-bottom-10 upload-image-container" id="upload-image-container">
									<button type="button" id="btn-browse" class="btn btn-warning btn-browse">
										<i class="fa fa-plus"></i> Browse
									</button>
									<button type="button" class="btn btn-primary btn-upload">
										<i class="fa fa-share"></i> Upload Files
									</button>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 upload-image-list" id="upload-image-list">
									</div>
								</div>
								<div class="table-container">
									<table class="table table-bordered table-hover table-image">
										<thead>
											<tr class="heading" role="row">
												<th width="15%">Image</th>
												<th>Default</th>
												<th width="10%"></th>
											</tr>
										</thead>
										<tbody>
											<?php if($product["image"] && explode(",",$product["image"])): ?>
												<?php foreach(explode(",",$product["image"]) as $image): ?>
													<tr>
														<td>
															<img class="img-responsive" src="<?php echo base_url("assets/images/product/".$image); ?>">
															<input type="hidden" name="image[]" value="<?php echo $image; ?>";
														</td>
														<td></td>
														<td><button type="button" class="btn btn-danger btn-delete-image"><i class="fa fa-remove"></i> Remove</button></td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>					
			</div>
		</form>
	</div>
</div>