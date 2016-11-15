<?php

$pages = array_diff(scandir($GLOBALS['worlddir'].'/pages', 1), array('..', '.'));
foreach($pages as $page) {
	$row = new Template($GLOBALS['root'].'/templates/page-list-item.tpl');
	$row->set('world_name', $_SESSION['world']);
	$row->set('page_name', $page);
	
	$pageTemplates[] = $row;
}

$pageContents = Template::merge($pageTemplates);

$tempContent = new Template($GLOBALS['root'].'/templates/list.tpl');
$tempContent->set('list', $pageContents);

?>