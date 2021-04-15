<style>
	.slider-image-container{
		display: flex;
		flex-wrap: wrap;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
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
				<div class="row slider-image-container">
					<?php foreach($collection as $_collection): ?>
						<div class="col-md-3 col-xs-6" data-id="<?php echo $_collection["id"] ?>">
							<div class="thumbnail">
								<img src="<?php echo base_url("assets/images/slider/".$_collection["file"]) ?>" alt="Slider Image" class="img-responsive">
								<div class="caption">
									<!-- <button class="btn btn-primary btn-view" data-id="<?php echo $_collection["id"] ?>">
										<i class="fa fa-search"></i> View
									</button> -->
									<button class="btn btn-danger btn-delete" data-id="<?php echo $_collection["id"] ?>">
										<i class="fa fa-remove"></i> Delete
									</button>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>