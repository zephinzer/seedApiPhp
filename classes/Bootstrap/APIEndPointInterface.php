<?php namespace zephinzer\Bootstrap;

interface APIEndPointInterface {
	/**
	 * Default constructor to call to initiate the other functions
	 */
	function __construct($in);
	/**
	 * Retrieve the input
	 */
	function getInput();
	/**
	 * Verify the input
	 */
	function verifyInput();
	/**
	 * Do the processing
	 */
	function process();
	/**
	 * Verify the output
	 */
	function verifyOutput();
	/**
	 * Return the output
	 */
	function getOutput();
}
?>