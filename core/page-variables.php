<?php

$worldName = $GLOBALS['uri'];
$pageName = $GLOBALS['uri2'];
$extraPage = $GLOBALS['uri3'];

$GLOBALS['worlddir'] = ($GLOBALS['root'].'/data/worlds/'.$_SESSION['world']);

$recoveredData = file_get_contents($GLOBALS['worlddir'].'/pages/'.$pageName.'/'.$pageName.'.md');
$pageData = unserialize($recoveredData);

?>