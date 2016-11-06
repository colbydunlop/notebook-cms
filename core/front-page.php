<?php

$pageName = $GLOBALS['uri'];

$contentData = file_get_contents('page/'.$pageName.'.md');

include(__DIR__.'/proccess.php');


$head = new Template(__DIR__.'/head.tpl');
$head->set("page_title", ucfirst($pageName));

$content = new Template(__DIR__."/content.tpl");
$content->set('page_name', $pageName);
$content->set('main_content', $contentData);

$tail = new Template(__DIR__."/tail.tpl");

echo $head->output(), $content->output(), $tail->output();

?>