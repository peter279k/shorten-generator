<?php
	require __DIR__ . '/vendor/autoload.php';

	// Create Router instance
	$router = new \Bramus\Router\Router();

	// Good
	$router->get('/hello/(\w+)', function($name) {
		echo 'Hello ' . htmlentities($name);
	});

	$router -> run();