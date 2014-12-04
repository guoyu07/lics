<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $this->fetch('title'); ?></title>

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

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link(__('Home'), array('controller' => 'books', 'action' => 'index')); ?></a></li>
					<li><?php echo $this->Html->link(__('Search'), array('controller' => 'books', 'action' => 'search')); ?></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'changePassword')); ?>">
									<span class="glyphicon glyphicon-wrench"></span>
									<?php echo __('Change Password'); ?>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">
									<span class="glyphicon glyphicon-off icons-padding"></span>
									<?php echo __('Logout'); ?>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php echo $this->Session->flash(); ?>

	<div class="container">
		<div class="page-header">
			<h1 class="nowrap"><?php echo $this->fetch('title'); ?></h1>
			<?php if ($this->fetch('lead')): ?>
				<p class="lead nowrap"><?php echo $this->fetch('lead'); ?></p>
			<?php endif; ?>
		</div>
		<?php echo $this->fetch('content'); ?>
	</div>

	<?php
		echo $this->Html->script('jquery-2.1.1.min');
		echo $this->Html->script('bootstrap.min');
	?>

</body>
</html>
