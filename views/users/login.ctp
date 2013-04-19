<?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('User', array('action' => 'login'));
	echo $this->Form->inputs(array(
		'legend' => __('Login', true),
		'username',
		'password'
	));
	echo $this->Form->end('Login');
	echo "Don't have a username yet? " . $html->link('Register', '/registers/');
?>