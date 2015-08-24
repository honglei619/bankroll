<head><meta charset="utf-8" /></head>
<html>
	<title>
		Result
	</title>
	<body>
		<h1>
			报表填写
		</h1>
		<?php
			 //$id = $_POST[''];
			 $date = $_POST['date'];
			 $type = $_POST['type'];
			 $company = $_POST['company'];
			 $reason = $_POST['reason'];
			 $money = $_POST['money'];
			 $state = $_POST['state'];
			 $userID = 1;

			 if (!$date || !$type || !$company || !$reason || !$money || !$state || !$userID ) {
			 	echo "请检查各项目是否填写数据！";
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
			$query = "INSERT INTO `postdata`(`date`, `type`, `company`, `reason`, `money`, `state`, `userID`) VALUES ('".$date."','".$type."','".$company."','".$reason."','".$money."','".$state."','".$userID."')";
			$result = $db->query($query);
			if ($result) {
				echo "提交成功！";
			}else{
				echo "数据提交出错，请重试";
			}
			$db->close();
		?>

	</body>
</html>