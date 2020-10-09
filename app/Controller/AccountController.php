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
			if (password_verify($this->request->data('pass'), $user['Account']['password'])) {
				echo 'Access';
			}
		}
	}

	public function signup()
	{
		if ($this->request->is('post')) {
			$data = array(
				'name' => $this->request->data['name'],
				'email' => $this->request->data['email'],
				'password' => password_hash($this->request->data['pass'], PASSWORD_BCRYPT),
			);

			$this->Account->create();
			$this->Account->save($data);
		}
		
	}

}
