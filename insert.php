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
			date_default_timezone_set("Asia/Shanghai");
			 //$id = $_POST[''];
			 $date = $_POST['date'];
			 $type = $_POST['type'];
			 $company = $_POST['company'];
			 $reason = $_POST['reason'];
			 $money = $_POST['money'];
			 $state = $_POST['state'];
			 $userID = $_COOKIE['loginUserNameID'];
			 $insert_date = date("Y-m-d H:i:sa");
			 //无法获取userID时指定一个错误号ID
			 if(is_null($userID)){
			 	$userID = 120;
			 }
			 


			 if (!$date || !$type || !$company || !$reason || !$money || !$state || !$userID) {
			 	echo '<font size = "3" color="#FF0000">'.'请检查各项目是否填写数据!'.'</font>';
			 	echo "</p>";
				echo '<a href="insert.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
			 	exit;
			 }

			 if (!get_magic_quotes_gpc()) {

			 $date = addslashes($date);
			 $type = addslashes($type);
			 $company = addslashes($company);
			 $reason = addslashes($reason);
			 $money =addslashes($money);
			 $state = addslashes($state);

			 }

			 @ $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

			if (mysqli_connect_errno()) {
			echo "数据库连接出错！";
			exit;
			}

			$query = "INSERT INTO `postdata`(`date`, `type`, `company`, `reason`, `money`, `state`,`insert_date`, `userID`) VALUES ('".$date."','".$type."','".$company."','".$reason."','".$money."','".$state."','". $insert_date."','".$userID."')";
			$result = $db->query($query);
			if ($result) {
				echo '<font size = "3" color=#008B00>'.'提交成功!'. '</font>';
				echo "</p>";
				echo '<a href="insert.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
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