<?php
App::uses('AppController', 'Controller');
/**
 * Cs Controller
 */
class AccountController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

	public function signin()
	{
		if ($this->request->is('post')) {
			$user = $this->Account->find('first', array('email' => $this->request->data['email']));
			if ($user) {
				if (password_verify($this->request->data('pass'), $user['Account']['password']) && $user['Account']['email'] == $this->request->data('email')) {
					$this->Session->write('user', $user);
					return $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				} else {
					$this->set('validationError', 'Invalid Email/Password');
				}
			} else {
				$this->set('validationError', 'Email not found');
			}
		}

		if ($this->Session->read('user')) {
			return $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}

	}

	public function signup()
	{
		if ($this->request->is('post')) {

			$this->Account->set($this->request->data);

			if ($this->Account->validates())
			{
				$data = array(
					'name' => $this->request->data['name'],
					'email' => $this->request->data['email'],
					'password' => password_hash($this->request->data['password'], PASSWORD_BCRYPT),
					'avatar' => $this->request->data('avatar')
				);
				$this->Account->save($data);
				$acctId = $this->Account->id;

				$this->loadModel('Configuration');

				$this->Configuration->save(array(
					'account_ID' => $acctId,
					'timer' => 60
				));

				return $this->redirect(array('controller' => 'Account', 'action' => 'signin'));
			} else {
				$this->set('validationErrorsArray', $this->Account->invalidFields());
			}
		}
		
	}

	public function signout() 
	{
		$this->Session->destroy();
		return $this->redirect(array('controller' => 'Account', 'action' => 'signin'));
	}

	public function beforeFilter()
	{
	}

}
