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
				<div class="number">Error</div>
				<div class="details">
					<h3>An uncaught Exception was encountered</h3>

					<p>Type: <?php echo get_class($exception); ?></p>
					<p>Message: <?php echo $message; ?></p>
					<p>Filename: <?php echo $exception->getFile(); ?></p>
					<p>Line Number: <?php echo $exception->getLine(); ?></p>

					<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

						<p>Backtrace:</p>
						<?php foreach ($exception->getTrace() as $error): ?>

							<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

								<p style="margin-left:10px">
								File: <?php echo $error['file']; ?><br />
								Line: <?php echo $error['line']; ?><br />
								Function: <?php echo $error['function']; ?>
								</p>
							<?php endif ?>

						<?php endforeach ?>

					<?php endif ?>
				</div>
			</div>
		</div>
	</body>
</html>