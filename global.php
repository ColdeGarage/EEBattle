<?php
require("config.php");

if(! (@$link=mysqli_connect($db_host, $db_user, $db_pass))){
	printf("<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
</head><p>資料庫連線錯誤，請嘗試重新整理，或聯絡系統管理員。</p>");
	exit();
}
mysqli_select_db($link, $db_name);
error_reporting(0);
?>
