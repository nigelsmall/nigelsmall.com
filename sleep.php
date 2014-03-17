<?php
$time = $_SERVER['QUERY_STRING'];
if ($time == '') {
	$time = 3;
}

sleep($time);

if ($time == 1) {
	print "Slept for $time second\n";
} else {
	print "Slept for $time seconds\n";
}
?>
