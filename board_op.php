<?php
	require('global.php');
	$money = Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

	$query_team = mysqli_query($link, "SELECT * FROM `squad`");

	for ($i = 0; $i < 12; $i++) { 
		$row_team = mysqli_fetch_array($query_team);
		$money[$i] = $row_team[1];
	}

	$json_money = json_encode($money);

	echo $json_money;
?>