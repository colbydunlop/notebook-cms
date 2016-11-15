<?php

include(__DIR__.'/page-variables.php');

if ( isset($_POST['block'])){
	
	$block = $_POST['block'];
	$field = $_POST['field'];
	$content = $_POST['content'];
	
	$pageData['data'][$block][$field] = $content;
	
	$path = ($GLOBALS['worlddir'].'/pages/'.$pageData['page']['name']);
	
	$serializedData = serialize($pageData);
	file_put_contents($path.'/'.$pageData['page']['name'].'.md', $serializedData);
		
}

$tempContent = new Template($GLOBALS['root'].'/templates/notification.tpl');
$tempContent->set('return_message', 'a okay');
?>