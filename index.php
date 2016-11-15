<?php

$uriArray = explode("/", $_SERVER["REQUEST_URI"]);
$uri = $uriArray[1];
$uri2 = $uriArray[2];
$uri3 = $uriArray[3];

$root = $_SERVER['DOCUMENT_ROOT'];

if ($uri == '') {
	
	$GLOBALS['uri'] = 'home';
	
	include('core/page.php');
	
} else {
	
	if (file_exists("data/worlds/".$uri)){
		
		session_start();
		$_SESSION['world'] = $uri;
		
		
		if ($uri2 == '') {
			
			$GLOBALS['uri2'] = 'world';
			include('core/page.php');
			
		} else {
			
			if (file_exists('data/worlds/'.$uri.'/pages/'.$uri2) OR $uri2 == 'new-page') {
				
				if ($uri3 == '') {
					
					include('core/page.php');
					
				} else {
					
					if ($uri3 == 'update') {
						
						include('core/page.php');
						
					} else {
						
						echo "Page: ".$uri3." not found";
						
					}
				}
				
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