<?php
require("./global.php");

$tid = $_GET["tid"];
$sql_team_bet_value = mysqli_query($link, "SELECT * FROM `squad` WHERE `sid` = '$tid'");
$msg = $_GET["msg"];

if (mysqli_num_rows($sql_team_bet_value)){
	while ($row_team_bet_value = mysqli_fetch_array($sql_team_bet_value)){
		$bet = $row_team_bet_value['bet'];
		$role = $row_team_bet_value['role'];
		$money = $row_team_bet_value['money'];
	}
}


// Fetch role data
$role_name = Array('', '');

$query_role = mysqli_query($link, "SELECT * FROM `role`");

for ($i = 0; $i < 2; $i++) { 
	$row_role = mysqli_fetch_row($query_role);
	$role_name[$i] = $row_role[1];
}

if ($tid <= 12 || $tid >= 1) {
?>
<!DOCTYPE>
<html>
<head>
	<title>清大電機新創營|擂台現場</title>
	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/custom.css">
	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<body>
	<div id="header">
		<h3>第 <?php echo $tid;?> 小隊</h3>
	</div>
	<div id="result">
	<?php if ($msg && $msg == "success") { ?>
		<span> 下注成功！</span>
	<?php } else if ($msg && $msg == "error") { ?>
		<span> 下注失敗！</span>
	<?php }?>
	</div>
	
	<?php if ($bet == 0) { ?>
	<div id="content">
		<form method="GET" action="team_op.php">
			<input type="hidden" name="tid" value="<?php echo $tid;?>">
			<div id="bet-table-view">
				<table id="bet-table">
					<div class="form-group">
						<label for="role">下注對象</label>
						<select class="form-control" id="role" name="role">
							<option value="1"><?php echo $role_name[0];?></option>
							<option value="2"><?php echo $role_name[1];?></option>
						</select>
					</div>
					<div class="form-group">
						<label for="bet">下注金額</label>
						<input type="number" name="bet" id="bet" required="required" max="<?php echo $money;?>" value="<?php echo $money;?>">
					</div>
				   <!-- 下注多少 name="bet" -->
				</table>
			</div>
			<input type="submit" class="btn btn-primary" value="下注！"></input>
		</form>
	</div>
	<?php } else {?>
		<p>已下注</p>
	<?php } ?>
</body>

<?php   
} else {
	echo "invalid teamid";
}
?>
