<?php

$tempContent = new Template($GLOBALS['root'].'/templates/content.tpl');
$tempContent->set('page_name', $pageName);
$tempContent->set('main_content', $pageData['desc']);

?>