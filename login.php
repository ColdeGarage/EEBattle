<?php
require("global.php");

if (loggedin()) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>清大電機新創營|擂台登入處</title>
	<!-- Meta -->
	<meta charset="utf-8">
/head>
<body>
<div id="header" class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div id="logo">
			<a href="index.php">
				<span id="logo-chn">清 大 電 機 新 創 營</span><br>
				<span id="logo-eng" class="text-center">NTHUEE Creative Camp</span>
			</a>
		</div>
	</div>
</div>
<div id="banner" class="nav-fix">
	<div id="bg-img">
		<div id="bg-trans">
			<div id="title" class="container">
				<h1>
					<span id="title-chn" class="white">登入</span>&nbsp;
					<span id="title-eng" class="white">Login</span>
				</h1>
			</div>
		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<form method="POST" action="ops.php?action=login">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="form-group">
								<input type="squad" class="form-control input-lg" id="email" name="email" required="required" placeholder="小隊編號"></input>
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-lg" id="id" name="id" required="required" placeholder="小隊密碼"></input>
							</div>
							<input type="submit" class="btn btn-lg btn-primary btn-block" value="登入"></input>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php if(isset($_GET['msg']) && $_GET['msg']=="wrong"){ ?>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					密碼錯誤！<br>請去找管理員索取正確密碼。
		</div>
		<?php } else if(isset($_GET['msg']) && $_GET['msg']=="unauth"){ ?>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			請先登入。<br>
		</div>
		<?php } else if(isset($_GET['msg']) && $_GET['msg']=="logout"){ ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			已登出。<br>
		</div>
		<?php }?>
		<div class="text-muted text-center">
			還沒報名嗎？<a href="register.php">趕快報名囉！</a>
		</div>
	</div>
</div>
</body>
</html>

