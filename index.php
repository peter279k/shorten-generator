<?php
	require 'vendor/autoload.php';
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;

	$router = new League\Route\RouteCollection;

	$router->addRoute('GET', '/', function (Request $request, Response $response) {
		// do something clever
		if(file_exists("index.html")) {
    			echo file_get_contents("index.html");
		}
		else {
			echo "index file not found.";
		}
		return $response;
	});

	$router->addRoute('GET', '/js/index.js', function (Request $request, Response $response) {
		// do something clever
		if(file_exists("index.js")) {
    			echo file_get_contents("index.js");
		}
		else {
			echo "index.js file not found.";
		}
		return $response;
	});

	$router->addRoute('POST', '/post/url', function (Request $request, Response $response) {
		// do something clever
		print_r($request);
		return $response;
	});

	$dispatcher = $router->getDispatcher();

	$request = Request::createFromGlobals();
	var_dump($request);
	$response = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());

	$response->send();