<div class="row">
	<?php if($notification && count($notification)): ?>
		<?php foreach($notification as $_collection): ?>
			<div class="col-md-12">
				<div class="alert alert-<?php echo $_collection["type"] ?> margin-bottom-10">
					<button class="close" data-dismiss="alert" type="button"></button>
					<?php echo $_collection["message"]; ?>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>