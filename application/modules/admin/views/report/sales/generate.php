<title>Sales Order Report</title>
<?php if(isset($print) && $print): ?>
	<style>
		h1{text-align:center}
		table{border-collapse:collapse;width:100%;}
		table tr td,table tr th{border:1px solid #000;padding:5px;}
		@media print {
		  .no-print, .no-print * {
		    display: none !important;
		  }
		}
	</style>

	<div style="text-align:center;position:relative;">
		<div style="position:absolute;top:0px;left:50px">
			<img src="<?php echo base_url("assets/images/logo/chmsc.png"); ?>" width="75px">
		</div>
		<div style="position:absolute;top:0px;right:50px">
			<img src="<?php echo base_url("assets/images/logo/ONLINE.png"); ?>" width="100px">
		</div>
		<div>Carlos Hilado Memorial State College</div>
		<div>Talisay City Negros Occidental</div>
		<div><?php echo Date("F j, Y H:i:s"); ?></div>
	</div>
	<h1>Sales Order Report</h1>
<?php endif; ?>

<?php if($display): ?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Order ID</th>
				<th>Customer</th>
				<th>Total</th>
				<th>Purchased Date</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($collection as $date => $_collection): ?>
				<tr>
					<td colspan="4" style="text-align:center">
						<?php
							$date = date_create($date);
							switch($display_by){
								case "days" : $date = date_format($date,"F d, Y");break;
								case "months" : $date = date_format($date,"F, Y");break;
								case "years" : $date = date_format($date,"Y");break;
								default: $date = date_format($date,"F d, Y");break;
							}
						?>
						<b><?php echo $date; ?></b>
					</td>
				</tr>
				<?php foreach($_collection as $sub): ?>
					<tr>
						<td><?php echo str_pad($sub["id"],7, "0", STR_PAD_LEFT) ?></td>
						<td><?php echo $sub["customer_name"] ?></td>
						<td>PHP <?php echo number_format($sub["total"],2); ?></td>
						<td><?php echo $sub["created_at"] ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Order ID</th>
				<th>Customer</th>
				<th>Total</th>
				<th>Purchased Date</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($collection as $_collection): ?>
				<tr>
					<td><?php echo str_pad($_collection["id"],7, "0", STR_PAD_LEFT) ?></td>
					<td><?php echo $_collection["customer_name"] ?></td>
					<td>PHP <?php echo number_format($_collection["total"],2); ?></td>
					<td><?php echo $_collection["created_at"] ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>

<?php if(isset($print) && $print): ?>
	<div style="margin-top:20px" class="no-print">
		<button type="button" onclick="window.print()">Print</button>
	</div>
	<script>
		window.print()
		setTimeout(function(){
			window.close()
		},750)
	</script>
<?php endif; ?>

