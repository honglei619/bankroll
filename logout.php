<head>
    <meta charset="utf-8" />
</head>
<head>
	<title>
		登出
	</title>
</head>
<?php
session_start();
unset($_SESSION['valid_user']);
session_destroy();
echo "您已成功退出";
echo '<p></p>';
echo '<a href="index.html">'.'<font size = "3">'.'返回登录界面'. '</font>'.'</a>';
