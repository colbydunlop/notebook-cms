<?php

$pageName = $GLOBALS['uri'];

$recoveredData = file_get_contents($GLOBALS['root'].'/page/'.$pageName.'.md');
$pageData = unserialize($recoveredData);

$config_array = parse_ini_file(__DIR__.'/config.ini');

include(__DIR__.'/proccess.php');


$tempHead = new Template(__DIR__.'/head.tpl');
$tempHead->set("page_uc", ucfirst($pageName));
$tempHead->set("site", $config_array['site_name']); 
$tempHead->set("page", $pageName);

if (file_exists(__DIR__.'/'.$pageName.'.php')) {
	include(__DIR__.'/'.$pageName.'.php');	
} else {
	include(__DIR__.'/content.php');	
}

$tempTail = new Template(__DIR__."/tail.tpl");

echo $tempHead->output(), $tempContent->output(), $tempTail->output();

?>