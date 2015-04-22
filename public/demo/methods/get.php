<?php namespace zephinzer\Application\API\Demo;
require_once __DIR__.'/../../../classes/Bootstrap/APIEndPoint.php';

class MethodsGet extends \zephinzer\Bootstrap\APIEndPoint {
	public function __construct($inputData = NULL) {
		echo 'MethodsGet: '.PHP_EOL;
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
		$this->outputData = 'data retreived && output generated';
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
$handler = new MethodsGet($requestData);
?>