<h1>Reservation</h1>
<div class="content-page">
	<div class="table-container">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th width="25%">Reservation ID</th>
					<th width="25%">Total</th>
					<th width="25%">Status</th>
					<th width="25%">Date</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($reservation)): ?>
					<?php foreach($reservation as $_collection): ?>
						<tr>
							<td>
								<a href="javascript:;" class="btn-load" data-id="<?php echo $_collection["id"]; ?>">
									<?php echo str_pad($_collection["id"],7, "0", STR_PAD_LEFT) ?>
								</a>
							</td>
							<td><?php echo number_format($_collection["total"],2) ?></td>
							<td><?php echo $_collection["status"] ?></td>
							<td><?php echo $_collection["created_at"] ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<td>No reservations.</td>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" tabindex="-1" id="reservation-data-modal">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
     		<div class="modal-header">
       			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
       				<span aria-hidden="true">&times;</span>
       			</button>
        		<h4 class="modal-title">Information</h4>
     		</div>
      		<div class="modal-body">
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>