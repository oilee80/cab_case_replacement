<?php
App::uses('AppController', 'Controller');
/**
 * SocialPolicyCodes Controller
 *
 * @property SocialPolicyCode $SocialPolicyCode
 */
class SocialPolicyCodesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SocialPolicyCode->recursive = 0;
		$this->set('socialPolicyCodes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SocialPolicyCode->id = $id;
		if (!$this->SocialPolicyCode->exists()) {
			throw new NotFoundException(__('Invalid social policy code'));
		}
		$this->set('socialPolicyCode', $this->SocialPolicyCode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SocialPolicyCode->create();
			if ($this->SocialPolicyCode->save($this->request->data)) {
				$this->Session->setFlash(__('The social policy code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The social policy code could not be saved. Please, try again.'));
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
		$this->SocialPolicyCode->id = $id;
		if (!$this->SocialPolicyCode->exists()) {
			throw new NotFoundException(__('Invalid social policy code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SocialPolicyCode->save($this->request->data)) {
				$this->Session->setFlash(__('The social policy code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The social policy code could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SocialPolicyCode->read(null, $id);
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
		$this->SocialPolicyCode->id = $id;
		if (!$this->SocialPolicyCode->exists()) {
			throw new NotFoundException(__('Invalid social policy code'));
		}
		if ($this->SocialPolicyCode->delete()) {
			$this->Session->setFlash(__('Social policy code deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Social policy code was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
