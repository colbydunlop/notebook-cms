<?php

$pageName = $GLOBALS['uri'];

$contentData = file_get_contents('page/'.$pageName.'.md');

$config_array = parse_ini_file(__DIR__.'/config.ini');

include(__DIR__.'/proccess.php');


$tempHead = new Template(__DIR__.'/head.tpl');
$tempHead->set("page_uc", ucfirst($pageName));
$tempHead->set("site", $config_array['site_name']); 
$tempHead->set("page", $pageName);

$tempContent = new Template(__DIR__."/content.tpl");
$tempContent->set('page_name', $pageName);
$tempContent->set('main_content', $contentData);

$tempTail = new Template(__DIR__."/tail.tpl");

echo $tempHead->output(), $tempContent->output(), $tempTail->output();

?>