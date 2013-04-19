<?php
class PostsController extends AppController {

	var $name = 'Posts';

	function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
		$filterOptions = $this->Filter->filterOptions;
		$posts = $this->paginate(null, $this->Filter->filter);
		$this->set(compact('filterOptions', 'posts'));
	}
	
	function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allowedActions = array('index', 'view', 'email');
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function email() {
		$this->loadModel('Bid');
		$current_user = $this->viewVars['authUser']['User']['username'];
		$current_email = $this->viewVars['authUser']['User']['email'];
		if(isset($this->data)) {
            $this->Bid->create($this->data);
            // Email to Admin
            if($this->Bid->validates()){
                $this->Email->to = 'jay.margalus@gmail.com';
                $this->Email->replyTo = $current_email;
                $this->Email->from = $current_user.' <'.$current_email.'>';
				$this->Email->subject = 'Contact message from ' . $current_email;
                if ($this->Email->send($this->data['Post']['bid'])) {
                    $this->Session->setFlash('Thank you for contacting us');
                } else {
                    $this->Session->setFlash('Mail Not Sent');
                }
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Please Correct Errors');
            }
			$this->Email->reset();
			// Email to Poster
			if($this->Bid->validates()){
                $this->Email->to = 'jay.margalus@gmail.com';//Needs to be changed to be the posters email address
                $this->Email->from = 'jay.margalus@gmail.com';
				$this->Email->subject = 'Contact message from ' . $current_email;
                if ($this->Email->send($this->data['Post']['bid'])) {
                    $this->Session->setFlash('Thank you for contacting us');
                } else {
                    $this->Session->setFlash('Mail Not Sent');
                }
                $this->redirect(array('controller' => 'posts', 'action' => 'view'));
            } else {
                $this->Session->setFlash('Please Correct Errors');
            }
        }
	}
}
