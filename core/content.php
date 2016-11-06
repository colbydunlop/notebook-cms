<?php

$tempContent = new Template(__DIR__.'/content.tpl');
$tempContent->set('page_name', $pageName);
$tempContent->set('main_content', $pageData['desc']);

?>