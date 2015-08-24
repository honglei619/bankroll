<head><meta charset="utf-8" /></head>
<html>
<head>
	<title>Report Search Result</title>
</head>
<body>
	<h1 align="center">查找结果</h1>
	<?php
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
	@ $db = new mysqli('localhost','root','','bankroll');

	if (mysqli_connect_errno()) {
		echo "could not connect to db";
		exit;
	}
	global $query;
	global $result;
	global $num_results;

	$query = "SELECT * FROM `postdata` WHERE ".$searchtype." like '%".$searchterm."%'";
	echo $query;
	$result = $db -> query($query);
	$num_results = $result ->num_rows;
	echo "<p> 找到了 ".$num_results." 个结果"."</p>";
/*
	for ($i=0; $i < $num_results; $i++) { 
		global $row;
		 $row = $result ->fetch_assoc();
		echo stripcslashes($row['id'])."</p>";
		echo stripcslashes($row['date'])."</p>";
		echo stripcslashes($row['type'])."</p>";
		echo stripcslashes($row['company'])."</p>";
		echo stripcslashes($row['reason'])."</p>";
		echo stripcslashes($row['money'])."</p>";
		echo stripcslashes($row['state'])."</p>";
		echo stripcslashes($row['userID'])."</p>";
	}
*/
	//$result -> free();
	//$db ->close();
	?>

</body>
</html>

<head><meta charset="utf-8" />
    <script src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/jquery.freezeheader.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
 <script language="javascript" type="text/javascript">

        $(document).ready(function () {
            $("#table1").freezeHeader({ 'height': '400px' });  
        })
    </script>

</head>
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
		 		echo '</tr>';
		 			}
		 		
			}
	$result -> free();
	$db ->close();
            ?>
        </tbody>
    </table>
</body>
