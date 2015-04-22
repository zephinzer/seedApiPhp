<?php namespace zephinzer\Application\API\Agendas\Routing;
/**
 * This script requires an $application variable to be predefined which
 * is of type \Slim\Slim.
 * 
 * Request data will be stored as a variable name as defined in the 
 * \Nyaj\Bootstrap\SlimCustomViews\Prototype class.
 */
$application->get('/demo', function() use ($application) {
	$application->
		view('zephinzer\Bootstrap\SlimCustomViews\Prototype')->
		render('public/demo/methods/get', $application->request->get());
})->name('DEMO_GET');
$application->post('/demo', function() use ($application) {
	$application->
		view('zephinzer\Bootstrap\SlimCustomViews\Prototype')->
		render('public/demo/methods/post', $application->request->post());
})->name('DEMO_POST');
$application->put('/demo', function() use ($application) {
	$application->
		view('zephinzer\Bootstrap\SlimCustomViews\Prototype')->
		render('public/demo/methods/put', $application->request->put());
})->name('DEMO_PUT');
$application->delete('/demo', function() use ($application) {
	$application->
		view('zephinzer\Bootstrap\SlimCustomViews\Prototype')->
		render('public/demo/methods/delete', $application->request->delete());
})->name('DEMO_DELETE');