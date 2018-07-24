<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include("mysql_connect.inc.php");  // include過的變數都能直接引用

  if($_SESSION['username'] != null){
     //將$_SESSION['username']丟給$id
    //這樣在下SQL語法時才可以給搜尋的值
    $id = $_SESSION['username'];
	  echo "111使用者代號：". "$id";
    //若以下$id直接用$_SESSION['username']將無法使用
    $sql = "SELECT * FROM login ";
    $result = mysqli_query($db,$sql)or die("Error sql statement");
    $row = mysqli_fetch_row($result);
    
    echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
    echo "使用者代號：\"$row[1]\" (此項目無法修改) <br>";
    echo "帳號：<input type=\"text\" name=\"account\" value=\"$row[2]\" /> <br>";
    echo "密碼：<input type=\"password\" name=\"pw\" value=\"$row[3]\" /> <br>";
    echo "再一次輸入密碼：<input type=\"password\" name=\"pw2\" value=\"$row[3]\" /> <br>";
    echo "公司代碼：<input type=\"text\" name=\"companyid\" value=\"$row[4]\" /> <br>";
    echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
	  
    echo "</form>";
  } // if
  else {
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
  } // else
?>