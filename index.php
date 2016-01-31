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

	$dispatcher = $router->getDispatcher();

	$response = $dispatcher->dispatch('GET', '/');

	$response->send();