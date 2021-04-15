<html>
	<head>
		<title>Receipt</title>
		<style>
			h2{text-align:center;}
			@media print {
			  .no-print, .no-print * {
			    display: none !important;
			  }
			}
		</style>
	</head>
	<body>
		<div style="text-align:center;position:relative;">
			<div style="position:absolute;top:0px;left:0px">
				<img src="<?php echo base_url("assets/images/logo/chmsc.png"); ?>" width="50px">
			</div>
			<div style="position:absolute;top:0px;right:0px">
				<img src="<?php echo base_url("assets/images/logo/ONLINE.png"); ?>" width="75px">
			</div>
			<div>Carlos Hilado Memorial State College</div>
			<div>Talisay City Negros Occidental</div>
			<div><?php echo Date("F j, Y H:i:s"); ?></div>
		</div>
		<h2>CHMSC Techno Bazaar</h2>
		<table style="width:100%">
			<tr>
				<td></td>
				<td>PHP</td>
			</tr>
			<?php foreach($item as $_item): ?>
				<tr>
					<td>
						<?php echo $_item["product_name"] ?>
						<div>
							<?php echo $_item["qty"]; ?> @ <?php echo number_format($_item["price"],2) ?>
						</div>
					</td>
					<td><?php echo number_format($_item["qty"] * $_item["price"],2) ?></td>
				</tr>
			<?php endforeach; ?>
			<tr></tr>
			<tr>
				<td><b>Total</b></td>
				<td><?php echo number_format($data["total"],2) ?></td>
			</tr>
			<?php if($data["payment_method"] == "cash"): ?>
				<tr>
					<td><b>Cash</b></td>
					<td><?php echo number_format($data["amount_paid"],2) ?></td>
				</tr>
				<tr>
					<td><b>Change Due</b></td>
					<td><?php echo number_format(($data["amount_paid"] - $data["total"]),2) ?></td>
				</tr>
			<?php endif; ?>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td><b>Customer Name</b></td>
				<td><?php echo $data["customer_name"] ? $data["customer_name"] : "Walk In" ?></td>
			</tr>
			<tr>
				<td><b>Cashier</b></td>
				<td><?php echo $data["teller"] ? $data["teller"]["fullname"] : "Express Teller" ?></td>
			</tr>
			<tr>
				<td><b>Signature</b></td>
				<td></td>
			</tr>
		</table>
		<div style="text-align:center;margin-top:20px">
			
			<div>Sales Invoice Number <?php echo str_pad($data["id"],7, "0", STR_PAD_LEFT) ?></div>
		</div>

		<div class="no-print" style="margin-top:20px">
			<button type="button" class="no-print" onclick="window.print()">Print</button>
		</div>
	</body>
</html>