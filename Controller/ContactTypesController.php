<?php
App::uses('AppController', 'Controller');
/**
 * ContactTypes Controller
 *
 * @property ContactType $ContactType
 */
class ContactTypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContactType->recursive = 0;
		$this->set('contactTypes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ContactType->id = $id;
		if (!$this->ContactType->exists()) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		$this->set('contactType', $this->ContactType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContactType->create();
			if ($this->ContactType->save($this->request->data)) {
				$this->Session->setFlash(__('The contact type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ContactType->id = $id;
		if (!$this->ContactType->exists()) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ContactType->save($this->request->data)) {
				$this->Session->setFlash(__('The contact type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContactType->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ContactType->id = $id;
		if (!$this->ContactType->exists()) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		if ($this->ContactType->delete()) {
			$this->Session->setFlash(__('Contact type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
