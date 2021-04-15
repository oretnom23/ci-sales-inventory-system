<html>
	<head>
		<title>Receipt</title>
		<style>
			h1{text-align:center;}
			.hidden-print{margin-top:20px;}
			.table-container{text-align:center;}
			@media print {
			  .hidden-print {
			    display: none !important;
			  }
			}
		</style>
	</head>
	<body>
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
		<h1>Customer Reservation Receipt</h1>
		<div class="table-container">
			<table style="width:100%">
				<tr>
					<td colspan="4"><b>Customer</b> : <?php echo $data["customer"] ?></td>
				</tr>
				<tr>
					<td colspan="2"><b>Reservation ID</b> : <?php echo str_pad($data["id"],7, "0", STR_PAD_LEFT) ?> </td>
					<td colspan="2"><b>Date</b> : <?php echo $data["created_at"] ?></td>
				</tr>
				<tr>
					<td colspan="4"><b>Items</b></td>
				</tr>
				<tr>
					<td><b>Product</b></td>
					<td><b>Price</b></td>
					<td><b>Qty</b></td>
					<td><b>Total</b></td>
				</tr>
				<?php foreach($item as $_item): ?>
					<tr>
						<td><?php echo $_item["product_name"] ?></td>
						<td><?php echo number_format($_item["price"],2) ?></td>
						<td><?php echo number_format($_item["qty"],2) ?></td>
						<td><?php echo number_format($_item["qty"] * $_item["price"],2) ?></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="3"><b>Total</b></td>
					<td><?php echo number_format($data["total"],2) ?></td>
				</tr>
			</table>
		</div>
		<div style="text-align:center"><p>Present this customer reservation receipt to the Chmsc techno bazaar cashier upon claiming your reserved product. Take note of your reservation ID. It can be printed or pictured out.</p></div>
		<div class="hidden-print">
			<button type="button" onclick="window.print()">Print</button>
		</div>
	</body>
</html>