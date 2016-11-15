<?php

$data = $pageData['data'];
$blockData = $pageData['block'];

foreach ($data as $key => $value) {
	foreach ($value as $field => $content) {
		foreach ($blockData as $blockField => $fieldTemp) {
			if ($field == $blockField) {
				$row = new Template($GLOBALS['root'].'/templates/fields/'.$fieldTemp.'.tpl');
				$row->set('content', $content);
				$row->set('key', $field);
				
				$blockTemplates[] = $row;
			}
		}
	}
	
	$blockContents = Template::merge($blockTemplates);
	
	$tempBlock = new Template($GLOBALS['root'].'/templates/block.tpl');
	$tempBlock->set('content', $blockContents);
	$tempBlock->set('key', $key);
	
	$tempBlockArray[] = $tempBlock;
}

$blocks = Template::merge($tempBlockArray);

$tempContent = new Template($GLOBALS['root'].'/templates/content.tpl');
$tempContent->set('page_name', $pageName);
$tempContent->set('main_content', $blocks);

?>