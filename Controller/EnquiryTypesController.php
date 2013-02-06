<?php
App::uses('AppController', 'Controller');
/**
 * EnquiryTypes Controller
 *
 * @property EnquiryType $EnquiryType
 */
class EnquiryTypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EnquiryType->recursive = 0;
		$this->set('enquiryTypes', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EnquiryType->create();
			if ($this->EnquiryType->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiry type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiry type could not be saved. Please, try again.'));
			}
		}
		$this->render('form');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->EnquiryType->id = $id;
		if (!$this->EnquiryType->exists()) {
			throw new NotFoundException(__('Invalid enquiry type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EnquiryType->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiry type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiry type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EnquiryType->read(null, $id);
		}
		$this->render('admin_form');
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
		$this->EnquiryType->id = $id;
		if (!$this->EnquiryType->exists()) {
			throw new NotFoundException(__('Invalid enquiry type'));
		}
		$del = array(
			'EnquiryType' => array(
				'disabled' => true
			)
		);
		if ($this->EnquiryType->save($del)) {
			$this->Session->setFlash(__('Enquiry type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Enquiry type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 */
	public function admin_index() {
		$this->EnquiryType->recursive = -1;
		$enquiryTypes = $this->paginate('EnquiryType');

		$this->set(compact('enquiryTypes'));
	}
}