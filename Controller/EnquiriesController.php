<?php
App::uses('AppController', 'Controller');
/**
 * Enquiries Controller
 *
 * @property Enquiry $Enquiry
 */
class EnquiriesController extends AppController {

/**
 *	
 */
	public function client_enquiries() {
		if(!$this->request->is('post')) {
			throw new NotFoundException(__('Invalid Search'));
		}

		$args = array(
			'conditions' => array(
				'client_id' => $this->request->data['Enquiries']['client_id'];
			),
			'fields' = array(
				'created',
				'title'
			),
			'recursive' => -1
		);
		$Enquiries = $this->Enquiry->find('all', $args);

		$this->set('Enquiries', $Enquiries);
		$this->set('_serialize', array('Enquiries'));
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Enquiry->recursive = 0;
		$this->set('enquiries', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Enquiry->id = $id;
		if (!$this->Enquiry->exists()) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		$this->set('enquiry', $this->Enquiry->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enquiry->create();
			if ($this->Enquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiry could not be saved. Please, try again.'));
			}
		}
		$clients = $this->Enquiry->Client->find('list');
		$caseWorkers = $this->Enquiry->CaseWorker->find('list');
		$enquiryTypes = $this->Enquiry->EnquiryType->find('list');
		$spcs = $this->Enquiry->Spc->find('list');
		$this->set(compact('clients', 'caseTypes', 'caseWorkers', 'enquiryTypes', 'spcs'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Enquiry->id = $id;
		if (!$this->Enquiry->exists()) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Enquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiry could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Enquiry->read(null, $id);
		}
		$clients = $this->Enquiry->Client->find('list');
		$caseTypes = $this->Enquiry->CaseType->find('list');
		$caseWorkers = $this->Enquiry->CaseWorker->find('list');
		$enquiryTypes = $this->Enquiry->EnquiryType->find('list');
		$spcs = $this->Enquiry->Spc->find('list');
		$this->set(compact('clients', 'caseTypes', 'caseWorkers', 'enquiryTypes', 'spcs'));
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
		$this->Enquiry->id = $id;
		if (!$this->Enquiry->exists()) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		if ($this->Enquiry->delete()) {
			$this->Session->setFlash(__('Enquiry deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Enquiry was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
