<head><meta charset="utf-8" /></head>
<html>
<head>
	<title>查找结果</title>
</head>
<body>
	<?php
	//将查询条件列表化，日期加入日期间隔，日期输入框代入日期标准库
		session_start();
	if (isset($_SESSION['valie_user'])){

	require("navigation.html");
    require_once 'connectvars.php';
    //取得userID，返回的查找结果只允许出现此登录用户提交的数据；
    $userID     = $_COOKIE['loginUserNameID'];
    //取得当前用户登陆权限，根据不同用户权限返回不同查询结果
    $privilege  = $_COOKIE['privilege'];
        $date_from = $_POST['date_from'];
        $date_to   = $_POST['date_to'];
        $type      = $_POST['type'];
        $company   = $_POST['company'];
        $reason    = $_POST['reason'];
        $money     = $_POST['money'];
        $state     = $_POST['state'];
        $insert_date_from = $_POST['insert_date_from'];
        $insert_date_to = $_POST['insert_date_to'];
        //当用户提交空白日期时手动指定一个日期
        if(trim($date_from) == ''){
            $date_from = "0000-00-00";
        }
        if(trim($date_to) == ''){
            $date_to = "2099-12-31";
        }
        if(trim($insert_date_from) == ''){
            $insert_date_from = "0000-00-00";
        }
        if(trim($insert_date_to) == ''){
            $insert_date_to = "2099-12-31";
        }

	if (!get_magic_quotes_gpc()) {
        $date_from = addslashes($date_from);
        $date_to = addslashes($date_to);
        $type = addslashes($type);
        $company = addslashes($company);
        $reason = addslashes($reason);
        $money =addslashes($money);
        $state = addslashes($state);
        $insert_date_from =addslashes($insert_date_from);
        $insert_date_to = addslashes($insert_date_to);
	}

@ $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	if (mysqli_connect_errno()) {
		echo "could not connect to db";
		exit;
	}
	//添加权限判断
	if ($_COOKIE['privilege'] >1) {

	$query = "SELECT * FROM `postdata` WHERE `insert_date`BETWEEN '$insert_date_from' AND '$insert_date_to' and `date`BETWEEN '$date_from' AND '$date_to'  and `type` like '%".$type."%' and `company` like '%".$company."%' and `reason` like '%".$reason."%' and `money` like '%".$money."%' and `state` like '%".$state."%'";
	//echo $query;
    $sum_query = "SELECT sum(money) FROM `postdata` WHERE  `insert_date`BETWEEN '$insert_date_from' AND '$insert_date_to' and `date`BETWEEN '$date_from' AND '$date_to' and `type` like '%".$type."%' and `company` like '%".$company."%' and `reason` like '%".$reason."%' and `money` like '%".$money."%' and `state` like '%".$state."%'";
    //echo '------'.$sum_query.'-----';
	}else{

	$query = "SELECT * FROM `postdata` WHERE `userID`= ".$userID." and  `insert_date`BETWEEN '$insert_date_from' AND '$insert_date_to' and `date`BETWEEN '$date_from' AND '$date_to'  and `type` like '%".$type."%' and `company` like '%".$company."%' and `reason` like '%".$reason."%' and `money` like '%".$money."%' and `state` like '%".$state."%'";
	//echo $query;
    $sum_query = "SELECT sum(money) FROM  `postdata` WHERE `userID`= ".$userID." and  `insert_date`BETWEEN '$insert_date_from' AND '$insert_date_to' and `date`BETWEEN '$date_from' AND '$date_to' and `type` like '%".$type."%' and `company` like '%".$company."%' and `reason` like '%".$reason."%' and `money` like '%".$money."%' and `state` like '%".$state."%'";

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
 <form name="checkform" action="deletesearch.php" method="POST">
  <table class="gridView" id="table1">
        <thead>
            <tr>
                <th>

                </th>
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
                    付款方式
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
		 	//通过userID查找user表中记录的对应的中文名，并取出
		 	$userID = $row['userID'];
		 	$get_chinese_name_sql = "SELECT `chineseName` FROM `user` WHERE `userID`= '$userID' ";
		 	$get_chinese_name = $db ->query($get_chinese_name_sql);
		 	$row2 = $get_chinese_name ->fetch_assoc();
		 	if($i % 2 == 0){
		 		echo ' <tr class="grid">';
                echo '<td>';
                //id赋值给checked_name数组，通过表单POST到deletesearch.php页面
                echo '<input name="checked_name[]" type="checkbox" value='.$row['id'].' />';
                echo '</td>';		 		
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
		 		echo '<td>';
		 		echo stripcslashes($row2['chineseName']);
		 		echo '</td>';
		 		echo '</tr>';
		 	}
		 	
		 		else{
		 		echo '<tr class="gridAlternada">';
                echo '<td>';
                echo '<input name="checked_name[]" type="checkbox" value='.$row['id'].' />';
                echo '</td>';		 		
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
		 		echo '<td>';
		 		echo stripcslashes($row2['chineseName']);
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
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo round($sum['sum(money)'],2);
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
		 		echo '';
		 		echo '</td>';
		 		echo '<td>';
		 		echo round($sum['sum(money)'],2);
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
		 		echo '</tr>';
			}

				
	$result -> free();
	$db ->close();
            ?>
        </tbody>
    </table>
    <p>&nbsp</p>
<input type="submit" name="delete_button" value="删除" />
<input type="submit" name="update_button" value ="修改" />
</form>
</body>
</html>
