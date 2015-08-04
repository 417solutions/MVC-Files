<?php 
$scriptStartTime = microtime(true);

if(1==2){
	print "<p>ripemd160: ".hash('ripemd160', 'The quick brown fox jumped over the lazy dog.');
	
	print "<p>MD5: ".hash('MD5', 'The quick brown fox jumped over the lazy dog.');
	
	print "<p>SHA1: ".hash('SHA1', 'The quick brown fox jumped over the lazy dog.');
	print "<p>SHA1: ".hash('SHA1', 'The quick brown fox jumped over the lazy dog');
	
	print "<p>SHA256: ".hash('SHA256', 'The quick brown fox jumped over the lazy dog.');
	print "<p>SHA256: ".hash('SHA256', 'The quick brown fox jumped over the lazy dog');
	
	print "<p>SHA512: ".hash('SHA512', 'The quick brown fox jumped over the lazy dog.');
	print "<p>SHA512: ".hash('SHA512', 'The quick brown fox jumped over the lazy dog');
	print "<div style='background:yellow;padding:20px;margin:20px;'>";
		print "<p>SHA512: ".hash("SHA512", "f0rever21");
	print "</div>";
}


session_start();

// Use an autoloader! SPL AUTOLOAD??
require '../libs/Bootstrap.php';
require '../libs/Controller.php';
require '../libs/View.php';
require '../libs/Model.php';

// Library
require '../libs/Database.php';
require '../libs/Session.php';


require '../config/globals.php';
require '../config/database.php';
require '../config/functions.php';

logMsg("page loading");

$app = new Bootstrap();
// if(!empty($_GET['url'])){
//     print "URL = ".$_GET['url'];
// }else{
//     print "No URL passed in :(";
// }

// die();
// URL = controller/method

//usleep(90000);

$scriptEndTime = microtime(true);
$scriptExecutionTime = round($scriptEndTime - $scriptStartTime,4);
if($scriptExecutionTime>1){
	logMsg("Page Executed in $scriptExecutionTime seconds");
}
echo "<p>$scriptExecutionTime seconds</p>";











