<?php
	extract($_POST);
	file_put_contents('myimage.jpg', base64_decode($data));

	$myfile = fopen("img.txt", "w") or die("Unable to open file!");
	fwrite($myfile,$data);
?>