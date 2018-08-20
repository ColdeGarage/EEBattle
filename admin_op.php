<?php
	require("global.php");
	$op = $_GET['op'];

	if($op == "role") {
		$name1 = $_GET['name1'];
		$odds1 = $_GET['odds1'];
		$name2 = $_GET['name2'];
		$odds2 = $_GET['odds2'];

		mysqli_query($link, "UPDATE `role` SET `name` = '$name1', `odds` = '$odds1' WHERE `cid` = '1'");
		mysqli_query($link, "UPDATE `role` SET `name` = '$name2', `odds` = '$odds2' WHERE `cid` = '2'");
	}
	elseif ($op == "result") {
		$winner = $_GET['winner'];

		// Read winner data
		$query_winner = mysqli_query($link, "SELECT * FROM `role` WHERE `cid` = '$winner'");
		$row_winner = mysqli_fetch_row($query_winner);
		$odds = $row_winner[2];

		// Read team data
		$query_team = mysqli_query($link, "SELECT * FROM `squad`");

		// Update team data
		for ($i = 1; $i <= 12; $i++) { 
			$row_team = mysqli_fetch_row($query_team);

			// Tie
			if ($winner == 0) {
				$money = $row_team[1] - $row_team[2];	
			}
			// Win
			elseif ($winner == $row_team[3]) {
				$money = $row_team[1] + $row_team[2] * $odds;
			}
			// Lose
			else {
				$money = $row_team[1] - $row_team[2];
			}
			//echo $winner;
			//echo $row_team[3];
			mysqli_query($link, "UPDATE `squad` SET `money` = '$money', `bet` = '0', `role` = '0' WHERE `squad`.`sid` = '$i'");	
			
		}
	}

	header('Location: admin.php');

?>