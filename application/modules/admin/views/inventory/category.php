<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
					<button class="btn btn-primary btn-action" data-url="<?php echo site_url("admin/inventory/category/add") ?>">
						<i class="fa fa-check"></i>
							Add
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover category-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Date</th>
								<th width="25%" class="no-sort"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($collection as $_collection): ?>
								<tr>
									<td><?php echo $_collection["name"] ?></td>
									<td><?php echo $_collection["created_at"] ?></td>
									<td>
										<button class="btn btn-sm btn-primary btn-action" data-url="<?php echo site_url("admin/inventory/category/edit/".$_collection["id"]) ?>">
											<i class="fa fa-pencil"></i>
											Edit	
										</button>
										<button class="btn btn-sm btn-warning btn-view-product" data-id="<?php echo $_collection["id"] ?>">
											<i class="fa fa-search"></i>
											View	
										</button>
										<button class="btn btn-sm btn-danger btn-action" data-url="<?php echo site_url("admin/inventory/category/delete/".$_collection["id"]) ?>" data-confirm="true">
											<i class="fa fa-remove"></i>
											Delete	
										</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="view-product-modal">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	       		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       		<h4 class="modal-title">View Category Products</h4>
	      	</div>
	      	<div class="modal-body">
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      	</div>
	    </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->