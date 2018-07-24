<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include("mysql_connect.inc.php");  // include過的變數都能直接引用

  $userid = $_POST['userid'];
  $account = $_POST['account'];
  $pw = $_POST['pw'];
  $pw2 = $_POST['pw2'];
  $companyid = $_POST['companyid'];

 
      
  //資料庫連線採UTF8
  //mysqli_query($db,"SET NAMES utf8");

  //選擇資料庫
  mysqli_select_db($db, $db_name)or die("無法使用資料庫");
  if ( $pw != $pw2 ){
	echo '兩個密碼不一致!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';  
  } // if
  else if( $userid != null &&$account!=null &&$companyid!=null && $pw != null && $pw2 != null ){
    //新增資料進資料庫語法
    $sql = "insert into login (User_Code, User_Account, User_Password, Company_Code) values('$userid', '$account', '$pw', '$companyid')";
    if( mysqli_query($db, $sql) ){
       echo '新增成功!';
       echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    } // if
    else{
      echo '11 新增失敗!';
      echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    } // else
  } // else if
  else{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
  } // else
?>