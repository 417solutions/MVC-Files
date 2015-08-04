<?php
function logMsg($msg){
	$myfile = fopen("../temp/log.txt", "a") or die("Unable to open log file!");
	fwrite($myfile, date('Y-m-d H:i:s')." - ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ." - $msg\r\n");
	fclose($myfile);
}
