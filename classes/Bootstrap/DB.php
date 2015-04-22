<?php namespace zephinzer\Bootstrap;
require_once __DIR__.'/DBInterface.php';

/**
 * A singleton class for accessing the database as configured in its 
 * accompanying DBConfig class.
 * @author Joseph Matthias Goh
 */
class DB implements DBInterface {
/**
 * --------------------------------------------------------------------------
 * <CONSTANTS>
 * --------------------------------------------------------------------------
 */
 	/**
	 * Database username
	 */
	const USER = ZEPHINZER_BOOTSTRAP_DB_USERNAME;
	/**
	 * Database password
	 */
	const PASS = ZEPHINZER_BOOTSTRAP_DB_PASSWORD;
	/**
	 * Database host IP address/hostname
	 */
	const HOST = ZEPHINZER_BOOTSTRAP_DB_HOST;
	/**
	 * Database name
	 */
	const NAME = ZEPHINZER_BOOTSTRAP_DB_NAME;
/**
 * --------------------------------------------------------------------------
 * </CONSTANTS>
 * --------------------------------------------------------------------------
 */
/**
 * --------------------------------------------------------------------------
 * <VARIABLES>
 * --------------------------------------------------------------------------
 */
	private static $db = NULL;
	private static $errorMessage = NULL;
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
	private function __construct($hostname, $dbname, $username, $password) {
		try {
			static::$db = new \PDO(
				"mysql:host=$hostname;dbname=$dbname;charset=utf8",
				$username, $password, array(
					\PDO::ATTR_EMULATE_PREPARES => false,
					\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
				)
			);
		} catch(\PDOException $pdoex) {
			static::$db = NULL;
			$errorMessage = $pdoex->getMessage();
		}
	}
/**
 * --------------------------------------------------------------------------
 * 		</PRIVATE_METHODS>
 * --------------------------------------------------------------------------
 */	
/**
 * --------------------------------------------------------------------------
 * 		<PUBLIC_STATIC_METHODS>
 * --------------------------------------------------------------------------
 */
	public static function get() {
		if(!isset(static::$db)) {
			new DB(
				static::HOST,
				static::NAME,
				static::USER,
				static::PASS
			);
		}
		return static::$db;
	}
/**
 * --------------------------------------------------------------------------
 * 		</PUBLIC_STATIC_METHODS>
 * --------------------------------------------------------------------------
 */
/**
 * --------------------------------------------------------------------------
 * </METHODS>
 * --------------------------------------------------------------------------
 */
}
?>