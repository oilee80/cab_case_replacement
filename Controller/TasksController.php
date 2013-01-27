<?php
App::uses('AppController', 'Controller');
/**
 * Tasks Controller
 *
 */
class TasksController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

/**
 *	Find tasks for a User, if none is supplied then the current user's id is used
*/	public function assigned_tasks() {

		$user_id = @$this->request->data['Task']['user_id'];
		$user_id = (empty($user_id)) ? '58e7c2f0-61be-11e2-84fe-00110901bec1' : $user_id;

		$args = array(
			'conditions' => array(
				'or' => array(
					array('assigned_to' => $user_id, 'state' => 0),	// Open
					array('assigned_by' => $user_id, 'state' => 1)	// Returned
				)
			),
			'recursive' => 1
		);

		$Tasks = $this->Task->find('all', $args);

		$this->set('Tasks', $Tasks);
		if($this->request->params['ext'] == 'json') {
			$this->set('_serialize', array('Tasks'));
		}
	}

}
