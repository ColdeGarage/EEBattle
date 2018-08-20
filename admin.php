<?php
	require("global.php");
	// Fetch role data
	$role_name = Array('', '');
	$role_odds = Array(0, 0);

	$query_role = mysqli_query($link, "SELECT * FROM `role`");

	for ($i = 0; $i < 2; $i++) { 
		$row_role = mysqli_fetch_row($query_role);
		$role_name[$i] = $row_role[1];
		$role_odds[$i] = $row_role[2];
	}

	// Fetch team data
	$team_bet = Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

	$query_team = mysqli_query($link, "SELECT * FROM `squad`");
	for ($i = 0; $i < 12; $i++) { 
		$row_team = mysqli_fetch_row($query_team);
		$team_bet[$i] = $row_team[3];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>EEBattle</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">
	<div id="role">
		<h1>此輪角色設定</h1>
		<form method="get" action="admin_op.php">
			<input type="hidden" name="op" value="role">
			<div class="row">
				<div class="col-6">
					<h3 class="text-center">東方角落</h3>
					<div class="form-group">
						<label for="name1">角色名稱</label>
						<input type="text" class="form-control" id="name1" name="name1" value="<?php echo $role_name[0];?>">
					</div>
					<div class="form-group">
						<label for="odds1">獲勝倍率</label>
						<input type="text" class="form-control" id="odds1" name="odds1" value="<?php echo $role_odds[0];?>">
					</div>
				</div>
				<div class="col-6">
					<h3 class="text-center">西方角落</h3>
					<div class="form-group">
						<label for="name2">角色名稱</label>
						<input type="text" class="form-control" id="name2" name="name2" value="<?php echo $role_name[1];?>">
					</div>
					<div class="form-group">
						<label for="odds2">獲勝倍率</label>
						<input type="text" class="form-control" id="odds2" name="odds2" value="<?php echo $role_odds[1];?>">
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary btn-lg btn-block" value="確認設定">
		</form>
	</div>
	<br>
	<br>
	<br>
	<div id="result">
		<h1>公佈賭盤結果</h1>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">小隊</th>
					<th scope="col">1</th>
					<th scope="col">2</th>
					<th scope="col">3</th>
					<th scope="col">4</th>
					<th scope="col">5</th>
					<th scope="col">6</th>
					<th scope="col">7</th>
					<th scope="col">8</th>
					<th scope="col">9</th>
					<th scope="col">10</th>
					<th scope="col">11</th>
					<th scope="col">12</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">下注狀況</th>
					<td><?php echo $team_bet[0];?></td>
					<td><?php echo $team_bet[1];?></td>
					<td><?php echo $team_bet[2];?></td>
					<td><?php echo $team_bet[3];?></td>
					<td><?php echo $team_bet[4];?></td>
					<td><?php echo $team_bet[5];?></td>
					<td><?php echo $team_bet[6];?></td>
					<td><?php echo $team_bet[7];?></td>
					<td><?php echo $team_bet[8];?></td>
					<td><?php echo $team_bet[9];?></td>
					<td><?php echo $team_bet[10];?></td>
					<td><?php echo $team_bet[11];?></td>
				</tr>
			</tbody>
		</table>
		<div class="text-center">
			<a href="admin_op.php?op=result&winner=1" role="button" class="btn btn-primary btn-lg"><?php echo $role_name[0];?> 獲勝</a>
			<a href="admin_op.php?op=result&winner=0" role="button" class="btn btn-secondary btn-lg">平手</a>
			<a href="admin_op.php?op=result&winner=2" role="button" class="btn btn-primary btn-lg"><?php echo $role_name[1];?> 獲勝</a>
		</div>
	</div>
</div>
</body>
</html>