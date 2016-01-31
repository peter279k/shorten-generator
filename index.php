<?php
	require_once __DIR__ . '/vendor/autoload.php';
	
	$router = new \Bramus\Router\Router();

	$router -> get('/', function() {
		// do something clever
		if(file_exists("index.html")) {
    			echo file_get_contents("index.html");
		}
		else {
			echo "index file not found.";
		}
	});

	$router -> get('/js/index.js', function () {
		// do something clever
		if(file_exists("index.js")) {
    			echo file_get_contents("index.js");
		}
		else {
			echo "index.js file not found.";
		}
		return $response;
	});

	$router -> run();