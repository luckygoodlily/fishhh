
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
  <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
<?php
  include("mysql_connect.inc.php");  // include過的變數都能直接引用
  // echo '<a href="logout.php">登出</a>  <br><br>';
  //此判斷為判定觀看此頁有沒有權限
  //說不定是路人或不相關的使用者
  //因此要給予排除
  //$db = mysqli_connect($db_server, $db_user, $db_passwd) ;
  if($_SESSION['username'] == 'admin'){
    echo '<meta http-equiv=REFRESH CONTENT=1;url=clientData1.php>';
  } // if
  else{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
  } // else
?>

