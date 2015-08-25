<head>
	<meta charset="utf-8" />
	<link href="images/style.css" rel="stylesheet" type="text/css" />
</head>
<html>
	<title>
		提交结果
	</title>
<!-- www.divcss5.com -->
		<?php
			require("navigation.html");
			 //$id = $_POST[''];
			 $date = $_POST['date'];
			 $type = $_POST['type'];
			 $company = $_POST['company'];
			 $reason = $_POST['reason'];
			 $money = $_POST['money'];
			 $state = $_POST['state'];
			 global $userID;
			 //设置默认用户ID是100,出现提交错误可以查询
			 $userID = 100;

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

			 @ $db = new mysqli('localhost','root','','bankroll');

			if (mysqli_connect_errno()) {
			echo "数据库连接出错！";
			exit;
			}
			$passloginUserName= $_COOKIE['loginUserName'];
			$queryUser = "SELECT * FROM `user` WHERE `domainUsername`= '$passloginUserName'";
    		//echo $queryUser;
    		$resultUser = $db -> query($queryUser);
    		$num_resultsUser = $resultUser ->num_rows;

    		for ($i=0; $i < $num_resultsUser; $i++) { 
         		$row = $resultUser ->fetch_assoc();
        		$userID = stripcslashes($row['userID']);
    			}

			$query = "INSERT INTO `postdata`(`date`, `type`, `company`, `reason`, `money`, `state`, `userID`) VALUES ('".$date."','".$type."','".$company."','".$reason."','".$money."','".$state."','".$userID."')";
			$result = $db->query($query);
			if ($result) {
				echo '<font size = "3" color=#008B00>'.'提交成功!'. '</font>';
				echo "</p>";
				echo '<a href="insert.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
			}else{
				echo "数据提交出错，请重试";
			}
			$db->close();
		?>

	</body>
</html>