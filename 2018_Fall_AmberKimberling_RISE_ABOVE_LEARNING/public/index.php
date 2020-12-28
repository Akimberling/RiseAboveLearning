<?php
try {
	include __DIR__ . '/../includes/autoload.php';
	
	$route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');   

	if ($route == ltrim($_SERVER['REQUEST_URI'],  '/') ) 
	    $route = '';  	    
	else
	    $route = $_SERVER['QUERY_STRING']; 
      	
	if (strlen(strtok($route, '?')) <  strlen($route))  
	{ 
		if (strpos($route, 'id')){ 
		   $_GET['id'] = substr ($route, strlen(strtok($route, '?')) + 4, strlen($route)); 
		  }
		if (strpos($route, 'page') && strpos($route, 'category')) { 
		   $_GET['page'] =  substr($route, strpos($route, '=') + 1, strpos($route, '&') - strpos($route, '=') - 1 );
		
		   $_GET['category'] = substr ($route, strlen(strtok($route, '&')) + 10, strlen($route)); 
 
		}
		else {
		if (strpos($route, 'category')){
	       $_GET['category'] = substr ($route, strlen(strtok($route, '?')) + 10, strlen($route)); 

		  }
		if (strpos($route, 'page')){
	       $_GET['page'] = substr ($route, strlen(strtok($route, '?')) + 6, strlen($route)); 
		}
		} 
	
	$route = strtok($route, '?'); 
	}

	$entryPoint = new \Ninja\EntryPoint($route, $_SERVER['REQUEST_METHOD'], new \Raldb\RaldbRoutes());
	$entryPoint->run();
}
catch (PDOException $e) {
	$title = 'An error has occurred';

	$output = 'Database error: ' . $e->getMessage() . ' in ' .
	$e->getFile() . ':' . $e->getLine();

	include  __DIR__ . '/../templates/layout.html.php';
}
