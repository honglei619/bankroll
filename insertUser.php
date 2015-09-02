<head>
	<meta charset="utf-8" />
	<link href="css/nav.css" rel="stylesheet" type="text/css" />
</head>
<html>
	<title>
		提交结果
	</title>
		<?php
			session_start();
if (isset($_SESSION['valie_user'])){
			require("navigation.html");
			require_once 'connectvars.php';
			//date_default_timezone_set("Asia/Shanghai");
			 //$id = $_POST[''];
			 $domainUsername = $_POST['domainUsername'];
			 $chineseName = $_POST['chineseName'];
			 $department = $_POST['department'];
			 $userID = $_POST['userID'];
			 $privilege = $_POST['privilege'];
			 $score = $_POST['score'];
			 //$userID = $_COOKIE['loginUserNameID'];
			 //$insert_date = date("Y-m-d H:i:sa");
			 


			 if (!$domainUsername || !$chineseName || !$department || !$userID || !$privilege || !$score) {
			 	echo '<font size = "3" color="#FF0000">'.'请检查各项目是否填写数据!'.'</font>';
			 	echo "</p>";
				echo '<a href="insertUser.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
			 	exit;
			 }

			 if (!get_magic_quotes_gpc()) {

			 $domainUsername = addslashes($domainUsername);
			 $chineseName = addslashes($chineseName);
			 $department = addslashes($department);
			 $userID = addslashes($userID);
			 $privilege =addslashes($privilege);
			 $score = addslashes($score);

			 }

			 @ $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

			if (mysqli_connect_errno()) {
			echo "数据库连接出错！";
			exit;
			}
			//对用户做权限判断,使用cookie传入的权限代码
			if ($_COOKIE['privilege'] >= 3 ) {

			$query = "INSERT INTO `user`(`domainUsername`, `chineseName`, `department`, `userID`, `privilege`, `score`) VALUES ('".$domainUsername."','".$chineseName."','".$department."','".$userID."','".$privilege."','".$score."')";
			$result = $db->query($query);

			}else{
				echo "用户权限不足，请查证！";
			}
			if ($result) {
				echo '<font size = "3" color=#008B00>'.'提交成功!'. '</font>';
				echo "</p>";
				echo '<a href="insertUser.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
			}else{
				echo "数据提交出错，请重试";
			}
			$db->close();
}else{

        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

}
		?>

	</body>
</html>