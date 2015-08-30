<head><meta charset="utf-8" /></head>
<html>
<head>
	<title>用户信息</title>
</head>
<body>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.freezeheader.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
 <script language="javascript" type="text/javascript"></script>
  <table class="gridView" id="table1">
        <thead>
            <tr>
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
                <!---
                <th>
                	用户ID号
                </th>
                <th>
                    权限
                </th> 
                -->             
            </tr>
        </thead>
        <tbody>
<?php
    session_start();
if (isset($_SESSION['valie_user'])){
    require("navigation.html");
    require_once 'connectvars.php';
    $userID      = $_COOKIE['loginUserNameID'];
    $loginUser   = $_COOKIE['domainUsername'];
    $chineseName = $_COOKIE['chineseName'];
    $department  = $_COOKIE['department'];
    $privilege   = $_COOKIE['privilege'];
    $score       = $_COOKIE['score'];

		 		echo ' <tr class="grid">';
		 		echo '<td>';
		 		echo $loginUser;
		 		echo '</td>';
		 		echo '<td>';
		 		echo $chineseName;
		 		echo '</td>';
		 		echo '<td>';
		 		echo $department;
		 		echo '</td>';
		 		echo '<td>';
		 		echo $score;
		 		echo '</td>';
                /*
		 		echo '<td>';
		 		echo $userID;
		 		echo '</td>';
		 		echo '<td>';
		 		echo $privilege;
		 		echo '</td>';
		 		echo '</tr>';
                */
}else{

        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

}
            ?>
        </tbody>
    </table>
<?php
    echo '<p>&nbsp;</p>';
    if($privilege >=3){
        echo '<a href="insertUser.html"><button type="button">添加用户</button></a>';
    }
 ?>               
</body>
</html>