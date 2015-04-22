<?php namespace zephinzer\Bootstrap;
require_once __DIR__.'/../Exceptions/MissingArguments.php';
require_once __DIR__.'/APIEndPointInterface.php';
require_once __DIR__.'/DB.php';

/**
 * @name APIEndPoint
 * @author <zephinzer> Joseph Matthias Goh (joseph-at-joeir-dot-net)
 * 
 * This abstract class was written with an Inversion of Control usage
 * pattern in mind. Extend this class and implement APIEndPointInterface 
 * with each function body containing only processing code on the protected
 * instance variables $inputData and $outputData.
 * 
 * Use new ExtendedAPIEndPoint($inputData) to specify input and trigger
 * 	off processing cascade.
 * 		- Set an array key in $inputData with key name FLAG_BREAKPOINT
 * 			to have the cascade break AFTER a certain stage is over
 * 		- The value of the above array key specifies which stage to break at
 * 		- See APIEndPoint::<CONSTANTS> for more information
 * 
 * Use getOutput() to retrieve the output.
 * 
 * --------------------------------------------------------------------------
 * 
 * Workflow:
 * 
 * APIEndPoint		Call Path		Child class		Condition
 * ^^^^^^^^^^^		^^^^^^^^^		^^^^^^^^^^^		^^^^^^^^^
 * __construct()	<--------		__construct()	-
 * 
 * __construct()	---\							$stage != $breakAt
 * getInput()		<--/							-
 * 
 * getInput()		-------->		getInput()		-
 * 
 * getInput()		---\							$stage != $breakAt
 * verifyInput()	<--/							-
 * 
 * verifyInput()	-------->		verifyInput()	-
 * 
 * verifyInput()	---\							$stage != $breakAt
 * process()		<--/							-
 * 
 * process()		-------->		process()		-
 * 
 * process()		---\							$stage != $breakAt
 * verifyOutput()	<--/							-
 * 
 * verifyOutput()	-------->		verifyOutput()	-
 * verifyOutput()	---|[END]
 * 
 * --------------------------------------------------------------------------
 * 
 * Class overview
 * 
 * <CONSTANTS>
 * 		FLAG_BREAKPOINT
 * 		STAGE_CONSTRUCT
 * 		STAGE_GETINPUT
 * 		STAGE_VERIFYINPUT
 * 		STAGE_PROCESS
 * 		STAGE_VERIFYOUTPUT
 * 		STAGE_GETOUTPUT
 * </CONSTANTS>
 * <VARIABLES>
 * 		$inputData
 * 		$outputData
 * 		$messagesWarnings
 * 		$messagesErrors
 * 		$stage
 * 		$breakAt
 * </VARIABLES>
 * <METHODS>
 * 		<PRIVATE_METHODS>
 * 			verifyArrayExists($varToCheck)
 * 		</PRIVATE_METHODS>
 * 		<PROTECTED_METHODS>
 * 			setWarning($message, $code = 0)
 * 			setError($message, $code = -1)
 * 		</PROTECTED_METHODS>
 * 		<PUBLIC_METHODS>
 * 			__construct($inputData)
 * 			getInput()
 * 			verifyInput()
 * 			process()
 * 			verifyOutput()
 * 			getOutput()
 * 			getWarnings()
 * 			getErrors()
 * 			__toString()
 * 		</PUBLIC_METHODS>
 * </METHODS>
 * 
 * --------------------------------------------------------------------------
 * 
 */
abstract class APIEndPoint implements APIEndPointInterface {
/**
 * --------------------------------------------------------------------------
 * <CONSTANTS>
 * --------------------------------------------------------------------------
 */
	const FLAG_BREAKPOINT = 'nyajAPIEndPointBreakPoint';
	const STAGE_CONSTRUCT = 0;
	const STAGE_GETINPUT = 1;
	const STAGE_VERIFYINPUT = 2;
	const STAGE_PROCESS = 3;
	const STAGE_VERIFYOUTPUT = 4;
	const STAGE_GETOUPUT = 5;
/**
 * --------------------------------------------------------------------------
 * <CONSTANTS>
 * --------------------------------------------------------------------------
 */
/**
 * --------------------------------------------------------------------------
 * <VARIABLES>
 * --------------------------------------------------------------------------
 */
	/**
	 * Input data into the constructor is stored here.
	 * @var mixed
	 */
	protected $inputData;
	/**
	 * Output data which getOutput() returns is stored here.
	 * @var mixed
	 */
	protected $outputData;
	/**
	 * Warning messages
	 * @var array[string]
	 */
	protected $messagesWarnings;
	/**
	 * Error messages
	 * @var array[string]
	 */
	protected $messagesErrors;
	/**
	 * Current stage of the workflow.
	 * @see \Nyaj\Todos\Bootstrap\APIEndPoints::<CONSTANTS>
	 * @var number
	 */
	protected $stage;
	/**
	 * If this is set, the workflow will break AFTER the specified breakpoint
	 * indicated by the value.
	 * @see \Nyaj\Todos\Bootstrap\APIEndPoints::<CONSTANTS>
	 * @var number
	 */
	private $breakAt;
/**
 * --------------------------------------------------------------------------
 * </VARIABLES>
 * --------------------------------------------------------------------------
 */	
	
/**
 * --------------------------------------------------------------------------
 * <METHODS>
 * --------------------------------------------------------------------------
 */
 
/**
 * --------------------------------------------------------------------------
 * 		<PRIVATE_METHODS>
 * --------------------------------------------------------------------------
 */
	/**
	 * Returns the input variable if it is an array,
	 * if not, creates a new array and returns it.
	 * 
	 * @param $varToCheck mixed
	 * @return array
	 */
	private function verifyArrayExists($varToCheck) {
		if(is_array($varToCheck)) {
			return $varToCheck;
		}
		return array();
	}
 
/**
 * --------------------------------------------------------------------------
 * 		</PRIVATE_METHODS>
 * --------------------------------------------------------------------------
 */
 
/**
 * --------------------------------------------------------------------------
 * 		<PROTECTED_METHODS>
 * --------------------------------------------------------------------------
 */
	/**
	 * Inputs a warning message. Default warning code is 0.
	 * @param $message string
	 * @param $code number
	 * @param $exception \Exception
	 * @return void
	 */
	protected function setWarning($message, $code = 0) {
		$newWarningMessage = '';
		if($code != 0) {
			$newWarningMessage .= "WARNING[$code]: "; 
		}
		$this->messagesWarnings =
			$this->verifyArrayExists($this->messagesWarnings);
		array_push($this->messagesWarnings, $newWarningMessage.$message);
	}
	
	/**
	 * Inputs an error message. Default error code is -1.
	 * @param $message string
	 * @param $code number
	 * @param $exception \Exception
	 * @return void
	 */
	protected function setError($message, $code = -1) {
		$newErrorMessage = '';
		if($code != 0) {
			$newErrorMessage .= "WARNING[$code]: "; 
		}
		$this->messagesWarnings =
			$this->verifyArrayExists($this->messagesWarnings);
		array_push($this->messagesErrors, $newErrorMessage.$message);
	}
/**
 * --------------------------------------------------------------------------
 * 		</PROTECTED_METHODS>
 * --------------------------------------------------------------------------
 */
 
/**
 * --------------------------------------------------------------------------
 * 		<PUBLIC_METHODS>
 * --------------------------------------------------------------------------
 */
	/**
	 * Initiates the procressing by taking in
	 * $inputData and storing it in $this->inputData.
	 * Calls getInput() on completion.
	 * 
	 * @param $inputData mixed
	 * @return void
	 */
	public function __construct($inputData) {
		$this->stage = static::STAGE_CONSTRUCT;
		$this->inputData = $inputData;
		if(array_key_exists(static::FLAG_BREAKPOINT, $this->inputData)) {
			$this->breakAt = $this->inputData[static::FLAG_BREAKPOINT];
		}
		if($this->breakAt === ($this->stage = static::STAGE_CONSTRUCT)) {
			return;
		}
		self::getInput();
	}
	
	/**
	 * Called by the constructor function. Calls
	 * the child implementation of getInput before
	 * calling verifyInput().
	 * 
	 * @param void
	 * @return void
	 */
	public function getInput() {
		$this->getInput();
		if($this->breakAt === ($this->stage = static::STAGE_GETINPUT)) {
			return;
		}
		self::verifyInput();
	}
	
	/**
	 * Throws an exception if $this->inputData
	 * is invalid.
	 * 
	 * @param void
	 * @throws mixed
	 * @return void
	 */
	public function verifyInput() {
		$this->verifyInput();
		if($this->breakAt === ($this->stage = static::STAGE_VERIFYINPUT)) {
			return;
		}
		self::process();
	}
	
	/**
	 * Manipulate $this->inputData and populate
	 * $this->outputData with the result.
	 * @param void
	 * @return void
	 */
	public function process() {
		$this->process();
		if($this->breakAt === ($this->stage = static::STAGE_PROCESS)) {
			return;
		}
		self::verifyOutput();
	}
	
	/**
	 * Verifies the integrity of $this->outputData.
	 * 
	 * @param void
	 * @throws mixed
	 * @return void 
	 */
	public function verifyOutput() {
		$this->verifyOutput();
		if($this->breakAt === ($this->stage = static::STAGE_VERIFYOUTPUT)) {
			return;
		}
		self::getOutput();
	}
	
	/**
	 * Returns $this->outputData.
	 * 
	 * @param void
	 * @return mixed
	 */
	public function getOutput() {
		return $this->outputData;
	}
	
	/**
	 * Returns all warnings as an array of strings.
	 * 
	 * @param void
	 * @return array[string]
	 */
	public function getWarnings() {
		return $this->messagesWarnings;
	}
	
	/**
	 * Returns all errors as an array of strings.
	 * 
	 * @param void
	 * @return array[string]
	 */
	public function getErrors() {
		return $this->messagesErrors;
	}
	
	/**
	 * Performs a json_encode() on internal variables in 
	 * this instance of APIEndPoint and returns it. If $echo
	 * is set to TRUE, message will be printed, otherwise
	 * it is returned.
	 * 
	 * @param void
	 * @return string
	 */
	public function __toString() {
		$retval = PHP_EOL.'-- #begin | APIEndPoint.__toString() | #begin --'.PHP_EOL.'INPUT:';
		$retval .= json_encode($this->inputData);
		$retval .= PHP_EOL.PHP_EOL.'OUTPUT:';
		$retval .= json_encode($this->outputData);
		$retval .= PHP_EOL.'-- #end | APIEndPoint.__toString() | #end --'.PHP_EOL;
		return $retval;
	}
/**
 * --------------------------------------------------------------------------
 * 		</PUBLIC_METHODS>
 * --------------------------------------------------------------------------
 */
	
/**
 * --------------------------------------------------------------------------
 * </METHODS>
 * --------------------------------------------------------------------------
 */
}
?>