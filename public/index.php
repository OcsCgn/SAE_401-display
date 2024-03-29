<?php
session_start();

require_once '../vendor/autoload.php';
require_once '../src/controller/auth.php';
require_once '../src/controller/import.php';
require_once '../src/controller/disconnect.php';

$router = new AltoRouter();

$router->map('GET', '/',       function () {
	if(isLogged()) {
		header("Location: /import");
	} else {
		include '../src/view/auth.html';
	}
});

$router->map('GET', '/import', function () {
	if(isLogged()) {
		include '../src/view/import.html';
	} else {
		header("Location: /");
		exit();
	}
});

$router->map('GET', '/display' , function() {
	if(isLogged()) {
		include '../src/view/display.html';
	} else {
		header("Location: /");
		exit();
	}
});

$router->map('GET', '/export' , function() {
	if(isLogged()) {
		include '../src/view/export.html';
	} else {
		header("Location: /");
		exit();
	}
});

$router->map('GET', '/disconnect', function() {
	if(isLogged()) {
		disconnect();
	} else {
		header("Location: /");
	}
});

$router->map('GET', '/displayAjax', function() {
	if(isLogged()) {

	} else {
		header("Location: /");
	}
});

$router->map('POST', '/auth'      , function() { auth()      ; });
$router->map('POST', '/importXlsx', function() { import()    ; });

function isLogged() {
	return isset($_SESSION['user_id']);
}

$match = $router->match();

if ($match && is_callable($match['target'])) {
	call_user_func_array($match['target'], $match['params']);
} else {
	header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
	echo 'Page not found';
}

?>