	<meta charset="utf-8" />
	<link href="css/nav.css" rel="stylesheet" type="text/css" />
<html>
	<title>
		更改结果
	</title>
<?php
			session_start();
if (isset($_SESSION['valie_user'])){
			require("navigation.html");
			require_once 'connectvars.php';
			date_default_timezone_set("Asia/Shanghai");
			 $id = $_COOKIE['update_id'];
			 $date = $_POST['date'];
			 $type = $_POST['type'];
			 $company = $_POST['company'];
			 $reason = $_POST['reason'];
			 $money = $_POST['money'];
			 $state = $_POST['state'];
			 $userID = $_COOKIE['loginUserNameID'];
			 $insert_date = date("Y-m-d H:i:sa");
			 
			 if (!$date || !$type || !$company || !$reason || !$money || !$state || !$userID) {
			 	echo '<font size = "3" color="#FF0000">'.'请检查各项目是否填写数据!'.'</font>';
			 	echo "</p>";
				echo '<a href="update.php">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
			 	exit;
			 }

			 if (!get_magic_quotes_gpc()) {

			 //$date = addslashes($date);
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

			
			$query = "UPDATE `postdata` SET `date`='$date', `type`='$type', `company`='$company', `reason`='$reason', `money`='$money', `state`='$state',`insert_date`='$insert_date', `userID`='$userID' WHERE `id`='$id'";
			//echo $query;
			$result = $db->query($query);
			if ($result) {
				echo '<font size = "3" color=#008B00>'.'修改成功!'. '</font>';
				echo "</p>";
				echo '<a href="search.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
			}else{
				echo "数据提交出错，请重试";
			}
			$db->close();
		}
			else{

        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

}
		?>