<head><meta charset="utf-8" /></head>
<?php
require("menu.html");
$dn = trim($_POST["username"]."@wilmar.cn");
$password =trim($_POST["password"]);

date_default_timezone_set("Asia/Shanghai");


if(!empty($dn) && !empty($password) ){
    //local server
    //$ldapconn = ldap_connect('10.228.100.3',389);
    //remote server
    $ldapconn = ldap_connect('111.38.178.170',50389);
    $ldapbind = ldap_bind($ldapconn,$dn,$password);

    if ($ldapbind){

        echo '登陆成功！';
        echo "</p>";
        echo $_POST["username"].' 您好，'.'当前时间是 ' .date('H:i,jS F Y');
        require("insert.html");
    }
    else
    {
        //var_dump($ldapbind);
        echo '登陆失败，请检查用户名密码！';
    }
}
else{
    echo '用户名或密码不能为空！';
}
?>
