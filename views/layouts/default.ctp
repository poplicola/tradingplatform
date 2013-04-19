<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('The US Railway Database'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');

		echo $scripts_for_layout;
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script>
		$(document).ready(function()  {
		  stateText = $('#state-text').detach();
		  stateSelect = $('#state-select').detach();

		  checkSelected(stateText, stateSelect);

		  $('#country-select').change(function() {
		    checkSelected(stateText, stateSelect);
		  });
		});

		function checkSelected(stateText, stateSelect) {
		  if ($('#country-select').val() != 'US') {
		    stateText.appendTo('#state-wrapper');
		    stateSelect.detach();
		  } else {
		    stateSelect.appendTo('#state-wrapper');
		    stateText.detach();
		  }
		}
	</script>
</head>
<body>
	<div id="navigation">
		<ul>
		<?php
			if (!$authUser) {
				echo "<li>" . $html->link('Login', '/users/login') . "</li>";
				echo "<li class='register'>" . $html->link('Register', '/registers/') . "</li>";
			} elseif ($group == 1) {
				echo "<li>" . $html->link('Users', '/users/') . "</li>";
				echo "<li>" . $html->link('Posts', '/posts/') . "</li>";
				echo "<li>" . $html->link('Logout', '/users/logout') . "</li>";
			} else {
				echo "<li>" . $html->link('Posts', '/posts/') . "</li>";
				echo "<li>" . $html->link('Logout', '/users/logout') . "</li>";
			}
		?>
		</ul>
		<div class="clearfix"></div>
	</div>
	<div id="container">
		<div id="header">
			<?php 
				echo $this->Html->link(
				    "<h1></h1>",
				    "/",
				    array('escape' => false)
				);
			?>
			
			<div class="clearfix"></div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash('auth'); ?>
			
			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">

		</div>
		<div class="clearfix"></div>
	</div>

</body>
</html>