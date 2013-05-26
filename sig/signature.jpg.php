<?php

function logToFile($msg){
 $filename = ".sigaccess.log";

 $fd = fopen($filename, "a");

 $str = "[" . date("Y/m/d H:i:s", mktime() + 60*60*8 ) . "] " . $msg . "\n\n"; 

 fwrite($fd, $str);

 fclose($fd);
}

$log = "{ip: " . $_SERVER['REMOTE_ADDR'] ."}\n\t" . 
       "{lang: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] ."}\n\t" . 
       "{referer: " .$_SERVER['HTTP_REFERER'] ."}\n\t" . 
       "{agent: " . $_SERVER['HTTP_USER_AGENT'] . "}";



logToFile($log);

header('Content-type: image/jpeg');
header('Pragma-directive: no-cache');
header('Cache-directive: no-cache');
header('Pragma: no-cache');
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: -1");

readfile('signature.jpg');
?>
