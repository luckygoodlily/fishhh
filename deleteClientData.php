<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
   <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
<html>
  <head>
    <meta charset="utf-8">
    <title>客戶資料管理</title>
  </head>

  <body>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
    <div class="main" align="center">
	  <font color="white" size="6" >
	     <div style="background-color:#5599FF;">
		   <br><b>海洋大數據雲端管理系統</b><br><br>
		 </div>
	  </font><br>
	  
	  <div class="home" style="float:left;">&nbsp;&nbsp;
	    <a href="<?php echo $_SESSION['home']; ?>"  target="_self" title="首頁"><img src="/Icon/ab2.png" border="0"></a>
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > 客戶資料管理
	  </div>
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>

	  <?php
        include("mysql_connect.inc.php");
        $id = $_POST['submitVal'];
        // echo $id ;
        if($_POST['submitVal'] != null){
          //刪除資料庫資料語法
          $sql = "delete from clientcomp where ClientCpCode='$id'";
		  //$sql = 'update clientcomp set ClientCpNameEn="'.$clientEh.'", ClientCountry="'.$country.'" where ClientCpCode="'.$id.'"';
          if(mysqli_query($db,$sql)){
            echo '刪除客戶資料成功!';
            // echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
          } // if
          else{
            echo '刪除客戶資料失敗!';
            // echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
          } // else
        } // if
        else{
          echo '已有漁獲或海溫資料無法刪除';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=clientDatafind.php>';
        } // else
      ?>
    </div>
  </body>
</html>
