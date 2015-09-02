<head>
    <meta charset="utf-8" />
</head>
<?php
//设置会话保存时间，15分钟
session_start();
if (isset($_SESSION['valie_user'])){
require_once 'connectvars.php';
require("navigation.html");
    @ $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    if (mysqli_connect_errno()) {
        echo "无法连接数据库!";
        exit;
    }
    $queryUser = " SELECT * FROM `user` WHERE 1 ";
    //echo $queryUser;
    $result = $db -> query($queryUser);
    $num_results = $result ->num_rows;
}else{

        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

}
    ?>
<script src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script language="javascript" type="text/javascript"></script>
<table class="gridView" id="table1">
        <thead>
            <tr>
            	<th>

                </th>            	
                <th>
                   ID
                </th>            
            	<th>
                   登陆名称
                </th>

                <th>
                    姓名
                </th>
                <th>
                    部门
                </th>              
                <th>
                    分数
                </th>
               
                <th>
                	用户ID号
                </th>

                <th>
                    权限
                </th>          
            </tr>
        </thead>
        <tbody>
<?php
    for ($i=0; $i < $num_results; $i++) { 
         $row = $result ->fetch_assoc();
         /*
        echo stripcslashes($row['chineseName'])."</p>";
        $domainUsername = stripcslashes($row['domainUsername']);
        $chineseName = stripcslashes($row['chineseName']);
        $loginUserID = stripcslashes($row['userID']);
        $department = stripcslashes($row['department']);
        $privilege = stripcslashes($row['privilege']);
        $score = stripcslashes($row['score']);
        */
    if($i % 2 == 0){
		 		echo ' <tr class="grid">';
                echo '<td>';
                //id赋值给checked_name数组，通过表单POST到deletesearchuser.php页面
                echo '<input name="checked_name[]" type="checkbox" value='.$row['id'].' />';
                echo '</td>';		 		
                echo '<td>';
		 		echo stripcslashes($i+1);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['domainUsername']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['chineseName']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['department']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['score']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['userID']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['privilege']);
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
		 		echo stripcslashes($row['domainUsername']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['chineseName']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['department']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['score']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['userID']);
		 		echo '</td>';
		 		echo '<td>';
		 		echo stripcslashes($row['privilege']);
		 		echo '</td>';
		 		echo '</tr>';
		 			}
	}