<?php namespace zephinzer\Todos\Exceptions;
require_once __DIR__.'/CustomException.php';

class MissingArguments extends CustomException {
	private $argumentList = array();
	/**
	 * Constructs the MissingArguments exception for the variables
	 * in $missingArguments (can be array or a single variable name)
	 * @var $missingArguments Array|string
	 * @var $code Identifier of the route
	 */
	public function __construct($missingArguments = null, $code = 0) {
		if(is_array($missingArguments)) {
			$message = "The API call failed because of the following missing arguments: ".PHP_EOL;
			$counter = 1;
			foreach($message as $varName) {
				$message .= "$counter) '$variableName'".PHP_EOL;
				array_push($this->argumentList, $varName);
				$counter++;
			}
		} else {
			$message = "The API call failed because of the following missing argument: $message (error code:$code)";
		}
		parent::__construct($message, $code);
	}
	
	public function getArgumentList() {
		return $this->argumentList;
	}
}
?>