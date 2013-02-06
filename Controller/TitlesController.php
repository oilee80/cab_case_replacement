<?php

class TitlesController extends AppController {

	public function admin_index() {
		$titles = $this->paginate();
		$this->set(compact('titles'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Title->save($this->request->data)) {
				$this->flash(__('The title has been saved.'), array('action' => 'index'));
			} else {
			}
		}
		$this->render('admin_form');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Title->id = $id;
		if (!$this->Title->exists()) {
			throw new NotFoundException(__('Invalid title'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Title->save($this->request->data)) {
				$this->Session->setFlash(__('The title has been saved.'), 'default', array('class' => 'alert-success'));
			} else {
				$this->Session->setFlash(__('Error saving title'), 'default', array('class' => 'alert-error'));
			}
		} else {
			$this->request->data = $this->Title->read(null, $id);
		}
		$this->render('admin_form');
	}

}