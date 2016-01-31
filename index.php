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

	$router -> post('/post/url', function() {
		$serviceName = filter_input(INPUT_POST, "sel-service");
		$longUrl = filter_input(INPUT_POST, "longUrl");
		if(isset($serviceName) && isset($longUrl)) {
			$key = file_get_contents("auth/key.txt");
			$key = json_decode($key, true);
			if($serviceName === "goo.gl") {
				$config = array(
        					'service-name' => $serviceName,
        					'longUrl' => $longUrl,
        					'apiKey' => $key[$serviceName]
  				);
			}
			else if($serviceName === "bit.ly") {
				$config = array(
        					'service-name' => $serviceName,
        					'longUrl' => $longUrl,
        					'apiKey' => $key[$serviceName]["apiKey"],
        					'login' => $key[$serviceName]["login"]
  				);	
			}
			else {
				$config = array(
        					'service-name' => $serviceName,
        					'longUrl' => $longUrl
  				);
			}

  			$bundle = new  \peter\components\serviceBundle\serviceBundle($config);
  			print_r($bundle -> sendReq());
		}
		else {
			echo "Oops ! no data input";
		}
	});

	$router->set404(function() {
		header('HTTP/1.1 404 Not Found');
		// ... do something special here
		echo file_get_contents("404.html");
	});

	$router -> run();