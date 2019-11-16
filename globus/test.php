<?php
$outputwebBug = 'iplog.csv';//name of the ip address
@ $details = json_decode(file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}/json"));
@ $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$string = '<code>'
.'<p></p><p>IP address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
.$_SERVER['REMOTE_ADDR'].'</p><p>Hostname:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
.$hostname.'</p><p>browser and OS:&nbsp;'
.$_SERVER['HTTP_USER_AGENT'].'</p><p>'
.$_SERVER['HTTP_REFERER'].'</p><p>Coordinates:&nbsp;&nbsp;&nbsp;&nbsp;'
.$details->loc.'</p><p>ISP provider:&nbsp;&nbsp;&nbsp;'
.$details->org.'</p><p>City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
.$details->city.'</p><p>State:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
.$details->region.'</p><p>country:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
.$details->country.'</p><p>Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
.date("D dS M,Y h:i a").'</p></code>';

echo '<!DOCTYPE html><html><head><title>WHO AM I?</title><head><body>';
echo $string;
echo '</body></html>';
?>