<?php namespace Nyaj\Todos\Utility;

class Functions {
	/**
	 * Returns TRUE if there are GET parameters
	 */
	public static function assertGetParametersExist() {
		return $_GET != NULL;
	}
	
	/**
	 * Checks to see if certain keys are present in in $data.
	 * 
	 * @param \stdClass $data
	 * @throws \Nyaj\Todos\Exceptions\MissingArguments
	 * @return void
	 */
	public static function assertKeysExist(\stdClass $data) {
		$argv = func_get_args();
		$argc = count($argv);
		$missingArguments = array();
		for($i = 1; $i < $argc; ++$i) {
			$objectName = $argv[$i];
			if(!isset($data->$objectName)) {
				array_push($missingArguments, $objectName);
			} elseif(is_string($data->$objectName) && strlen($data->$objectName) == 0) {
				array_push($missingArguments, $objectName);
			}
		}
		if(count($missingArguments) > 0) {
			throw new \Nyaj\Todos\Exceptions\MissingArguments($missingArguments);
		}
	}
	
	/**
	 * Returns TRUE if there are POST parameters
	 * 
	 * @return boolean
	 */
	public static function assertPostParametersExist() {
		return $_POST != NULL;
	}
	
	/**
	 * Cleans data and removes possibility of SQL injections.
	 * Returns an array containing a safe $data.
	 * 
	 * @param $data array
	 * @return array
	 */
	public static function clean(array $data)  {
		if(!is_array($data)) {
			$data = htmlentities($data, ENT_QUOTES, "UTF-8"); 
		} else {
			$counter = 0;
			foreach ($data as $key => $value) {
				$data[$key] = static::urlClean($value);
				++$counter;
			}
		}
		return $data; 
	}
}
?>
