<?php namespace zephinzer\Todos\API\Demo;
require_once __DIR__.'/../../../classes/Bootstrap/APIEndPoint.php';

class MethodsDelete extends \zephinzer\Bootstrap\APIEndPoint {
	public function __construct($inputData = NULL) {
		echo 'MethodsDelete: '.PHP_EOL;
		echo json_encode($this);
		$inputData[\zephinzer\Bootstrap\APIEndPoint::FLAG_BREAKPOINT] = 
			\zephinzer\Bootstrap\APIEndPoint::STAGE_GETOUPUT;
		parent::__construct($inputData);
	}
	
	public function getInput() {
		$this->inputData = 'got it';
		echo 'getInput'.PHP_EOL;
		echo json_encode($this);
	}
	
	public function verifyInput() {
		$this->inputData = 'input verified';
		echo 'verifyInput'.PHP_EOL;
		echo json_encode($this);
	}
	
	public function process() {
		$this->outputData = 'data deleted && output generated';
		echo 'process'.PHP_EOL;
		echo json_encode($this);
	}
	
	public function verifyOutput() {
		$this->outputData = 'output verified';
		echo 'verifyOutput'.PHP_EOL;
		echo json_encode($this);
	}
	
	public function getOutput() {
		echo 'getOutput'.PHP_EOL;
	}
}
$handler = new MethodsDelete($requestData);
?>