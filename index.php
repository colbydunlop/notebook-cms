<?php

$uri = trim($_SERVER["REQUEST_URI"],"/");

$root = $_SERVER['DOCUMENT_ROOT'];

if ($uri == '') {
	
	$GLOBALS['uri'] = 'home';
	
	include('core/page.php');
	
} else {
	
	if (file_exists("page/".$uri.".md")){
		
		include('core/page.php');
		
	} else {
		
		echo "page: ".$uri." not found";
		
	}
}

?>