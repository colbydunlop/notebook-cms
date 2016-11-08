<?php

if (!isset($_POST['page_name'])) {
	$tempContent = new Template($GLOBALS['root'].'/templates/page-form.tpl');
} else {
	
	$newPage = new Page($_POST['page_name'], $_POST['page_desc']);
	
	$tempContent = new Template($GLOBALS['root'].'/templates/notification.tpl');
	$tempContent->set('return_message', $newPage->output()); 	
}

?>
