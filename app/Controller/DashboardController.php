<?php
App::uses('AppController', 'Controller');

Class DashboardController extends AppController 
{

    public $scaffold;

    public function index()
    {
    }

    public function battle()
    {
    }

    public function configuration()
    {

    }

    public function beforeFilter() 
    {
		if (!$this->Session->read('user')) {
			return $this->redirect(array('controller' => 'Account', 'action' => 'signin'));
		}
        $this->layout = 'main';

    }

}
