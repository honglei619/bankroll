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
			 $company = trim($_POST['company']);
			 $userID  = $_COOKIE['loginUserNameID'];
			 //无法获取userID时指定一个错误号ID
			 if(is_null($userID)){
			 	$userID = 120;
			 }
			 


			 if (!$company || !$userID) {
			 	echo '<font size = "3" color="#FF0000">'.'请检查各项目是否填写数据!'.'</font>';
			 	echo "</p>";
				echo '<a href="insertcompany.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
			 	exit;
			 }

			 if (!get_magic_quotes_gpc()) {

			 $company = addslashes($company);
			 $userID = addslashes($userID);

			 }

			 @ $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

			if (mysqli_connect_errno()) {
			echo "数据库连接出错！";
			exit;

			$query = "INSERT INTO `b_company_name`( `company`,`userID`) VALUES ('".$company."','".$userID."')";
			$result = $db->query($query);
			if ($result) {
				echo '<font size = "3" color=#008B00>'.'添加成功!'. '</font>';
				echo "</p>";
				echo '<a href="insertcompany.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
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