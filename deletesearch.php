<head>
	<meta charset="utf-8" />
	<link href="css/nav.css" rel="stylesheet" type="text/css" />
</head>
<html>
	<title>
		删除结果
	</title>
<?php
	session_start();
if (isset($_SESSION['valie_user'])){
			require("navigation.html");
			require_once 'connectvars.php';
			date_default_timezone_set("Asia/Shanghai");
	$checked_name = $_POST['checked_name'];
	@ $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	for($i = 0; $i < count($checked_name); $i++){

		$query = "DELETE FROM `postdata` WHERE `id`='".$checked_name[$i]."'";
		$result = $db->query($query);
		if ($result) {
			echo $checked_name[$i].' 删除成功！</br>';
		}
	}
	$db ->close();
	echo '<a href="search.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
}