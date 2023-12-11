<?php

namespace Core;

class Controller {
	
	public $model;
	public $view;
	
	public function __construct()
	{
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	public function actionIndex($param) {}
}