<?php
	class RegistersController extends AppController {
		var $name = 'Registers';
		var $components = array('Email');
		
		function beforeFilter() {
		    parent::beforeFilter();
		    $this->Auth->allowedActions = array('index', 'add');
		}
		
		function index() {
			$this->redirect('/registers/add');
		}
		
		function add() {
		    if (!empty($this->data)) {
		        $this->Register->set($this->data);
		        if ($this->Register->validates()) {
		            $this->Email->to = 'jay.margalus@gmail.com';  
		            $this->Email->subject = 'Contact message from ' . $this->data['Register']['name'];  
		            $this->Email->from = $this->data['Register']['email'];
					$this->Email->sendAs = 'both';
		            $this->Email->send($this->data['Register']['details']);
					if ($this->Email->send()) { 
						$this->Session->setFlash('Email sent'); 
					} else { 
						$this->Session->setFlash('Email not sent'); 
					}
		        }
		    }
		}
	}
?>