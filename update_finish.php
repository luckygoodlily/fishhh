<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include("mysql_connect.inc.php");
  //$userid = $_POST['userid'];
  $account = $_POST['account'];
  $pw = $_POST['pw'];
  $pw2 = $_POST['pw2'];
  $companyid = $_POST['companyid'];

  //紅色字體為判斷密碼是否填寫正確
  if($_SESSION['username'] != null && $pw != null && $pw2 != null && $pw == $pw2){
     $id = $_SESSION['username'];
    
        //更新資料庫資料語法
		//$sql = 'UPDATE users SET pressLeveldata = "'.$_POST['pressLeveldata'].'",gameMoneydata = "'.$_POST['gameMoneydata'].'"';
        //   $sql .= ' WHERE username = "'.$_POST['username'].'"';
        $sql = 'update login set User_Account="'.$account.'", User_Password="'.$pw.'"
		, Company_Code="'.$companyid.'" where User_Code="'.$id.'"';
        if(mysqli_query($db,$sql)){
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }//if
        else{
                echo '修改失敗!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        } //else
}//if
else{
        echo '您無權限觀看此頁面!';
        //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
} // else
?>