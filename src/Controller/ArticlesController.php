<?php
namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{
	
	public function index()
	{

		//$this->viewBuilder()->autoLayout(false);		

		$this->set('title', 'hello');
		$this->set('mess', '123');

	}

}