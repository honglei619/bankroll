<head>
    <meta charset="utf-8" />
</head>
<?php
 require("navigation.html");
//require("backgroundColor.html");
//require("search.html");
$dn = trim($_POST["username"]."@wilmar.cn");
$loginUser = trim($_POST["username"]);
$password =trim($_POST["password"]);

date_default_timezone_set("Asia/Shanghai");
global $chineseName;

//向其他页面传递登陆的用户名
setcookie('loginUserName',trim($loginUser));

if(!empty($dn) && !empty($password) ){
    //local server
    $ldapconn = ldap_connect('111.38.178.170',50389);
    //remote server
    //$ldapconn = ldap_connect('111.38.178.170',50389);
    @$ldapbind = ldap_bind($ldapconn,$dn,$password);

    //connect to database
    @ $db = new mysqli('localhost','root','','bankroll');

    if (mysqli_connect_errno()) {
        echo "无法连接数据库!";
        exit;
    }
    //$queryPostdata = "SELECT * FROM `user` WHERE `userID`= ";
    $queryUser = "SELECT * FROM `user` WHERE `domainUsername`= '$loginUser' ";
    //echo $queryUser;
    $result = $db -> query($queryUser);
    $num_results = $result ->num_rows;

    for ($i=0; $i < $num_results; $i++) { 
         $row = $result ->fetch_assoc();
        //echo stripcslashes($row['chineseName'])."</p>";
        $chineseName = stripcslashes($row['chineseName']);
    }

    if (is_null($ldapbind) || is_null($chineseName)){
    
        //echo '登陆失败，请检查是否有系统权限或用户名密码！';
        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

        
    }
    else
    {
        echo '登陆成功！';
        echo "</p>";
        echo $chineseName.' 您好，'.'当前时间是 ' .date('H:i,jS F Y');
        
    }
}
else{
    echo '用户名或密码不能为空！';
}
?>