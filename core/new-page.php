<?php
if (!isset($_POST['page_name'])) {
	$tempContent = new Template($root.'/templates/page-form.tpl');
} else {
	
	$newPage = new Page($_POST['page_name'], $_POST['page_desc']);
	
	$tempContent = new Template($root.'/templates/page-proccess.tpl');
	$tempContent->set('return_message', $newPage->output()); 	
}

?>
