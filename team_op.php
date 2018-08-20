<?php
	require('global.php');
	$tid = $_GET['tid'];
	$bet = $_GET['bet'];
	$role = $_GET['role'];

	mysqli_query($link, "UPDATE `squad` SET `bet` = '$bet', `role` = '$role' WHERE `sid` = '$tid'");
	$url = 'Location: team.php?tid='.$tid;
	echo $url;
	header($url);
?>