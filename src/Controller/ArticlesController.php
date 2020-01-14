<?php
namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{
	
	public function index()
	{

		//$this->viewBuilder()->autoLayout(false);		

		$values = [
			'title' => 'hello',
			'mess' => 'sample',
		];
		$this->set($values);

		$data = $this->Articles->find('all');
        $this->set('data', $data);

	}

	public function add()
	{

		echo "TODO";

	}



}