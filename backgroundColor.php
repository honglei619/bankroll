<body bgcolor = '#278296'>
</body>
<?php
 function CreatTable($data){
 	echo "<table border =\"1\">";
 	reset($data);
 	$value = current($data);
 	while($value){
 		echo "<tr><td>".$value."</td></tr>\n";
 		$value = next($data);
 	}
 	echo "</table>";
 }
?>