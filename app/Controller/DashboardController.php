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

		if ($this->request->is('post')) {
			$this->loadModel('ActionLog');
			$this->loadModel('GameHistory');

			$logs = strip_tags($this->request->data('logsSummary'), '<br>');
			$status = $this->request->data('status');
			$enemyName = $this->request->data('enemyName');

			$this->ActionLog->save(array(
				'account_ID' => $this->Session->read('user.Account.account_ID'),
				'log_message' => $logs
			));
			$logsId = $this->ActionLog->id;

			$this->GameHistory->save(array(
				'account_ID' => $this->Session->read('user.Account.account_ID'),
				'action_logs_ID' => $logsId,
				'enemy_name' => $enemyName,
				'status' => $status
			));
		}

		$this->set('enemyName', $this->enemyNames());
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
	
	private function enemyNames()
	{
		$names = array(
            'Marburg virus',
            'Ebola virus',
            'Rabies Virus',
            'HIV Virus',
            'Smallpox Virus',
            'Hanta Virus',
            'Dengue Virus',
            'Rotavirus',
            'SARS-CoV',
            'SARS-CoV-2',
            'MERS-CoV',
            'Seadornavirus'
		);
		
		return $names[rand(0,count($names) - 1)];
	}

}
