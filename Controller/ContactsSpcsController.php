<?php
App::uses('AppController', 'Controller');
/**
 * ContactsSpcs Controller
 *
 * @property ContactsSpc $ContactsSpc
 */
class ContactsSpcsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContactsSpc->recursive = 0;
		$this->set('contactsSpcs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ContactsSpc->id = $id;
		if (!$this->ContactsSpc->exists()) {
			throw new NotFoundException(__('Invalid contacts spc'));
		}
		$this->set('contactsSpc', $this->ContactsSpc->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContactsSpc->create();
			if ($this->ContactsSpc->save($this->request->data)) {
				$this->Session->setFlash(__('The contacts spc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contacts spc could not be saved. Please, try again.'));
			}
		}
		$enquiries = $this->ContactsSpc->Enquiry->find('list');
		$socialPolicyCodes = $this->ContactsSpc->SocialPolicyCode->find('list');
		$this->set(compact('enquiries', 'socialPolicyCodes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ContactsSpc->id = $id;
		if (!$this->ContactsSpc->exists()) {
			throw new NotFoundException(__('Invalid contacts spc'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ContactsSpc->save($this->request->data)) {
				$this->Session->setFlash(__('The contacts spc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contacts spc could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContactsSpc->read(null, $id);
		}
		$enquiries = $this->ContactsSpc->Enquiry->find('list');
		$socialPolicyCodes = $this->ContactsSpc->SocialPolicyCode->find('list');
		$this->set(compact('enquiries', 'socialPolicyCodes'));
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
		$this->ContactsSpc->id = $id;
		if (!$this->ContactsSpc->exists()) {
			throw new NotFoundException(__('Invalid contacts spc'));
		}
		if ($this->ContactsSpc->delete()) {
			$this->Session->setFlash(__('Contacts spc deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contacts spc was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
