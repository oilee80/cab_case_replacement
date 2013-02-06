<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Client->recursive = 0;
		$this->set('clients', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Client->create();
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__('The client has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
			}
		}
		$test = array('key' => 'Some Text');
		$this->set(compact(array('test')));
		$this->set('_serialize', array('test'));
	}

/**
 * find method
 *
 * @return void
 */
	public function find() {
		if(!$this->request->is('post') || empty($this->request->data) || empty($this->request->data['Client'])) {
			throw new BadRequestException(__('Invalid request'));
		}

		$this->Client->Behaviors->load('Containable');
		$this->Client->recursive = -1;
		$opts = array(
			'conditions' => array(),
			'contain' => 'Title'
		);
		if(!empty($this->request->data['Client']['reference'])) {
			$opts['conditions']['reference'] = '%'.$this->request->data['Client']['reference'].'%';
			
			$clients = $this->Client->find('all', $opts);
			if(!empty($clients)) {
				$this->set('Clients', $clients);
				$this->set('_serialize', array('Clients'));
				return;
			}
		}

		if(!empty($this->request->data['Client']['title']))
			$opts['conditions']['title'] = '%' . $this->request->data['Client']['title'] . '%';

		if(!empty($this->request->data['Client']['first_name']))
			$opts['conditions']['first_name LIKE'] = '%' . $this->request->data['Client']['first_name'] . '%';

		if(!empty($this->request->data['Client']['last_name']))
			$opts['conditions']['last_name LIKE'] = '%' . $this->request->data['Client']['last_name'] . '%';

		if(!empty($this->request->data['Client']['date_of_birth'])) {
			if(is_array($this->request->data['Client']['date_of_birth'])) {
				$this->request->data['Client']['date_of_birth'] = $this->request->data['Client']['date_of_birth']['year'] . '-' . $this->request->data['Client']['date_of_birth']['month'] . '-' . $this->request->data['Client']['date_of_birth']['day'];
				if($this->request->data['Client']['date_of_birth'] != '--')
					$opts['conditions']['date_of_birth'] = $this->request->data['Client']['date_of_birth'];
			} else {
				$opts['conditions']['date_of_birth'] = $this->request->data['Client']['date_of_birth'];
			}
		}

		if(!empty($this->request->data['Client']['address_line_1']))
			$opts['conditions']['address_line_1 LIKE'] = '%' . $this->request->data['Client']['address_line_1'] . '%';

		if(!empty($this->request->data['Client']['address_line_2']))
			$opts['conditions']['address_line_2 LIKE'] = '%' . $this->request->data['Client']['address_line_2'] . '%';

		if(!empty($this->request->data['Client']['address_line_3']))
			$opts['conditions']['address_line_3 LIKE'] = '%' . $this->request->data['Client']['address_line_3'] . '%';

		if(!empty($this->request->data['Client']['address_line_4']))
			$opts['conditions']['address_line_4 LIKE'] = '%' . $this->request->data['Client']['address_line_4'] . '%';

		if(!empty($this->request->data['Client']['post_code']))
			$opts['conditions']['post_code LIKE'] = '%' . $this->request->data['Client']['post_code'] . '%';

		if(!empty($this->request->data['Client']['phone_1']))
			$opts['conditions']['phone_1 LIKE'] = '%' . $this->request->data['Client']['phone_1'] . '%';

		if(!empty($this->request->data['Client']['phone_2']))
			$opts['conditions']['phone_2 LIKE'] = '%' . $this->request->data['Client']['phone_2'] . '%';

		if(!empty($this->request->data['Client']['email_1']))
			$opts['conditions']['email_1 LIKE'] = '%' . $this->request->data['Client']['email_1'] . '%';

		if(!empty($this->request->data['Client']['email_2']))
			$opts['conditions']['email_2 LIKE'] = '%' . $this->request->data['Client']['email_2'] . '%';

		$clients = $this->Client->find('all', $opts);
		if(!empty($clients)) {
			$this->set('Clients', $clients);
			$this->set('_serialize', array('Clients'));
			return;
		}
		throw new NotFoundException(__('No %s Found', array('Clients')));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__('The client has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Client->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->Client->delete()) {
			$this->Session->setFlash(__('Client deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Client was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
