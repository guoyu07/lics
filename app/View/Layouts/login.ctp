<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>lics</title>

	<?php
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');
		echo $this->Html->css('screen');
		if (array_key_exists('HTTP_USER_AGENT', $_SERVER) && strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false) {
			echo $this->Html->css('kindle');
		}
	?>

</head>
<body>

	<div class="container">
		<div class="page-header">
			<h1><?php echo __('Welcome.'); ?></h1>
			<p class="lead"><?php echo __('Please enter your username and password.'); ?></p>
		</div>
		<hr>
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>

	<?php
		echo $this->Html->script('jquery-2.1.1.min');
		echo $this->Html->script('bootstrap.min');
	?>

</body>
</html>
