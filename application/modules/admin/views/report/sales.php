<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="tools"></div>
			</div>
			<div class="portlet-body">
				<div class="form-wrapper">
					<form method="post" class="sales-report-form" action="<?php echo site_url("admin/report/sales/generate") ?>">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Display By</label>
									<select class="form-control" name="display">
										<option value=""></option>
										<option value="days">Daily</option>
										<option value="months">Monthly</option>
										<option value="years">Yearly</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>From</label>
									<input type="text" class="form-control datepicker" name="date[from]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>To</label>
									<input type="text" class="form-control datepicker" name="date[to]">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<button class="btn btn-generate btn-primary" type="button">
										<i class="fa fa-file"></i> Generate
									</button>
									<button class="btn btn-print btn-warning" type="button">
										<i class="fa fa-print"></i> Print
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="table-wrapper">
				</div>
			</div>
		</div>
	</div>
</div>