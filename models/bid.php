<?php
	class Bid extends AppModel {
		var $name = 'Bid';
	    var $useTable = false;
	    
		function schema() {
	        return array (
	            'name' => array('type' => 'string', 'length' => 60),
	            'email' => array('type' => 'string', 'length' => 60),
	            'bid' => array('type' => 'text', 'length' => 100)
	        );
		}
	}
?>