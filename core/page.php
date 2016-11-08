<?php

$worldName = $GLOBALS['uri'];
$pageName = $GLOBALS['uri2'];

$GLOBALS['worlddir'] = ($GLOBALS['root'].'/data/worlds/'.$_SESSION['world']);

$recoveredData = file_get_contents($GLOBALS['root'].'/data/worlds/'.$_SESSION['world'].'/pages/'.$pageName.'/'.$pageName.'.md');
$pageData = unserialize($recoveredData);

$config_array = parse_ini_file(__DIR__.'/config.ini');

include(__DIR__.'/proccess.php');


$tempHead = new Template($GLOBALS['root'].'/templates/head.tpl');
$tempHead->set("page_uc", ucfirst($worldName));
$tempHead->set("site", $config_array['site_name']); 
$tempHead->set("page", $worldName);

if ($worldName == 'new-world' OR $worldName == 'home') {
	
	include(__DIR__.'/pages/'.$worldName.'.php');
	
} else {
	
	if ($pageName == 'new-page') {
		include(__DIR__.'/pages/'.$pageName.'.php');	
	} else {
		include(__DIR__.'/content.php');	
	}
}

$tempTail = new Template($GLOBALS['root']."/templates/tail.tpl");

echo $tempHead->output(), $tempContent->output(), $tempTail->output();

?>