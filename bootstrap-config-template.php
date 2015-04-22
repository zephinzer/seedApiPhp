<?php namespace zephinzer\Application;
/**
 * Fill up all fields indicated by [[VALUE]] to get started.
 */
/**
 * ---------------------------------------------------------------------------------------------------
 * <SLIM_CONFIGURATION>
 * ---------------------------------------------------------------------------------------------------
 */
/**
 * 'REL'	: release
 * 'DEV'	: development
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_APP_MODE', 'DEV');
/**
 * Your decided hostname. For example if your site is accessible
 * at api.yourdomain.com, the value will be that.
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_DOMAIN', '[[VALUE]]');
/**
 * Root URL of your application.
 * Eg. Access this application at http://yourdomain.com/, it's '/'
 * Access this application at http://yourdomain.com/yourapp/, it's '/yourapp/'
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_URLROOT', '/');
/**
 * A random string used for cookies security. Generate one at
 * @see http://hash.online-convert.com/sha512-generator
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_COOKIES_SECRET', 'dfb7a5da5b547d2ae057d4fb696e0873fcb5219f');
/**
 * Duration which cookies will survive
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_COOKIES_TTL', '20 minutes');
/**
 * Debug mode
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_DEBUG', 'true');
/**
 * Log details with Slim?
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_LOG_ENABLED', TRUE);
/**
 * Level of log details (only applicable if above is TRUE)
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_LOG_LEVEL', \Slim\Log::DEBUG);
/**
 * Version of HTTP
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_HTTP_VERSION', '1.1');
/**
 * Where should Slim look for files to render by default?
 * './' refers to the directory it is hosted in.
 */
define('ZEPHINZER_BOOSTRAP_SLIM_CONFIG_TEMPLATES_PATH', './');
/**
 * ---------------------------------------------------------------------------------------------------
 * </SLIM_CONFIGURATION>
 * ---------------------------------------------------------------------------------------------------
 */
/**
 * ---------------------------------------------------------------------------------------------------
 * <DATABASE_CONFIGURATION>
 * ---------------------------------------------------------------------------------------------------
 */
define('ZEPHINZER_BOOTSTRAP_DB_USERNAME', '[[VALUE]]');
define('ZEPHINZER_BOOTSTRAP_DB_PASSWORD', '[[VALUE]]');
define('ZEPHINZER_BOOTSTRAP_DB_HOST', '127.0.0.1');
define('ZEPHINZER_BOOTSTRAP_DB_NAME', '[[VALUE]]');
/**
 * ---------------------------------------------------------------------------------------------------
 * </DATABASE_CONFIGURATION>
 * ---------------------------------------------------------------------------------------------------
 */
?>