<head><meta charset="utf-8" /></head>
<head>
<title>首页</title>
<link href="css/nav.css" rel="stylesheet" type="text/css" />
</head>
<?php
session_start();
date_default_timezone_set("Asia/Shanghai");

if (isset($_SESSION['valie_user'])){
    require("navigation.html");
	$chineseName = $_COOKIE['chineseName'];


        //echo '登陆成功！';
        //echo "</p>";
        echo $chineseName.' 您好，'.'当前时间是 ' .date('H:i,jS F Y');
        echo '	<p></p>';
        echo '<a href="logout.php">'.'<font size = "3">'.'退出登录'. '</font>'.'</a>';
}else{
        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

}
