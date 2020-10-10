<?php
App::uses('AppController', 'Controller');

Class DashboardController extends AppController 
{

    public $scaffold;

    public function index()
    {
		$this->layout = 'main';
    }

    public function battle()
    {
        $this->layout = 'main';
    }

    public function configuration()
    {

    }

}



?>