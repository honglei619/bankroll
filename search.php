<head><meta charset="utf-8" /></head>
<html>
<head>
	<title>查找结果</title>
</head>
<body>
	<?php
		session_start();
	if (isset($_SESSION['valie_user'])){

	require("navigation.html");
    require_once 'connectvars.php';
    //取得userID，返回的查找结果只允许出现此登录用户提交的数据；
    $userID     = $_COOKIE['loginUserNameID'];
    //取得当前用户登陆权限，根据不同用户权限返回不同查询结果
    $privilege   = $_COOKIE['privilege'];
	$searchtype = $_POST['searchtype'];
	$searchterm = trim($_POST['searchterm']);

	if (!$searchtype || !$searchtype) {
		echo "try again";
		exit;
	}

	if (!get_magic_quotes_gpc()) {
		$searchtype = addslashes($searchtype);
		$searchterm = addslashes($searchterm);
	}
@ $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	if (mysqli_connect_errno()) {
		echo "could not connect to db";
		exit;
	}
	//添加权限判断
	if ($privilege >1) {

	$query = "SELECT * FROM `postdata` WHERE ".$searchtype." like '%".$searchterm."%'";
	$sum_query = "SELECT sum(money) FROM `postdata` WHERE  ".$searchtype." like '%".$searchterm."%'";

	}else{

		$query = "SELECT * FROM `postdata` WHERE `userID`= ".$userID." and ".$searchtype." like '%".$searchterm."%'";
		$sum_query = "SELECT sum(money) FROM `postdata` WHERE `userID`= ".$userID." and ".$searchtype." like '%".$searchterm."%'";

	}
	
	$result = $db -> query($query);
	$num_results = $result ->num_rows;

	//echo $sum_query."</br>";
	$sum_result = $db -> query($sum_query);
	$sum_num_results = $sum_result ->num_rows;

	$sum = $sum_result ->fetch_assoc();
		//echo "<p> 找到了 ".$num_results." 个结果"."</p>";
}else{

        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

}

	?>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.freezeheader.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
 <script language="javascript" type="text/javascript">

        $(document).ready(function () {
            $("#table1").freezeHeader({ 'height': '420px' });  
        })
    </script>
  <table class="gridView" id="table1">
        <thead>
            <tr>
            	<th>
                   序号
                </th>

                <th>
                    预付款日期
                </th>
                <th>
                    类别
                </th>
                <th>
                    公司名称
                </th>
                <th>
                    原因
                </th>
                <th>
                    金额
                </th>
                 <th>
                    付款状态
                </th> 
                <th>
                    提交时间
                </th>
                <th>
                    提交人
                </th>                
            </tr>
        </thead>
        <tbody>
        	<?php

        	for ($i=0; $i < $num_results; $i++) { 

		 	$row = $result ->fetch_assoc();
		 	if($i % 2 == 0){
		 		echo ' <tr class="grid">';
		 		echo '<td>';
		 		echo stripcslashes($i+1);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['date']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['type']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['company']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['reason']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['money']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['state']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['insert_date']);
		 		echo '</td>';
		 		echo '</tr>';
		 	}
		 	
		 		else{
		 		echo '<tr class="gridAlternada">';
		 		echo '<td>';
		 		echo stripcslashes($i+1);
		 		echo '</td>';
			 	echo '<td>';
		 		echo stripcslashes($row['date']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['type']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['company']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['reason']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['money']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['state']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['insert_date']);
		 		echo '</td>';
		 		echo '</tr>';
		 			}
		 		
			}
			if($num_results %2 ==0){
				echo '<tr class="grid">';
		 		echo '<td>';
		 		echo '<b>汇总</b>';
		 		echo '</td>';
			 	echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo $sum['sum(money)'];
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '</tr>';
			}else{
				echo '<tr class="gridAlternada">';
		 		echo '<td>';
		 		echo '<b>汇总</b>';
		 		echo '</td>';
			 	echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo $sum['sum(money)'];
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo '';
		 		echo '</td>';
		 		echo '</tr>';
			}
				
	$result -> free();
	$db ->close();
            ?>
        </tbody>
    </table>
</body>
</html>
