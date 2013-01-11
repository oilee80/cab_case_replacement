<?php
App::uses('AppController', 'Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 */
class AddressesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->paginate());
	}

/**
 * find method
 * 
 * Uses post data from JSON and returns JSON Array of addresses
 * 
 * @return void
*/
	public function find() {
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function import() {
		if($this->request->is('post')) {
			if(
				is_array(@$this->request->data['Address']['import']) &&
				!empty($this->request->data['Address']['import']['size']) &&
				empty($this->request->data['Address']['import']['error'])
			){
				if($this->Address->import($this->request->data['Address']['import']['tmp_name'])) {
					$this->Session->SetFlash(__('Import Successfull'));
				} else {
					$this->Session->SetFlash(__('Error during Import'));
				}
			} else {
debug($this->request->data);
				$this->Session->setFlash(__('No Import File Detected or there where Errors'));
			}
		}

		$this->set('new_address', $this->Address->find('count', array('conditions' => array('new' => 1))));
		$this->set('address', $this->Address->find('count'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {
				$this->flash(__('The address has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->Address->read(null, $id);
		}
	}
}
