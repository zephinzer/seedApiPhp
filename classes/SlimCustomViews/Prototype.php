<?php namespace zephinzer\Bootstrap\SlimCustomViews;

class Prototype extends \Slim\View {
	/**
	 * This should end with a trailing directory separator but not
	 * start with one.
	 */
	const STRING_BASE_ROUTE = '';
	
	public function render($view, $requestData) {
		require_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.
			static::STRING_BASE_ROUTE.$view.'.php';
	}
}
?>