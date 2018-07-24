<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "fish";
//資料庫管理者帳號
$db_user = "peter";
//資料庫管理者密碼
$db_passwd = "lily1217";

//對資料庫連線
$db = mysqli_connect($db_server, $db_user, $db_passwd) ;
      
//資料庫連線採UTF8
mysqli_query($db,"SET NAMES utf8");

//選擇資料庫
mysqli_select_db($db, $db_name)or die("無法使用資料庫");
?> 