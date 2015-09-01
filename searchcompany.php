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

        </th>
        <th>
            序号
        </th>

        <th>
            付款方名称
        </th>
        <!---
        <th>
            部门
        </th>
        <th>
            分数
        </th>

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
require("navigation.html");
require_once 'connectvars.php';
	if (isset($_SESSION['valie_user'])) {
        $userID = $_COOKIE['loginUserNameID'];
        @ $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($_COOKIE['privilege']>=3) {
            $query = "SELECT * FROM `b_company_name` WHERE '1'";
        }else{
        $query = "SELECT * FROM `b_company_name` WHERE `userID` = '$userID' ";
        }
        
        $result = $db->query($query);
        $num_results = $result->num_rows;


        for ($i = 0; $i < $num_results; $i++) {

            $row = $result->fetch_assoc();
            if ($i % 2 == 0) {
                echo ' <tr class="grid">';
                echo '<td>';
                echo '<input name="result" type="checkbox" value="" />';
                echo '</td>';
                echo '<td>';
                echo stripcslashes($row['id']);
                echo '</td>';
                echo '<td>';
                echo stripcslashes($row['company']);
                echo '</td>';
                echo '<td>';
                echo '</tr>';
            } else {
                echo ' <tr class="grid">';
                echo '<td>';
                echo '<input name="result" type="checkbox" value="" />';
                echo '</td>';
                echo '<td>';
                echo stripcslashes($row['id']);
                echo '</td>';
                echo '<td>';
                echo stripcslashes($row['company']);
                echo '</td>';
                echo '<td>';
                echo '</tr>';
            }
        }
        $result->free();
        $db->close();
    }
	