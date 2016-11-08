<?php

$worlds = array_diff(scandir($GLOBALS['worlddir'], 1), array('..', '.'));
foreach($worlds as $world) {
	$row = new Template($GLOBALS['root'].'/templates/world-list-item.tpl');
	$row->set('world_name', $world);
	
	$worldTemplates[] = $row;
}

$worldContents = Template::merge($worldTemplates);

$tempContent = new Template($GLOBALS['root'].'/templates/world-list.tpl');
$tempContent->set('world_list', $worldContents);

?>