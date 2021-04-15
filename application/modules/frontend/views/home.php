<div class="row">
	<div class="col-md-12">
		<div class="carousel slide" data-ride="carousel" data-interval="5000" id="carousel-slider">
			<div class="carousel-inner" role="listbox">
				<?php foreach($slider as $key => $value): ?>
					<div class="item <?php echo $key == 0 ? "active" : "" ?>">
						<img class="fill" src="<?php echo base_url("assets/images/slider/".$value["file"]) ?>">
					</div>
				<?php endforeach; ?>
			</div>
		<a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left fa fa-angle-left"></span>
		  </a>
		  <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right  fa fa-angle-right"></span>
		  </a>
		</div>
	</div>
</div>