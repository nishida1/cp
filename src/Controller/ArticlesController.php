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
			'mess' => 'メッセージテスト',
		];
		$this->set($values);

	}

}