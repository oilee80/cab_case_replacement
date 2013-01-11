<?php
App::uses('AppController', 'Controller');
/**
 * EnquiriesSpcs Controller
 *
 * @property EnquiriesSpc $EnquiriesSpc
 */
class EnquiriesSpcsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EnquiriesSpc->recursive = 0;
		$this->set('enquiriesSpcs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EnquiriesSpc->id = $id;
		if (!$this->EnquiriesSpc->exists()) {
			throw new NotFoundException(__('Invalid enquiries spc'));
		}
		$this->set('enquiriesSpc', $this->EnquiriesSpc->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EnquiriesSpc->create();
			if ($this->EnquiriesSpc->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiries spc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiries spc could not be saved. Please, try again.'));
			}
		}
		$socialPolicyCodes = $this->EnquiriesSpc->SocialPolicyCode->find('list');
		$enquiries = $this->EnquiriesSpc->Enquiry->find('list');
		$this->set(compact('socialPolicyCodes', 'enquiries'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EnquiriesSpc->id = $id;
		if (!$this->EnquiriesSpc->exists()) {
			throw new NotFoundException(__('Invalid enquiries spc'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EnquiriesSpc->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiries spc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiries spc could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EnquiriesSpc->read(null, $id);
		}
		$socialPolicyCodes = $this->EnquiriesSpc->SocialPolicyCode->find('list');
		$enquiries = $this->EnquiriesSpc->Enquiry->find('list');
		$this->set(compact('socialPolicyCodes', 'enquiries'));
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
		$this->EnquiriesSpc->id = $id;
		if (!$this->EnquiriesSpc->exists()) {
			throw new NotFoundException(__('Invalid enquiries spc'));
		}
		if ($this->EnquiriesSpc->delete()) {
			$this->Session->setFlash(__('Enquiries spc deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Enquiries spc was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
