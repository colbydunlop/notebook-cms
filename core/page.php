<?php

include(__DIR__.'/page-variables.php');

$config_array = parse_ini_file(__DIR__.'/config.ini');

include(__DIR__.'/proccess.php');

$tempHead = new Template($GLOBALS['root'].'/templates/head.tpl');
$tempHead->set("page_uc", ucfirst($worldName));
$tempHead->set("site", $config_array['site_name']); 
$tempHead->set("page", $worldName);
$tempHead->set("script1", '/core/js/jquery-3.1.1.min.js');

if ($worldName == 'new-world' OR $worldName == 'home') {
	
	include(__DIR__.'/pages/'.$worldName.'.php');
	
} else {
	
	if ($pageName == 'new-page' OR $pageName == 'world') {
		include(__DIR__.'/pages/'.$pageName.'.php');	
	} else {
		
		if ($extraPage == 'update') {
			include(__DIR__.'/pages/'.$extraPage.'.php');	
		} else {
			include(__DIR__.'/content.php');	
		}	
	}
}

$tempTail = new Template($GLOBALS['root']."/templates/tail.tpl");
$tempTail->set("script1", '/core/js/jquery.js');
$tempTail->set("script2", '/core/js/script.js');

echo $tempHead->output(), $tempContent->output(), $tempTail->output();

?>