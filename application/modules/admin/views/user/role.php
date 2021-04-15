<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools">
					<button class="btn btn-primary btn-action" data-url="<?php echo site_url("admin/user/role/add") ?>">
						<i class="fa fa-plus"></i>
						Add
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover role-table">
						<thead>
							<tr>
								<th>Name</th>
								<th class="no-sort" width="20%"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($roles as $_collection): ?>
								<tr>
									<td><?php echo $_collection["name"] ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-sm btn-action" data-url="<?php echo site_url("admin/user/role/edit/".$_collection["id"]) ?>">
											<i class="fa fa-pencil"></i> Edit
										</button>
										<button type="button" class="btn btn-danger btn-sm btn-action" data-url="<?php echo site_url("admin/user/role/delete/".$_collection["id"]) ?>" data-confirm="true">
											<i class="fa fa-remove"></i> Delete
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