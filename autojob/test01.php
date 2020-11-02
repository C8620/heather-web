<?php

$id = "test01";

$link = mysqli_connect('mysql.hostinger.com.hk','u209837112_heath','qwertyuiop','u209837112_heath'); 
$fn = "/home/u209837112/public_html/heather/trackers/$id/location.txt";
$file = fopen("$fn", "r") or die("Unable to open file!");
$locx = fgets($file);
$locy = fgets($file);

mysqli_query($link,"INSERT INTO `$id` (`timestamp`, `lat`, `lon`) VALUES (TIMESTAMP(''), '$locx', '$locy')");

?>