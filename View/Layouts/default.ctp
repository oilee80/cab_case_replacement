<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo __('%s CASE replacement', array(Configure::read('__bureau_name'))); ?></title>

	<script type="text/javascript" src="//code.jquery.com/jquery-1.9.0.min.js"></script>

	<?php
		echo $this->Html->meta('icon');

//		echo $this->Html->css('cake.generic');
		echo $this->Html->css('/twitter_bootstrap/css/bootstrap.min');
		echo $this->Html->css('/twitter_bootstrap/css/bootstrap-responsive');
		echo $this->Html->css('style');

		echo $this->Html->script('/twitter_bootstrap/js/bootstrap.min');
		echo $this->Html->script('/twitter_bootstrap/js/bootstrap-button');
		echo $this->Html->script('/twitter_bootstrap/js/bootstrap-alert');
		echo $this->Html->script('/twitter_bootstrap/js/bootstrap-dropdown');
		echo $this->Html->script('/twitter_bootstrap/js/bootstrap-modal');
		echo $this->Html->script('/twitter_bootstrap/js/bootstrap-popover');
		echo $this->Html->script('/twitter_bootstrap/js/bootstrap-scrollspy');
		echo $this->Html->script('/twitter_bootstrap/js/bootstrap-tab');
//		echo $this->Html->script('/twitter_bootstrap/js/bootstrap-twipsy');

		echo $this->Html->script('script');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<script type="text/javascript">
	app.root = '<?php echo Router::url('/') ?>';
</script>
</head>
<body>
	<header>
		<h1><?php echo $this->Html->link(__('%s CASE replacement', array(Configure::read('__bureau_name'))), '/'); ?></h1>
	</header>
	<?php echo $this->element('actions'); ?>
	<div class="row-fluid">
		<div id="tasks_roles" class="span3">
			<ul id="roles">
				
			</ul>

			<ul id="tasks">
				<li><a id="getTasks">Get Tasks</a></li>
			</ul>
		</div>
		<div class="span9">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>

	<footer>

	</footer>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
