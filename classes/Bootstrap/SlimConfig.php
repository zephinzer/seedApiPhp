<?php namespace Nyaj\Bootstrap;
/**
 * This class holds configuration information for the Slim microframework.
 * Additional information can be found at the website stated below:
 * @see http://docs.slimframework.com/
 */
class SlimConfig {
	/**
	 * --------------------------------------------------------------------
	 * Begin user configuration region
	 * --------------------------------------------------------------------
	 */
	const APP_MODE = 'DEV';
	const COOKIES_CIPHER = MCRYPT_RIJNDAEL_256;
	const COOKIES_CIPHER_MODE = MCRYPT_MODE_CBC;
	const COOKIES_DOMAIN = 'api.nyajtodo.com';
	const COOKIES_ENCRYPT = TRUE;
	const COOKIES_HTTPONLY = TRUE;
	const COOKIES_PATH = '/';
	const COOKIES_TTL = '20 minutes';
	const COOKIES_SECRET = 'dfb7a5da5b547d2ae057d4fb696e0873fcb5219f';
	const COOKIES_SECURE = TRUE;
	const DEBUG_MODE = 'true';
	const HTTP_VERSION = '1.1';
	const LOG_ENABLED = TRUE;
	const LOG_LEVEL = \Slim\Log::DEBUG;
	const TEMPLATES_PATH = './';
	/**
	 * --------------------------------------------------------------------
	 * Finish user configuration region
	 * --------------------------------------------------------------------
	 */
	 
	/**
	 * --------------------------------------------------------------------
	 * Do not touch anything below this
	 * --------------------------------------------------------------------
	 */
	 
	/**
	 * Returns a global configuration array.
	 * @return array
	 */
	public static function get() { return static::$slimConfiguration; }
	
	/**
	 * Configuration array returned by get()
	 */
	private static $slimConfiguration = array(
		/**
		 * The mcrypt cipher used for HTTP cookie encryption. See
		 * available ciphers at this link:
		 * http://php.net/manual/en/mcrypt.ciphers.php
		 */
		'cookies.cipher' => SlimConfig::COOKIES_CIPHER,
		/**
		 * The mcrypt cipher mode used for HTTP cookie encryption.
		 * See available cipher modes at this link:
		 * http://php.net/manual/en/mcrypt.constants.php
		 */
		'cookies.cipher_mode' => SlimConfig::COOKIES_CIPHER_MODE,
		/**
		 * Determines the default HTTP cookie domain if none specified
		 * when invoking the Slim application’s setCookie() or
		 * setEncryptedCookie() methods.
		 */
		'cookies.domain' => SlimConfig::COOKIES_DOMAIN,
		/**
		 * Determines if the Slim app should encrypt its HTTP cookies.
		 */
		'cookies.encrypt' => SlimConfig::COOKIES_ENCRYPT,
		/**
		 * Determines whether cookies should be accessible through
		 * client side scripts (false = accessible). You may override
		 * this setting when invoking the Slim application’s setCookie()
		 * or setEncryptedCookie() methods.
		 */
		'cookies.httponly' => SlimConfig::COOKIES_HTTPONLY,
		/**
		 * Determines the lifetime of HTTP cookies created by the Slim
		 * application. If this is an integer, it must be a valid UNIX
		 * timestamp at which the cookie expires. If this is a string,
		 * it is parsed by the strtotime() function to extrapolate a valid
		 * UNIX timestamp at which the cookie expires.
		 */
		'cookies.lifetime' => SlimConfig::COOKIES_TTL,
		/**
		 * Determines the default HTTP cookie path if none is specified when
		 * invoking the Slim application’s setCookie() or setEncryptedCookie()
		 * methods.
		 */
		'cookies.path' => SlimConfig::COOKIES_PATH,
		/**
		 * The secret key used for cookie encryption. You should change this
		 * setting if you use encrypted HTTP cookies in your Slim application.
		 */
		'cookies.secret_key' => SlimConfig::COOKIES_SECRET,
		/**
		 * Determines whether or not cookies are delivered only via HTTPS.
		 * You may override this setting when invoking the Slim application’s
		 * setCookie() or setEncryptedCookie() methods.
		 */
		'cookies.secure' => SlimConfig::COOKIES_SECURE,
		/**
		 * If debugging is enabled, Slim will use its built-in error handler to
		 * display diagnostic information for uncaught Exceptions. If debugging
		 * is disabled, Slim will instead invoke your custom error handler, passing
		 * it the otherwise uncaught Exception as its first and only argument.
		 */
		'debug' => SlimConfig::DEBUG_MODE,
		/**
		 * By default, Slim returns an HTTP/1.1 response to the client. Use this
		 * setting if you need to return an HTTP/1.0 response. This is useful if
		 * you use PHPFog or an nginx server configuration where you communicate
		 * with backend proxies rather than directly with the HTTP client.
		 */
		'http.version' => SlimConfig::HTTP_VERSION,
		/**
		 * This enables or disables Slim’s logger. To change this setting after
		 * instantiation you need to access Slim’s logger directly and use its
		 * setEnabled() method.
		 */
		'log.enabled' => SlimConfig::LOG_ENABLED,
		/**
		 * Slim has these log levels:
		 * \Slim\Log::EMERGENCY
		 * \Slim\Log::ALERT
		 * \Slim\Log::CRITICAL
		 * \Slim\Log::ERROR
		 * \Slim\Log::WARN
		 * \Slim\Log::NOTICE
		 * \Slim\Log::INFO
		 * \Slim\Log::DEBUG
		 * The log.level application setting determines which logged messages will
		 * be honored and which will be ignored. For example, if the log.level
		 * setting is \Slim\Log::INFO, debug messages will be ignored while info,
		 * warn, error, and fatal messages will be logged.
		 */
		'log.level' => SlimConfig::LOG_LEVEL,
		/**
		 * This is an identifier for the application’s current mode of operation.
		 * The mode does not affect a Slim application’s internal functionality.
		 * Instead, the mode is only for you to optionally invoke your own code
		 * for a given mode with the configMode() application method.
		 * // Only invoked if mode is "rel"
		 * $app->configureMode('rel', function () use ($app) {
		 * 		$app->config(array(
		 * 			'log.enable' => true,
		 * 			'debug' => false
		 * 		));
		 * });
		 * // Only invoked if mode is "dev"
		 * $app->configureMode('dev', function () use ($app) {
		 * 		$app->config(array(
		 * 			'log.enable' => false,
		 * 			'debug' => true
		 * 		));
		 * });
		 */
		'mode' => SlimConfig::APP_MODE,
		/**
		 * The relative or absolute path to the filesystem directory that contains
		 * your Slim application’s template files. This path is referenced by the
		 * Slim application’s View to fetch and render templates.
		 */
		'templates.path' => SlimConfig::TEMPLATES_PATH,
	);
}
?>