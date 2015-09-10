<head>
    <meta charset="utf-8" />
</head>
<?php
//设置会话保存时间，15分钟
 session_set_cookie_params(900); 
session_start();
require_once 'connectvars.php';
$dn = trim($_POST["username"]."@wilmar.cn");
$loginUser = trim($_POST["username"]);
$password =trim($_POST["password"]);

if(!empty($dn) && !empty($password) ){
    //local server
    $ldapconn = ldap_connect('10.228.100.3',389);
    //remote server
    //$ldapconn = ldap_connect('111.38.178.170',50389);
    @$ldapbind = ldap_bind($ldapconn,$dn,$password);

    //connect to database
    @ $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    if (mysqli_connect_errno()) {
        echo "无法连接数据库!";
        exit;
    }
    $queryUser = "SELECT * FROM `user` WHERE `domainUsername`= '$loginUser' ";
    //echo $queryUser;
    $result = $db -> query($queryUser);
    $num_results = $result ->num_rows;

    for ($i=0; $i < $num_results; $i++) { 
         $row = $result ->fetch_assoc();
        //echo stripcslashes($row['chineseName'])."</p>";
        $chineseName = stripcslashes($row['chineseName']);
        $loginUserID = stripcslashes($row['userID']);
        $department = stripcslashes($row['department']);
        $privilege = stripcslashes($row['privilege']);
        $score = stripcslashes($row['score']);
    }
    //向其他页面传递登陆的用户名的ID
    setcookie('loginUserNameID',"$loginUserID");
    setcookie('domainUsername',"$loginUser");
    setcookie('chineseName',"$chineseName");
    setcookie('department',"$department");
    setcookie('privilege',"$privilege");
    setcookie('score',"$score");
    if (is_null($ldapbind) || is_null($chineseName)){
    
        //echo '登陆失败，请检查是否有系统权限或用户名密码！';
        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';

        
    }
    elseif($ldapbind)
    {
        $_SESSION['valie_user'] = $loginUser;
        echo   '<script language="javascript">'.'window.location= "login.php";'.'</script>';

    }else{
        echo   '<script language="javascript">'.'window.location= "error.html";'.'</script>';
    }
}
else{
    echo "用户名或密码不能为空!";
}
$result->free();
$db ->close();
?>