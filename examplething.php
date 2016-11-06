<!--<?php
$myfile = "content/file.txt";
if (isset($_POST['edit'])) {
    $newData = nl2br(htmlspecialchars($_POST['edit']));
    $handle = fopen($myfile, "w");
    fwrite($handle, $newData);
    fclose($handle);
}
// ----------------------------
if (file_exists($myfile)) {

    $myData = file_get_contents($myfile);
}
?>

<form action="index.php" method="post">
	<textarea name="edit" cols="50" rows="20"><?php echo str_replace("<br />","",$myData); ?></textarea>
    <input type="submit"/>
</form>-->