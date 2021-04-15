<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>404 Page Not Found</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/font-awesome/css/font-awesome.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap/css/bootstrap.min.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/error.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/components.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/plugins.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/layout.css") ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/themes/red-sunglo.css") ?>">
	</head>
	<body class="page-404-full-page">
		<div class="row">
			<div class="col-md-12 page-404">
				<div class="number">PHP Error</div>
				<div class="details">
					<h3>A PHP Error was encountered</h3>

					<p>Severity: <?php echo $severity; ?></p>
					<p>Message:  <?php echo $message; ?></p>
					<p>Filename: <?php echo $filepath; ?></p>
					<p>Line Number: <?php echo $line; ?></p>

					<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

						<p>Backtrace:</p>
						<?php foreach (debug_backtrace() as $error): ?>

							<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

								<p style="margin-left:10px">
								File: <?php echo $error['file'] ?><br />
								Line: <?php echo $error['line'] ?><br />
								Function: <?php echo $error['function'] ?>
								</p>

							<?php endif ?>

						<?php endforeach ?>

					<?php endif ?>
				</div>
			</div>
		</div>
	</body>
</html>