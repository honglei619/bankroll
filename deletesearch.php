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

	if(isset($_POST['delete_button'])){
		$query = "DELETE FROM `postdata` WHERE `id`='".$checked_name[$i]."'";
		$result = $db->query($query);
		if ($result) {
		  echo $checked_name[$i].' 删除成功！</br>';
			}
		}
	if(isset($_POST['update_button']) && count($checked_name)==1 ){
		
		$update_query = "SELECT * FROM `postdata` WHERE `id`='".$checked_name[$i]."'";
		//echo $update_query;
		$update_result = $db->query($update_query);
		$num_update_result =$update_result ->num_rows;
		   for ($i=0; $i < $num_update_result; $i++) { 
         $row = $update_result ->fetch_assoc();        
        $id = stripcslashes($row['id']);
        $date = stripcslashes($row['date']);
        $type = stripcslashes($row['type']);
        $company = stripcslashes($row['company']);
        $reason = stripcslashes($row['reason']);
        $money = stripcslashes($row['money']);
        $state = stripcslashes($row['state']);
        $insert_date = stripcslashes($row['insert_date']);
        $userID = stripcslashes($row['userID']);

    setcookie('update_id',"$id");
    setcookie('update_date',"$date");
    setcookie('update_tpye',"$type");
    setcookie('update_company',"$company");
    setcookie('update_reason',"$reason");
    setcookie('update_money',"$money");
    setcookie('update_state',"$state");
    //setcookie('update_insert_date',"$insert_date");
    //setcookie('update_userID',"$userID");
    }    
    
    echo   '<script language="javascript">'.'window.location= "update.php";'.'</script>';

	
			}/*
			else{
				echo "请勿选择多列数据进行修改";
				echo '</br>';
				echo '<a href="search.html">'.'<font size = "3">'.'返回'. '</font>'.'</a>';
				exit;
			}
*/
	}
	$db ->close();
}