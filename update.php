<head><meta charset="utf-8" />
	<title>修改报表</title>
</head>
<?php 
session_set_cookie_params(900); 
session_start();
if (isset($_SESSION['valie_user'])){

}else{
	echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

}

?>
<head>
	<link href="css/nav.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<body>
&nbsp;
<ul id="nav">
	<li><a href="login.php">主页</a></li>
          <li><a href="insert.html">填写资金计划</a></li>
          <li><a href="search.html">历史查询</a></li>
          <!--
          <li><a href="insertcompany.html">付款方维护</a></li>
          <li><a href="">考核</a></li> $_COOKIE['chineseName'];
          -->
          <li><a href="userinfo.php">我的资料</a></li>
</ul>
</body>
<html>
	<body>
		<p>&nbsp;</p>
		<form action ="updateresult.php" method = "post">
				<table border = "0">
					<tr>
						<font size = "3">付款日期:</font>
				<?php
                echo '<input class="Wdate" type="text" name = "date" value = '.$_COOKIE['update_date'].' maxlength = "15" size = "13" onClick="WdatePicker()">'
                ?>
					</tr>
					<tr>
						<font size = "3">类别:</font>
					<select name ="type">
				    <?php echo '<option value = '.$_COOKIE['update_tpye'].'  maxlength = "20" size = "10">'.$_COOKIE['update_tpye'].'</option>'
				    ?>
                    <option value = "散油采购"  maxlength = "20" size = "10">散油采购</option>
                     <option value = "大豆采购"  maxlength = "20" size = "10">大豆采购</option>
                    <option value = "米类采购"  maxlength = "20" size = "10">米类采购</option>
                    <option value = "原料采购"  maxlength = "20" size = "10">原料采购</option>
                    <option value = "非贸采购"  maxlength = "20" size = "10">非贸采购</option>
                    <option value = "工程款"  maxlength = "20" size = "10">工程款</option>
                    <option value = "日常费用"  maxlength = "20" size = "10">日常费用</option>
                     <option value = "退余款"  maxlength = "20" size = "10">退余款</option>                 
                </select>
					</tr>
					<tr>
						<font size = "3">公司名称:</font>
						<?php echo '<input type = "text" name = "company" value = '.$_COOKIE['update_company'].' maxlength = "20" size = "25"/>'
						?>
					</tr>
					<tr>
						<font size = "3">原因:</font>
						<?php
						echo '<input type = "text" name = "reason" value ='.$_COOKIE['update_reason'].' maxlength = "20" size = "15">'
						?>
					</tr>
					<tr>
						<font size = "3">金额:</font>
						<?php
						echo '<input type = "text" name = "money" value ='.$_COOKIE['update_money'].' maxlength = "20" size = "10">'
						?>
					</tr>
					<tr>
						<font size = "3">付款方式:</font>
                <select name = "state">
                	<?php
                	    echo '<option value = '.$_COOKIE['update_state'].'>'.$_COOKIE['update_state'].'</option>'

                	?>
                    <option value = "共享平台">共享支付</option>
                    <option value= "网银支付">网银支付</option>
               </select>
					</tr>
					<tr>
						<p>&nbsp;</p>
						<input type = "submit" name = "save" value = '保存' style="font-size:20px">
					</tr>
				</table>
		</form>
	</body>
</html>
