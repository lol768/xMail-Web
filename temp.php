<?php

set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo 'Crypto Init...';
require_once('password.php');

$avg = 20;

echo 'Crypto Test Begin: \n';

for($cost = 4; $cost <= 31; $cost++) {
	output('Cost '.$cost.' ');
	$tot = 0;
	for($i = 0; $i < $avg; $i++) {
		$start = microtime(true);
		password_hash(uniqid(), PASSWORD_BCRYPT, array("cost" => $cost));
		$end = microtime(true);

		$tot = $tot + ($end - $start);
	}
	output("Cost: ".$cost." Avg Time: ".(($tot / $avg)*1000)." (".($tot / $avg).")\n");
}

function output($out) {
	echo $out;
}
?>
