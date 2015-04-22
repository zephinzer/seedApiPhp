<?php namespace zephinzer\Application;
require_once __DIR__.'/classes/SlimCustomViews/Prototype.php';

function configureRouting($application) {
	/**
	 * Redirect visitor to the main page.
	 */
	$application->get('/', function() use ($application) {
		header('Location: nyajtodo.com', 302);
	})->name('LANDING_PAGE');
	
	/**
	 * Searches for all files with filename ending with '_routing.php' inside the 
	 * folder /public and includes them.
	 */
	$directory = new \RecursiveDirectoryIterator(__DIR__.DIRECTORY_SEPARATOR.'public');
	$iterator = new \RecursiveIteratorIterator($directory, \RecursiveIteratorIterator::SELF_FIRST);
	$regex = new \RegexIterator($iterator, '/^.+\_routing.php$/i', \RecursiveRegexIterator::GET_MATCH);
	foreach($regex as $fileIndex) {
		foreach($fileIndex as $filePath) {
			require_once $filePath;
		}
	}
}
?>