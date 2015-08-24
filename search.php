<head><meta charset="utf-8" /></head>
<html>
<head>
	<title>查询</title>
</head>
<body>
	<h1 align="center">查询页面</h1>
	<?php
		require("menu.html");
	?>

	
	<form action = "result.php" method = "post">
		查询列标题:<br />
		<select name = "searchtype">
			<option value = "type">"类别"</option>
			<option value = "reason">"原因"</option>
		</select>
		<br \>
		输入查询关键字<br \>
		<input name = "searchterm" type="text" size = "20"/>
		<br />
		<input type ="submit" name = "submit" value = "查询"/>
	</form>	
</body>
</html>