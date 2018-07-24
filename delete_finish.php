<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include("mysql_connect.inc.php");
  $id = $_POST['id'];

  if($_SESSION['username'] != null){
    //刪除資料庫資料語法
    $sql = "delete from login where User_Code='$id'";
    if(mysqli_query($db,$sql)){
      echo '刪除成功!';
      echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
    } // if
    else{
      echo '刪除失敗!';
      echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
    } // else
  } // if
  else{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
  } // else
?>