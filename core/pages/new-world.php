<?php

if (!isset($_POST['world_name'])) {
	$tempContent = new Template($GLOBALS['root'].'/templates/world-form.tpl');
} else {
	
	$newWorld = new World($_POST['world_name'], $_POST['world_desc']);
	
	$tempContent = new Template($GLOBALS['root'].'/templates/notification.tpl');
	$tempContent->set('return_message', $newWorld->output());
	
}
	
?>