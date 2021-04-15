<?php if(isset($print) && $print): ?>
	<title>Inventory Report</title>
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
	<h1>Inventory Report</h1>
<?php endif; ?>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Product</th>
			<th>Product Code</th>
			<th>Quantity</th>
			<th>Supplier</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($collection as $key => $value): ?>
			<?php if(count($value)): ?>
				<tr>
					<td colspan="4" style="text-align:center"><b><?php echo str_replace("_"," ",strtoupper($key)); ?></b></td>
				</tr>
				<?php foreach($value as $_collection): ?>
					<tr>
						<td><?php echo $_collection["name"]; ?></td>
						<td><?php echo $_collection["sku"]; ?></td>
						<td><?php echo $_collection["qty"]; ?></td>
						<td><?php echo $_collection["supplier"] ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</tbody>
</table>

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