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
	public function admin_index() {
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
		if(!$this->request->is('post') || (empty($this->request->data['Address']['post_code']))) {
			throw new BadRequestException(__('Invalid Search'));
		}

		$postcodeSearch = strtr($this->request->data['Address']['post_code'], array(' ', '%'));
		$args = array(
			'conditions' => array(
				'post_code LIKE' => '%' . strtoupper($postcodeSearch) . '%'
			),
			'recursive' => -1
		);

		$Addresses = $this->Address->find('all', $args);
		$this->set('Addresses', $Addresses);
		if($this->request->params['ext'] == 'json') {
			$this->set('_serialize', array('Addresses'));
		}
	}

/**
 * import method
 *
 * @param string $id
 * @return void
 */
	public function admin_import() {
		if($this->request->is('post')) {
			if(
				is_array(@$this->request->data['Address']['import']) &&
				!empty($this->request->data['Address']['import']['size']) &&
				empty($this->request->data['Address']['import']['error'])
			){
				if($this->Address->import($this->request->data['Address']['import']['tmp_name'])) {
					$this->Session->setFlash(__('Import Successfull'));
				} else {
					$this->Session->setFlash(__('Error during Import'));
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
	public function admin_edit($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved.'), 'default', array('class' => 'alert-success'));
			} else {
				$this->Session->setFlash(__('Error saving Address'), 'default', array('class' => 'alert-error'));
			}
		} else {
			$this->request->data = $this->Address->read(null, $id);
		}
		$this->render('admin_form');
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {
				$this->flash(__('The address has been saved.'), array('action' => 'index'));
			} else {
			}
		}
		$this->render('admin_form');
	}

/**
 * export method
 *
 * @return void
 */	public function admin_export() {
		if(!array_key_exists('ext', $this->request->params) || ($this->request->params['ext'] != 'csv')) {
			$this->Session->setFlash(__('Incorrect Extension'), 'default', array('class' => 'alert-error'));
			$this->redirect(array('action' => 'index'));
		}
		$addresses = $this->Address->find('all', array('recursive' => -1));
		$this->set(compact('addresses'));
	}
}
