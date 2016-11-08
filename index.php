<?php

$uriArray = explode("/", $_SERVER["REQUEST_URI"]);
$uri = $uriArray[1];
$uri2 = $uriArray[2];

$root = $_SERVER['DOCUMENT_ROOT'];

if ($uri == '') {
	
	$GLOBALS['uri'] = 'home';
	
	include('core/page.php');
	
} else {
	
	if (file_exists("data/worlds/".$uri)){
		
		session_start();
		$_SESSION['world'] = $uri;
		
		
		if ($uri2 == '') {
			
			include('core/page.php');
			
		} else {
			
			if (file_exists('data/worlds/'.$uri.'/pages/'.$uri2) OR $uri2 == 'new-page') {
				
				include('core/page.php');
				
			} else {
				
				echo "Page: ".$uri2." not found";
				
			}
		}
		
	} else {
		
		if ($uri == 'new-world') {
			
			include('core/page.php');
			
		} else {
			
			echo "World: ".$uri." not found";
			
		}
	}
}

?>