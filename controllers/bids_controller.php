<?php
	class BidsController extends AppController {
		var $name = 'Bids';
		var $components = array('Email');
		
		function beforeFilter() {
		    parent::beforeFilter();
		    $this->Auth->allowedActions = array('index', 'add', 'view');
		}
		
		function index() {
			$this->redirect('/bids/add');
		}
		
		function view(){
			$this->redirect('/bids/add');
		}
		
		function add() {
		    if (!empty($this->data)) {
		        $this->Bid->set($this->data);
				$current_user = $this->viewVars['authUser']['User']['username'];
				$current_email = $this->viewVars['authUser']['User']['email'];
		        if ($this->Bid->validates()) {
		            $this->Email->to = 'jay.margalus@gmail.com';
		            $this->Bid->subject = 'Contact message from ' . $current_email;
		            $this->Bid->from = $current_user;
					$this->Email->sendAs = 'both';
		            $this->Email->send($this->data['Bid']['bid']);
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